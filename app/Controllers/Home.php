<?php

namespace App\Controllers;


use CodeIgniter\Cookie\Cookie;
use CodeIgniter\Cookie\CookieStore;
use Config\Services;

class Home extends BaseController
{


    public function __construct()
	{

        helper(['cookie', 'form', 'url']);

        if(!empty(get_cookie('cofit_user_id'))){
            $this->user_id		= base64_decode(get_cookie('cofit_user_id'));
        }

	}


    public function index()
    {

        $data = [
            'title'         => 'CoFit Rehab',
            'keywords'       => '',
            'description'   => ''
        ];

        return view('landing', $data);
    }


    public function signin()
    {

        if(!empty(get_cookie('cofit_user_id'))){
            return redirect()->to('/dashboard');
        }

        $data = [
            'title'         => 'CoFit Rehab - Masuk ke Aplikasi',
            'keywords'       => '',
            'description'   => ''
        ];

        return view('signin', $data);

    }


    public function signup()
    {

        $data = [
            'title'         => 'Buat Akun Dokter',
            'keywords'       => '',
            'description'   => ''
        ];

        return view('signup', $data);

    }


    public function signup_success()
    {

        $data = [
            'title'         => 'Akun Dokter Berhasil Dibuat',
            'keywords'       => '',
            'description'   => ''
        ];

        return view('signup-success', $data);

    }


    public function reset_password()
    {

        $data = [
            'title'         => 'Atur Ulang Kata Sandi',
            'keywords'       => '',
            'description'   => ''
        ];

        return view('reset-password', $data);

    }


    public function reset_password_success()
    {

        $data = [
            'title'         => 'Atur Ulang Kata Sandi Otomatis Berhasil',
            'keywords'       => '',
            'description'   => ''
        ];

        return view('reset-password-success', $data);

    }


}
