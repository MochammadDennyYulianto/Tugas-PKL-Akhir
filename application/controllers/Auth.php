<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        # Call the parent construct
        parent::__construct();

        # Load library
        $this->load->library('form_validation');

        # Load model
        $this->load->model('Profile_model', 'profile');
        
        # Load helper
        $this->load->helper('denzal');        
    }

	public function index()
	{
        /**
         * Login using email or username rules
         * 
         * On the Login form, 2 field were required to filled
         * 1. Email-Username
         * 2. Password
         * 
        **/


        $config = array(

            # Email-username rules
            array(
                'field'  => 'email-username',
                'label'  => 'Email or Username',
                'rules'  => 'required|trim'
            ),

            # Password rules
            array(
                'field'  => 'password',
                'label'  => 'Password',
                'rules'  => 'required|trim|min_length[8]',
                'errors' => array(
                    'min_length' => 'Password too short!'
                )
            )
        );
        
        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false)
        {
            $data['title'] = 'DenZal | Login Page';
            
            $this->load->view('templates/auth-header.php', $data);
            $this->load->view('auth/auth-login.php');
            $this->load->view('templates/auth-footer.php');
        }
        else
        {
            $this->_login();
        }
    }

    public function registration()
    {
        /**
         * Registering new email rules
         * 
         * On the registration form, 3 field were required to filled
         * 1. Username
         * 2. Email
         * 3. Password
         * 
        **/

<<<<<<< HEAD

=======
>>>>>>> d5010c5bc473fa1a07145b24ca2183969594d45e
        $config = array(

            # Username rules
            array(
                'field'  => 'username',
                'label'  => 'Username',
                'rules'  => 'required|trim|is_unique[user_profile.name]',
                'errors' => array(
                    'is_uniqe' => 'This username is already taken'
                )
            ),

            # Email rules
            array(
                'field'  => 'email',
                'label'  => 'Email',
                'rules'  => 'required|trim|is_unique[user_profile.email]',
                'errors' => array(
                    'is_unique' => 'This email has already registered!'
                )
            ),

            # Password rules
            array(
                'field'  => 'password',
                'label'  => 'Password',
                'rules'  => 'required|trim|min_length[8]',
                'errors' => array(
                    'min_length' => 'Password too short!'
                )
            )
        );

        $this->form_validation->set_rules($config);

        if ($this->form_validation->run() == false)
        {
            $data['title'] = 'DenZal | Registrasion Page';
            
            # Show page
            $this->load->view('templates/auth-header.php', $data);
            $this->load->view('auth/auth-register.php');
            $this->load->view('templates/auth-footer.php');
        }
        else
        {
            # Get post value
            $username = $this->input->post('username', true);
            $email = $this->input->post('email', true);
            $password = $this->input->post('password');

            $data = array(
                'name'         => htmlspecialchars($username),
                'email'        => htmlspecialchars($email),
                'image'        => 'default.img',
                'password'     => password_hash($password, PASSWORD_DEFAULT),
                'followers'    => 0,
                'role_id'      => CUSTOMER_ROLE_ID,
                'is_active'    => ACTIVATED,
                'date_created' => time()
            );

            $this->profile->addProfile($data);
        }
    }

    private function _login()
    {
        $email = $this->input->post('email-username');
        $password = $this->input->post('password');

        $this->profile->loginConfiguration($email, $password);
    }
    
    public function logout()
    {
        $this->session->unset_userdata('email');
        set_alert_message('You have been logged out!', 'alert-success');
    }
}
