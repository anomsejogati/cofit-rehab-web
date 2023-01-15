<?php namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{

    protected $table      = 'us_patient';
    protected $primaryKey = 'id';
    protected $us_patient;

    public function __construct() {
        parent::__construct();
        
        $this->us_patient = $this->db->table($this->table);
    }


    function getAll()
    {

        $builder = $this->db->table('us_patient a')
                    ->select('a.id, a.mr_no, a.name, b.phone_no, b.email, a.covid_level, a.created_at')
                    ->join('us_users b', 'a.user_id=b.id');
        
        return $builder;

    }


    public function listOfPatient($searchParam)
    {

        $result = $this->us_patient->like('name', (isset($searchParam))?$searchParam:'')
                    ->select('id, name')->get();

        // return $this->db->query("SELECT id, user_id, name FROM us_patient WHERE name LIKE '%$searchParam%' ORDER BY name ASC")
        //                 ->getResult();
        return $result->getResult();

    }


    function exportAll()
    {

        $sql = "SELECT a.*, b.phone_no, b.email FROM us_patient a JOIN us_users b ON a.user_id=b.id ORDER BY a.name ASC";

        $builder = $this->db->query($sql)->getResult();
        
        return $builder;

    }


    function getExerciseMenu()
    {

        $builder = $this->db->table('us_patient a')
                    ->select('a.mr_no, a.name, b.lat_pernapasan, b.lat_aerobik_1, b.lat_aerobik_2, b.lat_aerobik_3, b.lat_penguatan')
                    ->join('us_rehab_option b', 'a.rehab_option=b.id');
        // $sql = "SELECT a.name, a.mr_no, b.* FROM us_patient a JOIN us_rehab_option b ON a.rehab_option=b.id ORDER BY a.name ASC";

        // $builder = $this->db->query($sql)->getResult();
        
        return $builder;

    }


    function getByID($id)
    {

        $sql = "SELECT a.*, b.email, b.phone_no FROM us_patient a 
                JOIN us_users b ON a.user_id=b.id 
                WHERE a.id='$id'";
        
        return $this->db->query($sql)->getRow();

    }


    function createMrNo()
    {

        $sql = "SELECT MAX(RIGHT(mr_no, 9)) AS last_no FROM us_patient";

        $stmt = $this->db->query($sql)->getRow();

        if(isset($stmt)){

            $lastNo = $stmt->last_no;

            $nextNoUrut = $lastNo + 1;

            $nextMrNo = sprintf('%09s', $nextNoUrut);

            return $nextMrNo;

        }else{

            return "000000001";
        }

    }


    function create($data)
    {

        $this->us_patient->insert($data);
        
        return $this->db->insertID();

    }


    function updateData($id, $data)
    {

        $this->us_patient->where('id', $id)->update($data);
        
        return $this->db->affectedRows();

    }


    function deleteData($id)
    {

        $query = $this->db->table('pt_video_access_settings')->getWhere(['patient_id' => $id])->getRow();

        if(isset($query)){
            return 0;
        }else{
            $this->us_patient->delete(['id' => $id]);
        
            return $this->db->affectedRows();
        }

    }


}