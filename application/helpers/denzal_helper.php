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