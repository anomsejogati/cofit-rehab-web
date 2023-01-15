<?php 

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UsersModel;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PHPExcel;
use PHPExcel_IOFactory;


class Users extends BaseController
{

    protected $usersModel;

    public function __construct()
	{

        helper(['form', 'url', 'cookie']);
        $this->usersModel = new UsersModel();

        if(!empty(get_cookie('cofit_user_id'))){
            $this->user_id		= base64_decode(get_cookie('cofit_user_id'));         
        }

    }


    public function auth()
	{

		$postData = $this->request->getPost();

		$session_code  = md5(date('YmdHis').$postData['user_id']);

		$agent = $this->request->getUserAgent();

		$users = $this->usersModel->auth($postData['user_id'], $postData['password']);

		if(isset($users)){
			$data = [
				'user_id'		=> $users->id,
				'session_code'  => $session_code,				
				'login'    		=> date('Y-m-d H:i:s'),
				'logout'		=> '0000-00-00',
				'ip_address'    => $this->request->getIPAddress(),
				'browser'		=> $agent->getBrowser()." - ".$agent->getVersion(),
				'device'		=> $agent->getMobile()." - ".$agent->getPlatform()				
			];

			$createLog = $this->usersModel->createUserLog($data);

			set_cookie('cofit_session_code', base64_encode($session_code), 3600*24*5);
			set_cookie('cofit_user_id', base64_encode($users->id), 3600*24*5);			

			echo json_encode(array("status" => TRUE));

		}else{

			echo json_encode(array("status" => FALSE));

		}

    }
    
    
    public function getAll($status)
	{

		$result['data']		= $this->usersModel->getAll($status);

		echo json_encode($result);

    }


    public function getByID($id)
	{

		$result     = $this->usersModel->getByID($id);

		echo json_encode($result);

    }


    public function getByEmail($email)
	{

		$result     = $this->usersModel->getByEmail($email);

        echo json_encode($result);

    }


    public function createAccount()
    {

        $post    = $this->request->getPost();       

        $result     = $this->usersModel->getByEmail($post['email']);

        if(isset($result)){

            echo json_encode(['status' => FALSE, 'message' => 'Email sudah digunakan..']);

        }else{

            $data = [
                'username'      => str_replace("'", "`", $post['username']),
                'email'         => $post['email'],
                'phone_no'      => $post['phone_no'],
                'password'      => md5($post['password']),
                'role_id'       => $post['role_id'],
                'is_active'     => 1,
                'created_at'    => date('Y-m-d H:i:s')
            ];
    
            $user_id = $this->usersModel->create($data);
    
            if($user_id > 0){
    
                echo json_encode(['status' => TRUE, 'message' => 'Akun dokter berhasil dibuat..']);
    
            }else{
    
                echo json_encode(['status' => FALSE, 'message' => 'Mohon maaf, data Anda tidak dapat disimpan. Silakan hubungi admin kami!']);
    
            }

        }
    

        
    }


    public function update()
    {
        
        $post    = $this->request->getPost();      
       
        $data = [
            'username'      => str_replace("'", "`", $post['username']),
            'email'         => $post['email'],
            'phone_no'         => $post['phone_no']
        ];

        $updateUser = $this->usersModel->updateData($post['user_id'], $data);

        if($updateUser > 0){

            echo json_encode(TRUE);

        }else{

            echo json_encode(FALSE);

        }
        
        
    }


    public function updateStatus()
    {
        $post   = $this->request->getPost();

        $data = [
            'is_active' => $post['status']
        ];
        
        if($this->usersModel->updateStatus($post['id'], $data) > 0){

            echo json_encode(TRUE);

        }else{

            echo json_encode(FALSE);

        }
    }


    public function delete()
    {

        $post   = $this->request->getPost();
        
        if($this->usersModel->deleteData($post['id']) > 0){

            echo json_encode(TRUE);

        }else{

            echo json_encode(FALSE);

        }

    }


    public function exportExcel()
    {

        $employees = $this->usersModel->getAll($this->school_id, 1);

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Employee ID')
            ->setCellValue('C1', 'NIP')
            ->setCellValue('D1', 'Employee Name')
            ->setCellValue('E1', 'Status')
            ->setCellValue('F1', 'Sex')
            ->setCellValue('G1', 'Birth Place')
            ->setCellValue('H1', 'Birth Date')
            ->setCellValue('I1', 'Phone No.')
            ->setCellValue('J1', 'Email')
            ->setCellValue('K1', 'Address');

        $column = 2;
        $no = 1;

        foreach ($employees as $employee) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $employee->id)
                ->setCellValue('C' . $column, $employee->nip)
                ->setCellValue('D' . $column, $employee->employee_name)
                ->setCellValue('E' . $column, $employee->status)
                ->setCellValue('F' . $column, $employee->sex)
                ->setCellValue('G' . $column, $employee->birth_place)
                ->setCellValue('H' . $column, $employee->birth_date)
                ->setCellValue('I' . $column, $employee->phone)
                ->setCellValue('J' . $column, $employee->email)
                ->setCellValue('K' . $column, $employee->address);

            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His'). '-Data-Pegawai';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }



    public function resetPassword()
    {

        $post   = $this->request->getPost();

        $email  = $post['email'];

        $check  = $this->usersModel->getByEmail($email);
        
        if(isset($check)){

            $password = $this->createPassword(8);

            $dataUser = [
                'password' => md5($password)
            ];

            $update = $this->usersModel->updateDataByEmail($email, $dataUser);

            if($update > 0){

                $data = [
                    'email'     => $email,
                    'password'  => $password
                ];

                $this->sendMailPassword($data);

                echo json_encode(['status' => TRUE, 'message' => 'Kata sandi berhasil diatur ulang...']);

            }else{

                echo json_encode(['status' => FALSE, 'message' => 'Kata sandi tidak dapat diatur ulang...']);

            }
            

        }else{

            echo json_encode(['status' => FALSE, 'message' => 'Email tidak ditemukan...']);

        }

    }
    
    
    public function sendMailPassword($data)
    {

        $password   = $data['password'];
        
        $emailTo    = $data['email'];
        
        $mail = new PHPMailer(true);
        
        try {
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
 
            $mail->isSMTP();
            // $mail->SMTPSecure = 'tsl';
            $mail->SMTPSecure = 'ssl';
            $mail->Host       = 'srv28.niagahoster.com';
            // $mail->SMTPDebug = 2;
            // $mail->Port       = 587;
            $mail->Port       = 465;
            $mail->SMTPAuth   = false;
            // $mail->Username   = '';
            // $mail->Password   = '';
            $mail->setFrom('account@cofitrehab.id', 'CoFit Rehab'); // ubah dengan alamat email Anda
            $mail->addAddress($emailTo);
    
            // Isi Email
            $mail->isHTML(true);
            $mail->Subject = 'Atur Ulang Kata Sandi Otomatis';
        
            $message    = "
                <style>html,body { padding: 0; margin:0; }</style>
                <div style='font-family:Arial,Helvetica,sans-serif; line-height: 1.5; font-weight: normal; font-size: 15px; color: #2F3044; min-height: 100%; margin:0; padding:0; width:100%; background-color:#edf2f7'>
                    <table align='center' border='0' cellpadding='0' cellspacing='0' width='100%' style='border-collapse:collapse;margin:0 auto; padding:0; max-width:600px'>
                        <tbody>
                            <tr>
                                <td align='center' valign='center' style='text-align:center; padding: 40px'>
                                    <a href='https://cofitrehab.id' rel='noopener' target='_blank'>
                                        <img alt='Logo' src='https://cofitrehab.id/assets/media/logos/logo.png' />
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td align='left' valign='center'>
                                    <div style='text-align:left; margin: 0 20px; padding: 40px; background-color:#ffffff; border-radius: 6px'>
                                        <!--begin:Email content-->
                                        <div style='padding-bottom: 30px; font-size: 17px;'>
                                            <strong>Halo!</strong>
                                        </div>
                                        <div style='padding-bottom: 30px'>Anda mendapat email ini karena telah berhasil melakukan atur ulang kata sandi secara otomatis. Kata sandi terbaru Anda adalah sebagai berikut:</div>
                                        <div style='padding-bottom: 40px; text-align:center;'>
                                            <a href='https://cofitrehab.id' rel='noopener' style='text-decoration:none;display:inline-block;text-align:center;padding:0.75575rem 1.3rem;font-size:0.925rem;line-height:1.5;border-radius:0.35rem;color:#ffffff;background-color:#009EF7;border:0px;margin-right:0.75rem!important;font-weight:600!important;outline:none!important;vertical-align:middle' target='_blank'>$password</a>
                                        </div>
                                        
                                        <div style='border-bottom: 1px solid #eeeeee; margin: 15px 0'></div>
                                        
                                        <!--end:Email content-->
                                        <div style='padding-bottom: 10px'>Kind regards,
                                        <br>Tim CoFit Rehab.
                                        <tr>
                                            <td align='center' valign='center' style='font-size: 13px; text-align:center;padding: 20px; color: #6d6e7c;'>
                                                <p>Fakultas Kedokteran Universitas Indonesia, Jl. Salemba Raya No. 6, Jakarta Pusat 10430.</p>
                                                <p>Copyright &copy;
                                                <a href='https://cofitrehab.id' rel='noopener' target='_blank'>CoFit Rehab</a>.</p>
                                            </td>
                                        </tr></br></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            ";

            $mail->Body    = $message;
            
            $mail->send();

            return TRUE;
            
        } catch (Exception $e) {
            
            return FALSE;
            
        }
        
    }
    
    
    function createPassword($length)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $password = array();  
        for ($i = 0; $i < $length; $i++) {
            $n = rand(0, strlen($alphabet));
            $password[] = $alphabet[$n];
        }
        return implode($password); 
    }
    

}
