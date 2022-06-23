<?php

use JetBrains\PhpStorm\NoReturn;

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    public function __construct()
    {
        # Call the parent construct
        parent::__construct();

        # Load helper
        $this->load->helper('denzal');
    }

    public function addProfile(array $data)
    {
        # Passing data into database
        $this->db->insert('user_profile', $data);

        # Redirecting registration page into the login page
        set_alert_message('Congratulation, You have been registered, Please Login', 'alert-success');
    }

    public function getProfileByEmail(string $email)
    {
        # Type alias
        $EMPTY = false;

        # Get user profile by email or username
        $query_email = $this->db->get_where('user_profile', ['email' => $email])->row_array();
        $query_username = $this->db->get_where('user_profile', ['name' => $email])->row_array();
        
        # Check if the all query already have value or not
        if (($query_email) or ($query_username))
        {
            if ($query_email == $EMPTY)
            {
                /**
                 * If the queryEmail is empty
                 * use the quertyUsername instead
                 */
                return $query_username;
            }
            elseif ($query_username == $EMPTY)
            {
                /**
                 * If the queryUsername is empty
                 * use the quertyEmail instead
                 */
                return $query_email;
            }
        }
        # If it's not, then simply
        return null;
    }
    
    public function loginConfiguration(string $email, string $password)
    {
        $user = $this->getProfileByEmail($email);

        # Checking if the user is already exist in the database
        if ($user)
        {
            # Checking if the user has been activate or verify they account
            if ($user['is_active'] == ACTIVATED)
            {
                if (password_verify($password, $user['password']))
                {
                    $data = array(
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    );

                    $this->session->set_userdata($data);

                    if ($user['role_id'] == ADMIN_ROLE_ID)
                    {
                        redirect('admin');
                    }
                    elseif ($user['role_id'] == CREATOR_ROLE_ID)
                    {
                        redirect('creator');
                    }
                    elseif ($user['role_id'] == SUBSCRIBER_ROLE_ID)
                    {
                        redirect('subscriber');
                    }
                    redirect('customer');
                }
                set_alert_message('Wrong Password!');
            }
            # If the user has not been activate or verify, then simply
            set_alert_message('This account has not been activated yet!');
        }
        # If the user is not exist, then simply
        set_alert_message('Email or Username is not registered');
    }

    public function changeProfileImage(string $email)
    {
        $profile = $this->getProfileByEmail($email);

        $config['upload_path'] = './assets/img/profile/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image'))
        {
            $old_image = $profile['image'];
            $new_image = $this->upload->data('file_name');

            if ($old_image != 'default.jpg')
            {
                unlink(FCPATH.'assets/img/profile/'.$old_image);
            }

            $this->db->set('image', $new_image);
        }
        else
        {
            echo $this->upload->display_errors();
        }
    }
}
