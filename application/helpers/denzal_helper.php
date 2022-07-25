<?php

function isLoggedIn() : bool
{
    $ci = get_instance();

    if ($ci->session->userdata('email'))
    { return true; }
    else
    { return false; }
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