<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        # Load library
        $this->load->library('form_validation');

        # Load model
        $this->load->model('Profile_model', 'profile');
    }

	public function index()
	{
		$this->load->view('auth/auth-login');

        // $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        // $this->form_validation->set_rules('password', 'Password', 'required');
	}

    public function registration()
    {
        # Type Alias
        $NOT_RUN = false;
        $USER_ROLE = 4;

        /**
         * Registering new email rules
         * 
         * On the registration form, 3 field were required to filled
         * 1. Username
         * 2. Email
         * 3. Password
         * 
        **/

        # Username rules
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user_profile.name]',
            ['is_uniqe' => 'This username is already taken']
        );

        # Email rules
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user_profile.email]',
            ['is_unique' => 'This email has already registered!']
        );

        # Password rules
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]',
            ['min_length' => 'Password too short!']
        );


        if ($this->form_validation->run() == $NOT_RUN)
        {
            $this->load->view('auth/auth-register.php');
        }
        else
        {
            # Post value
            $username = $this->input->post('username', true);
            $email = $this->input->post('email', true);
            $password = $this->input->post('password');

            $data = [
                'name' => htmlspecialchars($username),
                'email' => htmlspecialchars($email),
                'image' => 'default.img',
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'followers' => 0,
                'role_id' => $USER_ROLE,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->profile->addProfile($data);
        }
    }
}
