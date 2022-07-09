<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model 
{
    public function getSubMenu() 
    {
        $query = "SELECT `user_menu`.*, `user_role`.`role`
                  FROM `user_menu` JOIN `user_role`
                  ON `user_menu`.`menu_id` = `user_role`.`id`
        ";

        return $this->db->query($query)->result_array();    
    }

    public function menuAccess()
    {
        $query = "SELECT `user_menu`.`id`,
                        `user_role`.`role` AS `menu`,
                        `user_menu`.`title`,
                        `user_menu`.`url`,
                        `user_menu`.`icon`,
                        `user_menu`.`is_active`
                    FROM `user_menu`
                    JOIN `user_role`
                     ON `user_menu`.`menu_id` = `user_role`.`id`
        ";
        return $this->db->query($query)->result_array();    
    }
}




?>