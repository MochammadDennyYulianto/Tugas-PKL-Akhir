<?php

function isLoggedIn()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email'))
    {
        redirect('auth');
    }
    else
    {
        $menu = $ci->uri->segment(1);
        // $query_menu = $ci->db->get_where('user_access_menu', ['menu' => $menu])->row_array();
        
        $role_id = $ci->session->userdata('role_id');
        // $menu_id = $query_menu['id'];

        $user_access_menu = $ci->db->get_where('user_access_menu',
            [
                'role_id' => $role_id,
                // 'menu_id' => $menu_id
            ]
        );

        if ($user_access_menu->num_rows() > 1)
        { redirect('auth/blocked'); }
    }
}

function set_alert_message($message, $alert_type = 'alert-danger', $page = 'auth')
{
    $ci = get_instance();

    $ci->session->set_flashdata('message',
        '<div class="alert '.$alert_type.'" role="alert">'.
            $message
        .'</div>'
    );
    redirect($page);
}

function check_access($role_id, $menu_id) 
{
    $ci = get_instance();

    $ci->db->where('role_id', $role_id);
    $ci->db->where('menu_id', $menu_id);
    $result = $ci->db->get('user_access_menu');

    if($result->num_rows() > 0) {
        return "checked='checked'";
    }
}