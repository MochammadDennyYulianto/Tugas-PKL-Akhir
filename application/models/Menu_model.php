<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model 
{
    public function menuAccess() 
    {
        $query = "SELECT `user_menu`.*, `user_role`.`role`
                    FROM `user_menu`
                    JOIN `user_role`
                      ON `user_menu`.`menu_id` = `user_role`.`id`
        ";

        return $this->db->query($query)->result_array();    
    }
}
