<?php namespace App\Models;

use CodeIgniter\Model;

class VideosModel extends Model
{

    protected $table      = 'ms_videos';
    protected $primaryKey = 'id';
    protected $ms_videos;

    public function __construct() {
        parent::__construct();
        
        $this->ms_videos = $this->db->table($this->table);
    }


    function getAll()
    {
        
        return $this->ms_videos->select('id, order_no, name, link, status');

    }


    function getByID($id){
        
        return $this->ms_videos->getWhere(['id' => $id])->getRow();

    }


    function create($data){

        $this->ms_videos->insert($data);
        
        return $this->db->insertID();

    }


    function updateData($id, $data){

        $this->ms_videos->where('id', $id)->update($data);
        
        return $this->db->affectedRows();

    }


    function deleteData($id)
    {

        $query = $this->db->table('pt_video_access_settings')->getWhere(['video_id' => $id])->getRow();

        if(isset($query)){
            return 0;
        }else{
            $this->ms_videos->delete(['id' => $id]);
        
            return $this->db->affectedRows();
        }

    }


}