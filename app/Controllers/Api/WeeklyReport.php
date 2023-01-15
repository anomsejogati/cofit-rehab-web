<?php 

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\WeeklyReportModel;

use \Hermawan\DataTables\DataTable;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class WeeklyReport extends BaseController
{

    protected $weeklyReport;

    public function __construct()
	{

        helper(['form', 'url', 'cookie']);
        $this->weeklyReport = new WeeklyReportModel();

        if(!empty(get_cookie('cofit_user_id'))){
            $this->user_id		= base64_decode(get_cookie('cofit_user_id'));         
        }

    }
    
    
    public function getAll()
	{

		// $result['data']		= $this->weeklyReport->getAll($status);

		// echo json_encode($result);

        return DataTable::of($this->weeklyReport->getAll())
                ->setSearchableColumns(['mr_no', 'name'])
               ->toJson(true);

    }


    public function getByID($id)
	{

		$result     = $this->weeklyReport->getByID($id);

		echo json_encode($result);

    }


    public function getByPatientID($patient_id)
	{

		$result     = $this->weeklyReport->getByPatientID($patient_id);

		echo json_encode($result);

    }


    public function create()
    {

        $post    = $this->request->getPost();

        $data = [
            'patient_id'    => $post['wr_patient_id'],
            'report_no'     => $post['wr_report_no'],
            'input_date'    => date_format(date_create($post['wr_input_date']), 'Y-m-d'),
            'bfi'           => $post['wr_bfi'],
            'sts_30'        => $post['wr_sts_30']
        ];


        $insert = $this->weeklyReport->create($data);
    
        if($insert > 0){

            echo json_encode(['status' => TRUE, 'message' => 'Data evaluasi mingguan berhasil ditambahkan...']);

        }else{

            echo json_encode(['status' => FALSE, 'message' => 'Mohon maaf, data Anda tidak dapat disimpan!']);

        }

        
    }


    public function update()
    {
        
        $post    = $this->request->getPost();   
        
        $data = [
            'patient_id'    => $post['wr_patient_id'],
            'report_no'     => $post['wr_report_no'],
            'input_date'    => date_format(date_create($post['wr_input_date']), 'Y-m-d'),
            'bfi'           => $post['wr_bfi'],
            'sts_30'        => $post['wr_sts_30']
        ];

        $update = $this->weeklyReport->updateData($post['id'], $data);

        if($update > 0){

            echo json_encode(['status' => TRUE, 'message' => 'Data evaluasi mingguan berhasil diubah...']);

        }else{

            echo json_encode(['status' => FALSE, 'message' => 'Tidak ada perubahan data!']);

        }
        
        
    }


    public function delete()
    {

        $post   = $this->request->getPost();
        
        if($this->weeklyReport->deleteData($post['id']) > 0){

            echo json_encode(TRUE);

        }else{

            echo json_encode(FALSE);

        }

    }


    public function exportExcel()
    {

        $patients = $this->weeklyReport->exportAll();

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'No. RM')
            ->setCellValue('C1', 'Nama Pasien')
            ->setCellValue('D1', 'Minggu-ke')
            ->setCellValue('E1', 'Tanggal')
            ->setCellValue('F1', 'BFI')
            ->setCellValue('G1', 'STS 30');

        $column = 2;
        $no = 1;

        foreach ($patients as $patient) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $patient->mr_no)
                ->setCellValue('C' . $column, $patient->name)
                ->setCellValue('D' . $column, $patient->report_no)
                ->setCellValue('E' . $column, $patient->input_date)
                ->setCellValue('F' . $column, $patient->bfi)
                ->setCellValue('G' . $column, $patient->sts_30);

            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Data-Evaluasi-Mingguan-Pasien-'.date('Y-m-d-His');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }


    

}
