<?php namespace App\Models;

use CodeIgniter\Model;

class VideoAccessSettingsModel extends Model
{

    protected $table      = 'pt_video_access_settings';
    protected $primaryKey = 'id';
    protected $pt_settings;

    public function __construct() {
        parent::__construct();
        
        $this->pt_settings = $this->db->table($this->table);
        $this->ms_videos = $this->db->table('ms_videos');
    }


    function getAll()
    {

        $builder = $this->db->query('SELECT a.id, a.mr_no, a.name, a.covid_level FROM us_patient a')->getResult();                    
                    
        foreach($builder as $row){

            $sql = "SELECT a.video_id, b.name AS video_name FROM pt_video_access_settings a 
                    JOIN ms_videos b ON a.video_id=b.id 
                    WHERE a.patient_id='$row->id'
            ";

            $row->videos = $this->db->query($sql)->getResult();

        }
        
        return $builder;

    }


    function getByPatientID($patient_id)
    {

        $videos = $this->db->query("SELECT a.* FROM ms_videos a WHERE a.status='Restricted'")->getResult();

        foreach($videos as $row){

            $query = $this->pt_settings->getWhere(['patient_id' => $patient_id, 'video_id' =>$row->id])->getRow();

            if(isset($query)){

                $row->is_set = 1;

            }else{

                $row->is_set = 0;

            }

        }

        return $videos;

    }


    function getByID($id){
        
        return $this->pt_settings->getWhere(['id' => $id])->getRow();

    }


    function create($data){

        $this->pt_settings->insert($data);
        
        return $this->db->insertID();

    }


    function deleteData($patient_id, $video_id)
    {
        
        $this->pt_settings->delete(['patient_id' => $patient_id, 'video_id'=>$video_id]);
        
        return $this->db->affectedRows();

    }


}