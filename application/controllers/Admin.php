<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('denzal');
        // isLoggedIn();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['listFeatures'] = $this->db->get('user_menu')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/admin-header.php',$data);
        $this->load->view('templates/admin-sidebar.php',$data);
        $this->load->view('templates/admin-topbar.php',$data);
        $this->load->view('admin/index.php',$data);
        $this->load->view('templates/admin-footer.php',$data);
    }

    public function featureAccess()
    {
        $data['title'] = 'Feature Access';
        $data['user'] = $this->db->get_where('user_profile', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['listFeatures'] = $this->db->get('user_menu')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();
        

        $this->load->view('templates/admin-header.php',$data);
        $this->load->view('templates/admin-sidebar.php',$data);
        $this->load->view('templates/admin-topbar.php',$data);
        $this->load->view('admin/feature-access.php',$data);
        $this->load->view('templates/admin-footer.php',$data);
    }

    public function menuAccess() 
    {
        $data['title'] = 'Menu Access';
        $this->load->model('Menu_model','menu');
        $data['menuAccess'] = $this->menu->menuAccess();

        $data['listFeatures'] = $this->db->get('user_menu')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/admin-header.php',$data);
        $this->load->view('templates/admin-sidebar.php',$data);
        $this->load->view('templates/admin-topbar.php',$data);
        $this->load->view('admin/menu-access.php',$data);
        $this->load->view('templates/admin-footer.php',$data);
    }

    public function editProfile() 
    {
        $data['title'] = 'Edit Profile';

        $data['listFeatures'] = $this->db->get('user_menu')->result_array();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/admin-header.php',$data);
        $this->load->view('templates/admin-sidebar.php',$data);
        $this->load->view('templates/admin-topbar.php',$data);
        $this->load->view('admin/edit-profile.php',$data);
        $this->load->view('templates/admin-footer.php',$data);
    }

    public function listcategory() 
    {
        $data['title'] = 'List Category';
        $data['user_profile'] = $this->db->get_where('user_profile', ['email' => 
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model','role');
        $data['listFeatures'] = $this->db->get('user_menu')->result_array();

        $data['listCategory'] = $this->role->getSubMenu();
        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        // echo $this->input->post('title');
        // die;

        if($this->form_validation->run() == false){
            $this->load->view('templates/admin-header.php', $data);
            $this->load->view('templates/admin-sidebar.php', $data);
            $this->load->view('templates/admin-topbar.php', $data);
            $this->load->view('admin/list-category.php', $data);
            $this->load->view('templates/admin-footer.php', $data);
        } else{
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'is_active' => $this->input->post('is_active'),
            ];
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New list category added!</div>');
            redirect('admin/listcategory');
        }
    }

    public function deletecategory($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
        set_alert_message('Data berhasil dihapus', 'alert-danger', 'admin/listcategory');
    }

    // public function addCategory()
    // {


    //     set_alert_message('message', 'alert-success', 'admin/listcategory');
    // }

}