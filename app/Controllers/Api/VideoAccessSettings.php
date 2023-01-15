<?php 

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\VideosModel;
use App\Models\VideoAccessSettingsModel;

use \Hermawan\DataTables\DataTable;


class VideoAccessSettings extends BaseController
{

    protected $videosModel;
    protected $settingsModel;

    public function __construct()
	{

        helper(['form', 'url', 'cookie']);
        $this->videosModel = new VideosModel();
        $this->settingsModel = new VideoAccessSettingsModel();

        if(!empty(get_cookie('cofit_user_id'))){
            $this->user_id		= base64_decode(get_cookie('cofit_user_id'));         
        }

    }
    
    
    public function getAll()
	{

        // return DataTable::of($this->settingsModel->getAll())
        //         ->setSearchableColumns(['name', 'link', 'status'])
        //        ->toJson(true);

        $result['data']     = $this->settingsModel->getAll();

		echo json_encode($result);

    }


    public function getByPatientID($id)
	{

		$result     = $this->settingsModel->getByPatientID($id);

		echo json_encode($result);

    }


    public function updateSetAccessVideo()
    {

        $post    = $this->request->getPost();

        $patient_id = $post['patient_id'];
        $video_id = $post['video_id'];

        if($post['status'] == 'insert'){

            $data = [
                'patient_id'    => $patient_id,
                'video_id'      => $video_id,
                'created_by'    => $this->user_id,
                'created_at'    => date('Y-m-d H:i:s')
            ];
    
            $insert = $this->settingsModel->create($data);
    
            if($insert > 0){
    
                echo json_encode(['status' => TRUE, 'message' => 'Data akses latihan berhasil ditambahkan...']);
    
            }else{
    
                echo json_encode(['status' => FALSE, 'message' => 'Tidak ada perubahan data!']);
    
            }

        }else if($post['status'] == 'delete'){

            if($this->settingsModel->deleteData($patient_id, $video_id) > 0){

                echo json_encode(['status' => TRUE]);
    
            }else{
    
                echo json_encode(['status' => FALSE]);
    
            }

        }

    }
    
   

}
