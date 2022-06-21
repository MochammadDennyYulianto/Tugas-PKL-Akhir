<?php

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