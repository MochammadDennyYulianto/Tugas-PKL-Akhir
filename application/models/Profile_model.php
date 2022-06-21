<?php

use JetBrains\PhpStorm\NoReturn;

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
    public function addProfile($data)
    {
        # Load helper
        $this->load->helper('denzal');

        # Passing data into database
        $this->db->insert('user_profile', $data);

        # Redirecting page into the other
        set_alert_message('Congratulation, You have been registered, Please Login', 'alert-success');
    }
}
