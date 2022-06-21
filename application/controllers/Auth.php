<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		$this->load->view('auth/auth-login');
	}

    public function registration()
    {
        $this->load->view('auth/auth-register.php');
    }
}
