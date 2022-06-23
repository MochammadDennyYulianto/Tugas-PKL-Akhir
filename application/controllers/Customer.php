<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('denzal');
        // isLoggedIn();
    }

    public function index()
    {
        $this->load->view('customer/index.php');
    }
}