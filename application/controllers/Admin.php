<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('denzal');
        $this->load->model('Menu_model','menu');
        // isLoggedIn();
    }

    public function index()
    {
        $this->template('index.php', 'Dashboard');
    }

    public function featureAccess()
    {
        $data['allProfile'] = $this->profile->getAllProfile();
        $this->template('feature-access.php', 'Feature Access', $data);
    }

    public function menuAccess() 
    {
        $slug = $this->uri->segment(3);

        $data['role_access'] =  $this->db->get_where('user_role', ['id' => $slug])->row_array();
        $data['menuAccess'] = $this->menu->menuAccess();

        $this->template('menu-access.php', 'Menu Access', $data);
    }

    public function editProfile() 
    {
        $this->template('edit-profile.php', 'Edit Profile');
    }

    public function listcategory() 
    {
        $this->load->helper('denzal');

        $data['listFeatures'] = $this->db->get('user_menu')->result_array();
        $data['listCategory'] = $this->menu->menuAccess();

        $config = array(

            # Title rules
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required'
            ),

            # Menu rules
            array(
                'field' => 'menu_id',
                'label' => 'Menu',
                'rules' => 'required'
            ),

            # URL rules
            array(
                'field' => 'url',
                'label' => 'URL',
                'rules' => 'required'
            ),

            # Icon rules
            array(
                'field' => 'icon',
                'label' => 'Icon',
                'rules' => 'required'
            )
        );

        $this->form_validation->set_rules($config);
        
        if($this->form_validation->run() == false)
        {
            $this->template('list-category.php', 'List Category', $data);
        }
        else
        {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_menu', $data);
            set_alert_message('New list category added!', 'alert-success', 'admin/listcategory');
        }
    }

    public function deletecategory($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
        set_alert_message('Data berhasil dihapus', 'alert-danger', 'admin/listcategory');
    }

    private function template(String $url, String $title, Array $data = null)
    {
        $data['title'] = $title;

        $data['listFeatures'] = $this->db->get('user_menu')->result_array();
        $data['listRole'] = $this->db->get('user_role')->result_array();

        $data['profile'] = $this->profile->getProfileByEmail($this->session->userdata('email'));
        $data['user_role'] = $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();

        $this->load->view('templates/admin-header.php',$data);
        $this->load->view('templates/admin-sidebar.php',$data);
        $this->load->view('templates/admin-topbar.php',$data);
        $this->load->view('admin/'.$url ,$data);
        $this->load->view('templates/admin-footer.php',$data);
    }

}