<?php 

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\VideosModel;

use \Hermawan\DataTables\DataTable;


class Videos extends BaseController
{

    protected $videosModel;

    public function __construct()
	{

        helper(['form', 'url', 'cookie']);
        $this->videosModel = new VideosModel();

        if(!empty(get_cookie('cofit_user_id'))){
            $this->user_id		= base64_decode(get_cookie('cofit_user_id'));         
        }

    }
    
    
    public function getAll()
	{

		// $result['data']		= $this->videosModel->getAll($status);

		// echo json_encode($result);

        return DataTable::of($this->videosModel->getAll())
                ->setSearchableColumns(['name', 'link', 'status'])
               ->toJson(true);

    }


    public function getByID($id)
	{

		$result     = $this->videosModel->getByID($id);

		echo json_encode($result);

    }


    public function create()
    {

        $post    = $this->request->getPost();

        if($post['source_type'] == 'Local'){

            $moduleFile   = $this->request->getFile('upload');

            if($moduleFile == NULL) {

                $data = [
                    'order_no'      => str_replace("'", "`", $post['order_no']),
                    'name'          => str_replace("'", "`", $post['name']),
                    'source_type'    => $post['source_type'],
                    'status'        => $post['status'],               
                    'created_by'    => $this->user_id,
                    'created_at'    => date('Y-m-d H:i:s')
                ];

            }else{

                $moduleFileExt = $moduleFile->getClientExtension();
    
                $moduleFileName = microtime(true);
                $moduleFileName = str_replace('.', '', $moduleFileName);
                $moduleFileName = date('Y-m-d').'-'.$moduleFileName.'.'.$moduleFileExt;
                
                $moduleFileDir = './upload/videos';
                if(is_dir($moduleFileDir)){}else{ mkdir($moduleFileDir, 0777, true); }
                
                $moduleFile->move($moduleFileDir, $moduleFileName);

                $data = [
                    'order_no'      => str_replace("'", "`", $post['order_no']),
                    'name'          => str_replace("'", "`", $post['name']),
                    'source_type'    => $post['source_type'],
                    'link'          => $moduleFileName,
                    'status'        => $post['status'],               
                    'created_by'    => $this->user_id,
                    'created_at'    => date('Y-m-d H:i:s')
                ];

            }


        }else if($post['source_type'] == 'YouTube'){

            $data = [
                'order_no'      => str_replace("'", "`", $post['order_no']),
                'name'          => str_replace("'", "`", $post['name']),
                'source_type'    => $post['source_type'],
                'link'          => $post['link'],
                'status'        => $post['status'],               
                'created_by'    => $this->user_id,
                'created_at'    => date('Y-m-d H:i:s')
            ];

        }

        $insert = $this->videosModel->create($data);
    
        if($insert > 0){

            echo json_encode(['status' => TRUE, 'message' => 'Data video berhasil ditambahkan...']);

        }else{

            echo json_encode(['status' => FALSE, 'message' => 'Mohon maaf, data Anda tidak dapat disimpan!']);

        }

        
    }


    public function update()
    {
        
        $post    = $this->request->getPost();   
        
        if($post['source_type'] == 'Local'){

            $moduleFile   = $this->request->getFile('upload');

            if($moduleFile == NULL) {

                $data = [
                    'order_no'      => str_replace("'", "`", $post['order_no']),
                    'name'          => str_replace("'", "`", $post['name']),
                    'source_type'    => $post['source_type'],
                    'status'        => $post['status'],               
                    'created_by'    => $this->user_id,
                    'created_at'    => date('Y-m-d H:i:s')
                ];

            }else{

                $moduleFileExt = $moduleFile->getClientExtension();
    
                $moduleFileName = microtime(true);
                $moduleFileName = str_replace('.', '', $moduleFileName);
                $moduleFileName = date('Y-m-d').'-'.$moduleFileName.'.'.$moduleFileExt;
                
                $moduleFileDir = './upload/videos';
                if(is_dir($moduleFileDir)){}else{ mkdir($moduleFileDir, 0777, true); }
                
                $moduleFile->move($moduleFileDir, $moduleFileName);

                $data = [
                    'order_no'      => str_replace("'", "`", $post['order_no']),
                    'name'          => str_replace("'", "`", $post['name']),
                    'source_type'    => $post['source_type'],
                    'link'          => $moduleFileName,
                    'status'        => $post['status'],               
                    'created_by'    => $this->user_id,
                    'created_at'    => date('Y-m-d H:i:s')
                ];

            }


        }else if($post['source_type'] == 'YouTube'){

            $data = [
                'order_no'      => str_replace("'", "`", $post['order_no']),
                'name'          => str_replace("'", "`", $post['name']),
                'source_type'    => $post['source_type'],
                'link'          => $post['link'],
                'status'        => $post['status'],               
                'created_by'    => $this->user_id,
                'created_at'    => date('Y-m-d H:i:s')
            ];

        }               

        $update = $this->videosModel->updateData($post['video_id'], $data);

        if($update > 0){

            echo json_encode(['status' => TRUE, 'message' => 'Data video berhasil diubah...']);

        }else{

            echo json_encode(['status' => FALSE, 'message' => 'Tidak ada perubahan data!']);

        }
        
        
    }


    public function delete()
    {

        $post   = $this->request->getPost();
        
        if($this->videosModel->deleteData($post['id']) > 0){

            echo json_encode(TRUE);

        }else{

            echo json_encode(FALSE);

        }

    }


    

}
