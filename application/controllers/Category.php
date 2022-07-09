<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('denzal');
        $this->load->model('Category_model', 'category');
        $this->load->model('Asset_model', 'asset');
        // isLoggedIn();
    }

    public function view()
    {
        $slug = $this->uri->segment(3);
        $data['getAllCategory'] = $this->category->getAllCategory();
        $data['filteredAssets'] = $this->asset->filteredAssets($slug);

        $this->load->view('templates/customer-header.php');
        $this->load->view('templates/customer-navbar.php');
        $this->load->view('templates/customer-header-shortcut.php', $data);
        $this->load->view('category/index.php', $data);
        $this->load->view('templates/customer-footer.php');
    }

    public function viewAll()
    {
        $data['getAllCategory'] = $this->category->getAllCategory();
        $data['getAllAssets'] = $this->asset->getAllAssets();

        $this->load->view('templates/customer-header.php');
        $this->load->view('templates/customer-navbar.php');
        $this->load->view('templates/customer-header-shortcut.php', $data);
        $this->load->view('category/all-category.php', $data);
        $this->load->view('templates/customer-footer.php');
    }

    public function search()
    {
        $data['getAllCategory'] = $this->category->getAllCategory();
        if ( $this->input->post('keyword') )
        {
            echo $this->input->post('keyword');
            $data['searchAssets'] = $this->asset->searchAsset();
        }

        $this->load->view('templates/customer-header.php');
        $this->load->view('templates/customer-navbar.php');
        $this->load->view('templates/customer-header-shortcut.php', $data);
        $this->load->view('category/searched-category.php', $data);
        $this->load->view('templates/customer-footer.php');
    }
}