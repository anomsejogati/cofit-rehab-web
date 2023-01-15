<?php 

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\MonthlyReportModel;

use \Hermawan\DataTables\DataTable;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class MonthlyReport extends BaseController
{

    protected $monthlyReport;

    public function __construct()
	{

        helper(['form', 'url', 'cookie']);
        $this->monthlyReport = new MonthlyReportModel();

        if(!empty(get_cookie('cofit_user_id'))){
            $this->user_id		= base64_decode(get_cookie('cofit_user_id'));         
        }

    }
    
    
    public function getAll()
	{

        return DataTable::of($this->monthlyReport->getAll())
                ->setSearchableColumns(['mr_no','name'])
               ->toJson(true);

    }


    public function getByID($id)
	{

		$result     = $this->monthlyReport->getByID($id);

		echo json_encode($result);

    }


    public function getByPatientID($patient_id)
	{

		$result     = $this->monthlyReport->getByPatientID($patient_id);

		echo json_encode($result);

    }


    public function create()
    {

        $post    = $this->request->getPost();

        $data = [
            'patient_id'    => $post['mr_patient_id'],
            'report_no'     => $post['mr_report_no'],
            'input_date'    => date_format(date_create($post['mr_input_date']), 'Y-m-d'),
            'mwt6'          => $post['mr_mwt6'],
            'barthel_index' => $post['mr_barthel_index'],
            'mmrc'          => $post['mr_mmrc']
        ];


        $insert = $this->monthlyReport->create($data);
    
        if($insert > 0){

            echo json_encode(['status' => TRUE, 'message' => 'Data evaluasi bulanan berhasil ditambahkan...']);

        }else{

            echo json_encode(['status' => FALSE, 'message' => 'Mohon maaf, data Anda tidak dapat disimpan!']);

        }

        
    }


    public function update()
    {
        
        $post    = $this->request->getPost();   
        
        $data = [
            'patient_id'    => $post['mr_patient_id'],
            'report_no'     => $post['mr_report_no'],
            'input_date'    => date_format(date_create($post['mr_input_date']), 'Y-m-d'),
            'mwt6'          => $post['mr_mwt6'],
            'barthel_index' => $post['mr_barthel_index'],
            'mmrc'          => $post['mr_mmrc']
        ];

        $update = $this->monthlyReport->updateData($post['id'], $data);

        if($update > 0){

            echo json_encode(['status' => TRUE, 'message' => 'Data evaluasi bulanan berhasil diubah...']);

        }else{

            echo json_encode(['status' => FALSE, 'message' => 'Tidak ada perubahan data!']);

        }
        
        
    }


    public function delete()
    {

        $post   = $this->request->getPost();
        
        if($this->monthlyReport->deleteData($post['id']) > 0){

            echo json_encode(TRUE);

        }else{

            echo json_encode(FALSE);

        }

    }


    public function exportExcel()
    {

        $patients = $this->monthlyReport->exportAll();

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'No. RM')
            ->setCellValue('C1', 'Nama Pasien')
            ->setCellValue('D1', 'Minggu-ke')
            ->setCellValue('E1', 'Tanggal')
            ->setCellValue('F1', '6MWT')
            ->setCellValue('G1', 'Index Barthel')
            ->setCellValue('H1', 'mMRC');

        $column = 2;
        $no = 1;

        foreach ($patients as $patient) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $patient->mr_no)
                ->setCellValue('C' . $column, $patient->name)
                ->setCellValue('D' . $column, $patient->report_no)
                ->setCellValue('E' . $column, $patient->input_date)
                ->setCellValue('F' . $column, $patient->mwt6)
                ->setCellValue('G' . $column, $patient->barthel_index)
                ->setCellValue('H' . $column, $patient->mmrc);

            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Data-Evaluasi-Bulanan-Pasien-'.date('Y-m-d-His');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }

    

}
