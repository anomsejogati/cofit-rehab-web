<?php 

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\PatientModel;
use App\Models\UsersModel;

use \Hermawan\DataTables\DataTable;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Patient extends BaseController
{

    protected $patientModel;
    protected $usersModel;

    public function __construct()
	{

        helper(['form', 'url', 'cookie']);
        $this->patientModel = new PatientModel();
        $this->usersModel = new UsersModel();

        if(!empty(get_cookie('cofit_user_id'))){
            $this->user_id		= base64_decode(get_cookie('cofit_user_id'));         
        }

    }
    
    
    public function getAll()
	{

        return DataTable::of($this->patientModel->getAll())
                ->setSearchableColumns(['name', 'email', 'phone_no'])
               ->toJson(true);

    }


    public function listOfPatient()
    {

        if ($this->request->isAJAX()) {

            $result = $this->patientModel->listOfPatient($this->request->getGet('searchTerm'));

            $data = [];

            foreach($result as $row){
                $data[] = [
                    'id' => $row->id,
                    'text' => $row->name
                ];
            }

            echo json_encode($data);

        }

    }


    public function getExerciseMenu()
	{

        return DataTable::of($this->patientModel->getExerciseMenu())
                ->setSearchableColumns(['name'])
               ->toJson(true);

    }


    public function getByID($id)
	{

		$result     = $this->patientModel->getByID($id);

		echo json_encode($result);

    }


    public function create()
    {

        $post    = $this->request->getPost();

        $createdAt = date('Y-m-d H:i:s');

        $dataUser = [
            'username'          => str_replace("'", "`", $post['name']),
            'email'             => $post['email'],
            'phone_no'          => $post['phone_no'],
            'password'          => md5('pasien123'),
            'role_id'           => 3,
            'is_active'         => 1,
            'created_at'        => $createdAt
        ];

        $userID = $this->usersModel->create($dataUser);

        // $hocd = [];

        // for($x = 0 ; $x < count($post['hocd']) ; $x++){

        //     array_push($hocd, $post['hocd'][$x]);

        // }

        $data = [
            'user_id'                   => $userID,
            'mr_no'                     => $post['mr_no'],
            'name'                      => str_replace("'", "`", $post['name']),
            'gender'                    => $post['gender'],
            'birth_date'                => date_format(date_create($post['birth_date']), 'Y-m-d'),
            'address'                   => str_replace("'", "`", $post['address']),
            'education'                 => $post['education'],
            'profession'                => $post['profession'],
            'exercise_habits'           => $post['exercise_habits'],
            'exercise_habits_frek'      => (isset($post['exercise_habits_frek']))?$post['exercise_habits_frek']:'',
            'exercise_type'             => $post['exercise_type'],
            'date_pos_covid'            => (!empty($post['date_pos_covid']))?date_format(date_create($post['date_pos_covid']), 'Y-m-d'):'0000-00-00',
            'covid_level'               => (isset($post['covid_level']))?$post['covid_level']:'',
            'confirmed_positive'        => (isset($post['confirmed_positive']))?$post['confirmed_positive']:'0',
            'covid_confirmed_date_1'    => (!empty($post['covid_confirmed_date_1']))?date_format(date_create($post['covid_confirmed_date_1']), 'Y-m-d'):'0000-00-00',
            'covid_degree_1'            => $post['covid_degree_1'],
            'covid_confirmed_date_2'    => (!empty($post['covid_confirmed_date_2']))?date_format(date_create($post['covid_confirmed_date_2']), 'Y-m-d'):'0000-00-00',
            'covid_degree_2'            => $post['covid_degree_2'],
            'covid_confirmed_date_3'    => (!empty($post['covid_confirmed_date_3']))?date_format(date_create($post['covid_confirmed_date_3']), 'Y-m-d'):'0000-00-00',
            'covid_degree_3'            => $post['covid_degree_3'],
            'vaccine_date_1'            => (!empty($post['vaccine_date_1']))?date_format(date_create($post['vaccine_date_1']), 'Y-m-d'):'0000-00-00',
            'vaccine_type_1'            => $post['vaccine_type_1'],
            'vaccine_date_2'            => (!empty($post['vaccine_date_2']))?date_format(date_create($post['vaccine_date_2']), 'Y-m-d'):'0000-00-00',
            'vaccine_type_2'            => $post['vaccine_type_2'],
            'vaccine_date_3'            => (!empty($post['vaccine_date_3']))?date_format(date_create($post['vaccine_date_3']), 'Y-m-d'):'0000-00-00',
            'vaccine_type_3'            => $post['vaccine_type_3'],
            'post_covid_complaints'     => (isset($post['post_covid_complaints']))?implode(",", $post['post_covid_complaints']):'',
            'smoking_habits'            => $post['smoking_habits'],
            'smoking_record'            => $post['smoking_record'],
            'year_start'                => $post['year_started_smoking'],
            'year_end'                  => $post['year_end_smoking'],
            'num_of_cigarettes'         => $post['num_of_cigarettes'],
            'hocd_pra'                  => (isset($post['hocd_pra']))?implode(",", $post['hocd_pra']):'',
            'hocd_pra_other'            => $post['hocd_pra_other'],
            'hocd_post'                 => (isset($post['hocd_post']))?implode(",", $post['hocd_post']):'',
            'hocd_post_other'           => $post['hocd_post_other'],
            'tb'                        => $post['tb'],
            'bb_pra'                    => $post['bb_pra'],
            'imt_pra'                   => $post['imt_pra'],
            'mwt6'                      => $post['mwt6'],
            'barthel_index'             => $post['barthel_index'],
            'bfi'                       => $post['bfi'],
            'mmrc'                      => $post['mmrc'],
            'eq5d5l'                    => $post['eq5d5l'],
            'eq_vas'                    => $post['eq_vas'],
            'psqi'                      => $post['psqi'],
            'gad7'                      => $post['gad7'],
            'phq9'                      => $post['phq9'],
            'moca_ina'                  => $post['moca_ina'],
            'handgrip'                  => $post['handgrip'],
            'sts_30'                    => $post['sts_30'],
            'chest_expansion'           => $post['chest_expansion'],
            'rehab_option'              => $post['rehab_option'],
            'rehab_start'               => (!empty($post['rehab_start']))?date_format(date_create($post['rehab_start']), 'Y-m-d'):'0000-00-00',
            'rehab_end'                 => (!empty($post['rehab_end']))?date_format(date_create($post['rehab_end']), 'Y-m-d'):'0000-00-00',
            'created_by'                => $this->user_id,
            'created_at'                => $createdAt,
            'edited_at'                 => $createdAt            
        ];

        $insert = $this->patientModel->create($data);
    
        if($insert > 0){

            echo json_encode(['status' => TRUE, 'message' => 'Data pasien berhasil ditambahkan...']);

        }else{

            echo json_encode(['status' => FALSE, 'message' => 'Mohon maaf, data Anda tidak dapat disimpan!']);

        }

        
    }


    public function update()
    {
        
        $post    = $this->request->getPost();   
        
        $editedAt = date('Y-m-d H:i:s');

        $dataUser = [
            'username'          => str_replace("'", "`", $post['name']),
            'email'             => $post['email'],
            'phone_no'          => $post['phone_no']
        ];
        
        $updateUser = $this->usersModel->updateData($post['user_id'], $dataUser);
       
        $data = [
            'name'                      => str_replace("'", "`", $post['name']),
            'gender'                    => $post['gender'],
            'birth_date'                => date_format(date_create($post['birth_date']), 'Y-m-d'),
            'address'                   => str_replace("'", "`", $post['address']),
            'education'                 => $post['education'],
            'profession'                => $post['profession'],
            'exercise_habits'           => $post['exercise_habits'],
            'exercise_habits_frek'      => (isset($post['exercise_habits_frek']))?$post['exercise_habits_frek']:'',
            'exercise_type'             => $post['exercise_type'],
            'date_pos_covid'            => (!empty($post['date_pos_covid']))?date_format(date_create($post['date_pos_covid']), 'Y-m-d'):'0000-00-00',
            'covid_level'               => (isset($post['covid_level']))?$post['covid_level']:'',
            'confirmed_positive'        => (isset($post['confirmed_positive']))?$post['confirmed_positive']:'0',
            'covid_confirmed_date_1'    => (!empty($post['covid_confirmed_date_1']))?date_format(date_create($post['covid_confirmed_date_1']), 'Y-m-d'):'0000-00-00',
            'covid_degree_1'            => $post['covid_degree_1'],
            'covid_confirmed_date_2'    => (!empty($post['covid_confirmed_date_2']))?date_format(date_create($post['covid_confirmed_date_2']), 'Y-m-d'):'0000-00-00',
            'covid_degree_2'            => $post['covid_degree_2'],
            'covid_confirmed_date_3'    => (!empty($post['covid_confirmed_date_3']))?date_format(date_create($post['covid_confirmed_date_3']), 'Y-m-d'):'0000-00-00',
            'covid_degree_3'            => $post['covid_degree_3'],
            'vaccine_date_1'            => (!empty($post['vaccine_date_1']))?date_format(date_create($post['vaccine_date_1']), 'Y-m-d'):'0000-00-00',
            'vaccine_type_1'            => $post['vaccine_type_1'],
            'vaccine_date_2'            => (!empty($post['vaccine_date_2']))?date_format(date_create($post['vaccine_date_2']), 'Y-m-d'):'0000-00-00',
            'vaccine_type_2'            => $post['vaccine_type_2'],
            'vaccine_date_3'            => (!empty($post['vaccine_date_3']))?date_format(date_create($post['vaccine_date_3']), 'Y-m-d'):'0000-00-00',
            'vaccine_type_3'            => $post['vaccine_type_3'],
            'post_covid_complaints'     => (isset($post['post_covid_complaints']))?implode(",", $post['post_covid_complaints']):'',
            'smoking_habits'            => $post['smoking_habits'],
            'smoking_record'            => $post['smoking_record'],
            'year_start'                => $post['year_started_smoking'],
            'year_end'                  => $post['year_end_smoking'],
            'num_of_cigarettes'         => $post['num_of_cigarettes'],
            'hocd_pra'                  => (isset($post['hocd_pra']))?implode(",", $post['hocd_pra']):'',
            'hocd_pra_other'            => $post['hocd_pra_other'],
            'hocd_post'                 => (isset($post['hocd_post']))?implode(",", $post['hocd_post']):'',
            'hocd_post_other'           => $post['hocd_post_other'],
            'tb'                        => $post['tb'],
            'bb_pra'                    => $post['bb_pra'],
            'imt_pra'                   => $post['imt_pra'],
            'mwt6'                      => $post['mwt6'],
            'barthel_index'             => $post['barthel_index'],
            'bfi'                       => $post['bfi'],
            'mmrc'                      => $post['mmrc'],
            'eq5d5l'                    => $post['eq5d5l'],
            'eq_vas'                    => $post['eq_vas'],
            'psqi'                      => $post['psqi'],
            'gad7'                      => $post['gad7'],
            'phq9'                      => $post['phq9'],
            'moca_ina'                  => $post['moca_ina'],
            'handgrip'                  => $post['handgrip'],
            'sts_30'                    => $post['sts_30'],
            'chest_expansion'           => $post['chest_expansion'],
            'rehab_option'              => $post['rehab_option'],
            'rehab_start'               => (!empty($post['rehab_start']))?date_format(date_create($post['rehab_start']), 'Y-m-d'):'0000-00-00',
            'rehab_end'                 => (!empty($post['rehab_end']))?date_format(date_create($post['rehab_end']), 'Y-m-d'):'0000-00-00',
            'edited_at'                 => $editedAt
        ];

        $update = $this->patientModel->updateData($post['patient_id'], $data);

        if($update > 0){

            echo json_encode(['status' => TRUE, 'message' => 'Data pasien berhasil diubah...']);

        }else{

            echo json_encode(['status' => FALSE, 'message' => 'Tidak ada perubahan data!']);

        }
        
        
    }


    public function delete()
    {

        $post   = $this->request->getPost();
        
        if($this->patientModel->deleteData($post['id']) > 0){

            echo json_encode(TRUE);

        }else{

            echo json_encode(FALSE);

        }

    }


    public function exportExcel()
    {

        $patients = $this->patientModel->exportAll();

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'No. RM')
            ->setCellValue('C1', 'Nama Pasien')
            ->setCellValue('D1', 'L/P')
            ->setCellValue('E1', 'Tgl. Lahir')
            ->setCellValue('F1', 'No. HP')
            ->setCellValue('G1', 'Email')
            ->setCellValue('H1', 'Alamat')
            ->setCellValue('I1', 'Pendidikan')
            ->setCellValue('J1', 'Pekerjaan')
            ->setCellValue('K1', 'Kebiasaan Olah Raga')
            ->setCellValue('L1', 'Frekuensi Olah Raga')
            ->setCellValue('M1', 'Jenis Olah Raga')
            ->setCellValue('N1', 'Tgl. Positif Covid')
            ->setCellValue('O1', 'Tingkat Covid')
            ->setCellValue('P1', 'Jumlah Terkonfirmasi')
            ->setCellValue('Q1', 'Tgl. Terkonfirmasi 1')
            ->setCellValue('R1', 'Derajat 1')
            ->setCellValue('S1', 'Tgl. Terkonfirmasi 2')
            ->setCellValue('T1', 'Derajat 2')
            ->setCellValue('U1', 'Tgl. Terkonfirmasi 3')
            ->setCellValue('V1', 'Derajat 3')
            ->setCellValue('W1', 'Tgl. Vaksin 1')
            ->setCellValue('X1', 'Jenis Vaksin 1')
            ->setCellValue('Z1', 'Tgl. Vaksin 2')
            ->setCellValue('AA1', 'Jenis Vaksin 2')
            ->setCellValue('AB1', 'Tgl. Vaksin 3')
            ->setCellValue('AC1', 'Jenis Vaksin 3')
            ->setCellValue('AD1', 'Keluhan Pasca Covid')
            ->setCellValue('AE1', 'Kebiasaan Merokok Saat ini')
            ->setCellValue('AF1', 'Riwayat Merokok')
            ->setCellValue('AG1', 'Tahun Mulai')
            ->setCellValue('AH1', 'Tahun Berhenti')
            ->setCellValue('AI1', 'Konsumsi per hari')
            ->setCellValue('AJ1', 'Riwayat Penyakit Pra Covid')
            ->setCellValue('AK1', 'Lainnya')
            ->setCellValue('AL1', 'Riwayat Penyakit Pasca Covid')
            ->setCellValue('AM1', 'Lainnya')
            ->setCellValue('AN1', 'Tinggi Badan')
            ->setCellValue('AO1', 'BB Sebelum Rehab')
            ->setCellValue('AP1', 'IMT Sebelum Rehab')
            ->setCellValue('AQ1', '6MWT (m)')
            ->setCellValue('AR1', 'Indeks Barthel (0-20)')
            ->setCellValue('AS1', 'BFI (0-10)')
            ->setCellValue('AT1', 'mMRC (0-4)')
            ->setCellValue('AU1', 'EQ5D5L (xxxxx)')
            ->setCellValue('AV1', 'EQ-VAS (0-100)')
            ->setCellValue('AW1', 'PSQI (0-21)')
            ->setCellValue('AX1', 'GAD-7 (0-21)')
            ->setCellValue('AY1', 'PHQ-9 (0-27)')
            ->setCellValue('AZ1', 'MoCA-INA (0-30)')
            ->setCellValue('BA1', 'Handgrip (kg)')
            ->setCellValue('BB1', 'STS 30 (0-30)')
            ->setCellValue('BC1', 'Ekspansi dada (x,y,z)')
            ->setCellValue('BD1', 'Opsi Rehab')
            ->setCellValue('BE1', 'Tgl. Mulai')
            ->setCellValue('BF1', 'Tgl. Selesai')
            ->setCellValue('BG1', 'Diperbarui');

        $column = 2;
        $no = 1;

        foreach ($patients as $patient) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $patient->mr_no)
                ->setCellValue('C' . $column, $patient->name)
                ->setCellValue('D' . $column, $patient->gender)
                ->setCellValue('E' . $column, $patient->birth_date)
                ->setCellValue('F' . $column, $patient->phone_no)
                ->setCellValue('G' . $column, $patient->email)
                ->setCellValue('H' . $column, $patient->address)
                ->setCellValue('I' . $column, $patient->education)
                ->setCellValue('J' . $column, $patient->profession)
                ->setCellValue('K' . $column, $patient->exercise_habits)
                ->setCellValue('L' . $column, $patient->exercise_habits_frek)
                ->setCellValue('M' . $column, $patient->exercise_type)
                ->setCellValue('N' . $column, $patient->date_pos_covid)
                ->setCellValue('O' . $column, $patient->covid_level)
                ->setCellValue('P' . $column, $patient->confirmed_positive)
                ->setCellValue('Q' . $column, $patient->covid_confirmed_date_1)
                ->setCellValue('R' . $column, $patient->covid_degree_1)
                ->setCellValue('S' . $column, $patient->covid_confirmed_date_2)
                ->setCellValue('T' . $column, $patient->covid_degree_2)
                ->setCellValue('U' . $column, $patient->covid_confirmed_date_3)
                ->setCellValue('V' . $column, $patient->covid_degree_3)
                ->setCellValue('W' . $column, $patient->vaccine_date_1)
                ->setCellValue('X' . $column, $patient->vaccine_type_1)
                ->setCellValue('Y' . $column, $patient->vaccine_date_2)
                ->setCellValue('Z' . $column, $patient->vaccine_type_2)
                ->setCellValue('AA' . $column, $patient->vaccine_date_3)
                ->setCellValue('AB' . $column, $patient->vaccine_type_3)
                ->setCellValue('AC' . $column, $patient->post_covid_complaints)
                ->setCellValue('AD' . $column, $patient->smoking_habits)
                ->setCellValue('AE' . $column, $patient->smoking_record)
                ->setCellValue('AF' . $column, $patient->year_start)
                ->setCellValue('AG' . $column, $patient->year_end)
                ->setCellValue('AH' . $column, $patient->num_of_cigarettes)
                ->setCellValue('AI' . $column, $patient->hocd_pra)
                ->setCellValue('AJ' . $column, $patient->hocd_pra_other)
                ->setCellValue('AK' . $column, $patient->hocd_post)
                ->setCellValue('AL' . $column, $patient->hocd_post_other)
                ->setCellValue('AM' . $column, $patient->tb)
                ->setCellValue('AN' . $column, $patient->bb_pra)
                ->setCellValue('AO' . $column, $patient->imt_pra)
                ->setCellValue('AP' . $column, $patient->mwt6)
                ->setCellValue('AQ' . $column, $patient->barthel_index)
                ->setCellValue('AR' . $column, $patient->bfi)
                ->setCellValue('AS' . $column, $patient->mmrc)
                ->setCellValue('AT' . $column, $patient->eq5d5l)
                ->setCellValue('AU' . $column, $patient->eq_vas)
                ->setCellValue('AV' . $column, $patient->psqi)
                ->setCellValue('AW' . $column, $patient->gad7)
                ->setCellValue('AX' . $column, $patient->phq9)
                ->setCellValue('AY' . $column, $patient->moca_ina)
                ->setCellValue('AZ' . $column, $patient->handgrip)
                ->setCellValue('BA' . $column, $patient->sts_30)
                ->setCellValue('BB' . $column, $patient->chest_expansion)
                ->setCellValue('BC' . $column, $patient->rehab_option)
                ->setCellValue('BE' . $column, $patient->rehab_start)
                ->setCellValue('BF' . $column, $patient->rehab_end)
                ->setCellValue('BG' . $column, $patient->edited_at);

            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = date('Y-m-d-His'). '-Data-Pasien';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }


    

}
