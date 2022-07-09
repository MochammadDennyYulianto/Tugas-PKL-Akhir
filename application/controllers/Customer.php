<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('denzal');
        $this->load->model('Category_model', 'category');
        $this->load->model('Profile_model', 'profile');
        $this->load->model('Asset_model', 'asset');
        // isLoggedIn();
    }

    public function index()
    {
        $data['getAllCategory'] = $this->category->getAllCategory();
        $data['filteredAssets'] = $this->asset->filteredAssets('templates');

        $this->load->view('templates/customer-header.php');
        $this->load->view('templates/customer-navbar.php', $data);
        $this->load->view('customer/index.php', $data);
        $this->load->view('templates/customer-footer.php');
    }

    public function editProfile()
    {
        $this->load->view('templates/customer-header.php');
        $this->load->view('templates/customer-navbar.php');
        $this->load->view('customer/edit-profile.php');
        $this->load->view('templates/customer-footer.php');
    }
}
