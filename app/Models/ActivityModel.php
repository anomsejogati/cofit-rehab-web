<?php namespace App\Models;

use CodeIgniter\Model;

class ActivityModel extends Model
{

    protected $table      = 'pt_exercise';
    protected $primaryKey = 'id';
    protected $pt_exercise;

    public function __construct() {
        parent::__construct();
        
        $this->pt_exercise = $this->db->table($this->table);
    }


    function getAll($exercise_type)
    {

        if($exercise_type == 'Aerobik') $where = "b.exercise_type IN ('Aerobik','Aerobik 1','Aerobik 2','Aerobik 3')";

        if($exercise_type != 'Aerobik') $where = "b.exercise_type='$exercise_type'";

        $builder = $this->db->table('us_patient a')
                    ->select('b.id, a.id AS patient_id, a.mr_no, a.name, b.created_at, b.exercise_session, b.exercise_type, b.is_complaint, b.subjective_complaint, b.borg_scale, b.oxygen_saturation, b.heart_rate, b.complaint')
                    ->join('pt_exercise b', 'a.user_id=b.user_id')->where($where)->orderBy('a.name ASC, b.created_at ASC, b.exercise_type ASC, b.exercise_code ASC');
        
        return $builder;

    }


    function exportAll($exercise_type)
    {

        if($exercise_type == 'Aerobik') $where = "WHERE b.exercise_type IN ('Aerobik','Aerobik 1','Aerobik 2','Aerobik 3')";

        if($exercise_type != 'Aerobik') $where = "WHERE b.exercise_type='$exercise_type'";

        $sql = "SELECT b.id, a.id AS patient_id, a.mr_no, a.name, b.created_at, b.exercise_session, b.exercise_type, b.is_complaint, b.subjective_complaint, b.borg_scale, b.oxygen_saturation, b.heart_rate, b.complaint FROM us_patient a 
                JOIN pt_exercise b ON a.user_id=b.user_id 
                $where 
                ORDER BY a.name, b.created_at, b.exercise_type, b.exercise_code ASC
        ";

        return $this->db->query($sql)->getResult();

    }


    function getByPatientID($patient_id)
    {
        
        return $this->pt_exercise->getWhere(['patient_id' => $patient_id])->getRow();

    }


}