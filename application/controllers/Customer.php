<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('denzal');
        $this->load->model('Category_model', 'category');
        $this->load->model('Asset_model', 'asset');
        // isLoggedIn();
    }

    public function index()
    {
        if ($this->session->userdata('email'))
        {
            $data['profile'] = $this->profile->getProfileByEmail($this->session->userdata('email'));
            $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        }

        $data['getAllCategory'] = $this->category->getAllCategory();
        $data['filteredAssets'] = $this->asset->filteredAssets('templates');

        $this->load->view('templates/customer-header.php');
        $this->load->view('templates/customer-navbar.php', $data);
        $this->load->view('customer/index.php', $data);
        $this->load->view('templates/customer-footer.php');
    }

    public function editProfile()
    {
        $data['profile'] = $this->profile->getProfileByEmail($this->session->userdata('email'));
        $data['role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
        
        $this->load->view('templates/customer-header.php');
        $this->load->view('templates/customer-navbar.php', $data);
        $this->load->view('customer/edit-profile.php');
        $this->load->view('templates/customer-footer.php');
    }
}
