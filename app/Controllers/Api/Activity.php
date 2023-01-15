<?php 

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ActivityModel;

use \Hermawan\DataTables\DataTable;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Activity extends BaseController
{

    protected $activity;

    public function __construct()
	{

        helper(['form', 'url', 'cookie']);
        $this->activity = new ActivityModel();

        if(!empty(get_cookie('cofit_user_id'))){
            $this->user_id		= base64_decode(get_cookie('cofit_user_id'));         
        }

    }
    
    
    public function getAll($exercise_type)
	{

        return DataTable::of($this->activity->getAll($exercise_type))
                ->setSearchableColumns(['mr_no', 'name'])
               ->toJson(true);

    }    


    public function getByPatientID($patient_id)
	{

		$result     = $this->activity->getByPatientID($patient_id);

		echo json_encode($result);

    }    


    public function exportExcel($exercise_type)
    {

        $patients = $this->activity->exportAll($exercise_type);

        $spreadsheet = new Spreadsheet();

        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'No. RM')
            ->setCellValue('C1', 'Nama Pasien')
            ->setCellValue('D1', 'Tanggal')
            ->setCellValue('E1', 'Latihan')
            ->setCellValue('F1', 'Sesi')
            ->setCellValue('G1', 'Ada Keluhan')
            ->setCellValue('H1', 'Bentuk Keluhan')
            ->setCellValue('I1', 'Skala Borg')
            ->setCellValue('J1', 'Saturasi Oksigen')
            ->setCellValue('K1', 'Detak Jantung')
            ->setCellValue('L1', 'Keluhan Lain');

        $column = 2;
        $no = 1;

        foreach ($patients as $patient) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $no++)
                ->setCellValue('B' . $column, $patient->mr_no)
                ->setCellValue('C' . $column, $patient->name)
                ->setCellValue('D' . $column, $patient->created_at)
                ->setCellValue('E' . $column, $patient->exercise_session)
                ->setCellValue('F' . $column, $patient->exercise_type)
                ->setCellValue('G' . $column, $patient->is_complaint)
                ->setCellValue('H' . $column, $patient->subjective_complaint)
                ->setCellValue('I' . $column, $patient->borg_scale)
                ->setCellValue('J' . $column, $patient->oxygen_saturation)
                ->setCellValue('K' . $column, $patient->heart_rate)
                ->setCellValue('L' . $column, $patient->complaint);

            $column++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'Data-Aktivitas-'.$exercise_type.'-Pasien-'.date('Y-m-d-His');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');

    }


    

}
