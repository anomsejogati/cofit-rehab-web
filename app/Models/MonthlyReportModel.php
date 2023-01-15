<?php namespace App\Models;

use CodeIgniter\Model;

class MonthlyReportModel extends Model
{

    protected $table      = 'pt_monthly_report';
    protected $primaryKey = 'id';
    protected $pt_monthly_report;

    public function __construct() {
        parent::__construct();
        
        $this->pt_monthly_report = $this->db->table($this->table);
    }


    function getAll()
    {

        $builder = $this->db->table('us_patient a')
                    ->select('b.id, b.patient_id, a.mr_no, a.name, b.report_no, b.input_date, b.mwt6, b.barthel_index, b.mmrc')
                    ->join('pt_monthly_report b', 'a.id=b.patient_id')->orderBy('a.name ASC, b.report_no ASC');
        
        return $builder;

    }


    function exportAll()
    {

        $sql = "SELECT b.id, b.patient_id, a.mr_no, a.name, b.report_no, b.input_date, b.mwt6, b.barthel_index, b.mmrc FROM us_patient a 
                JOIN pt_monthly_report b ON a.id=b.patient_id 
                ORDER BY a.name, b.report_no ASC
        ";

        return $this->db->query($sql)->getResult();

    }


    function getByID($id){
        
        return $this->pt_monthly_report->getWhere(['id' => $id])->getRow();

    }


    function getByPatientID($patient_id){
        
        return $this->pt_monthly_report->getWhere(['patient_id' => $patient_id])->getRow();

    }


    function create($data){

        $this->pt_monthly_report->insert($data);
        
        return $this->db->insertID();

    }


    function updateData($id, $data){

        $this->pt_monthly_report->where('id', $id)->update($data);
        
        return $this->db->affectedRows();

    }


    function deleteData($id)
    {


        $this->pt_monthly_report->delete(['id' => $id]);
        
        return $this->db->affectedRows();

    }


}