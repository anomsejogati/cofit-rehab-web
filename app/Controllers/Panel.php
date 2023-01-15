<?php

namespace App\Controllers;

use App\Models\UsersModel;


use CodeIgniter\Cookie\Cookie;
use CodeIgniter\Cookie\CookieStore;
use Config\Services;


class Panel extends BaseController
{

    protected $usersModel;

    protected $user_id;


    public function __construct()
	{
        
        $this->usersModel = new UsersModel();

        helper(['cookie', 'form', 'url']);

        if(!empty(get_cookie('cofit_user_id'))){
            $this->user_id		= base64_decode(get_cookie('cofit_user_id'));
			$this->users		= $this->usersModel->getByID($this->user_id);
        }

	}


    public function index()
    {

        if(empty(get_cookie('cofit_user_id'))){
            return redirect()->to('/sign-in');
        }

		$data = [
            'title'         => 'CoFit Rehab - Panel Dokter',
            'keywords'      => '',
            'description'   => '',
			'page'			=> 'dashboard',
			'users'			=> $this->users
        ];

        return view('panel/index', $data);

    }

	
	public function auth()
	{
	    
	    $session = session();
	    
	    $user_id = $this->request->getVar('user_id');
	    $password = $this->request->getVar('password');

		$session_code  = md5(date('YmdHis').$user_id);

		$agent = $this->request->getUserAgent();

		$users = $this->usersModel->auth($user_id, $password);

		if(isset($users)){

			$data = [
				'user_id'		=> $users->id,
				'session_code'  => $session_code,				
				'login'    		=> date('Y-m-d H:i:s'),
				'logout'		=> '0000-00-00',
				'ip_address'    => $this->request->getIPAddress(),
				'browser'		=> $agent->getBrowser()." - ".$agent->getVersion(),
				'device'		=> $agent->getMobile()." - ".$agent->getPlatform()				
			];

			$createLog = $this->usersModel->createUserLog($data);
						
			return redirect()->to('/dashboard')->setCookie('cofit_user_id', base64_encode($users->id), 3600*24*5)->setCookie('cofit_session_code', base64_encode($users->role_id), 3600*24*5);    			

		}else{

			$session->setFlashdata('msg', 'Email dan Kata Sandi salah!');
            return redirect()->to('/sign-in');

		}
	    
	}


	public function logout()
	{		
		
		return redirect()->to('/')->deleteCookie('cofit_user_id')->deleteCookie('cofit_session_code')->send();
		
		
	}	


	public function workout_video()
    {

        if(empty(get_cookie('cofit_user_id'))){
            return redirect()->to('/sign-in');
        }

		$data = [
            'title'         => 'Video Latihan',
            'keywords'      => '',
            'description'   => '',
			'page'			=> 'pages/video/main',
			'users'			=> $this->users
        ];

        return view('panel/index', $data);

    }


	public function patient()
    {

        if(empty(get_cookie('cofit_user_id'))){
            return redirect()->to('/sign-in');
        }

		$data = [
            'title'         => 'Pasien',
            'keywords'      => '',
            'description'   => '',
			'page'			=> 'pages/patient/main',
			'users'			=> $this->users
        ];

        return view('panel/index', $data);

    }


	public function activity()
    {

        if(empty(get_cookie('cofit_user_id'))){
            return redirect()->to('/sign-in');
        }

		$data = [
            'title'         => 'Riwayat Aktivitas Latihan',
            'keywords'      => '',
            'description'   => '',
			'page'			=> 'pages/activity/main',
			'users'			=> $this->users
        ];

        return view('panel/index', $data);

    }


	public function evaluation()
    {

        if(empty(get_cookie('cofit_user_id'))){
            return redirect()->to('/sign-in');
        }

		$data = [
            'title'         => 'Evaluasi Latihan',
            'keywords'      => '',
            'description'   => '',
			'page'			=> 'pages/evaluation/main',
			'users'			=> $this->users
        ];

        return view('panel/index', $data);

    }



}