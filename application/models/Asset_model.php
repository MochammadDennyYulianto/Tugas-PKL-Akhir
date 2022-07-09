<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asset_model extends CI_Model
{
    public function queryAllAsset(): string
    {
        $query = "SELECT `asset_info`.`id`,
                         `asset_info`.`name`,
                         `image_collection`.`url`,
                         `asset_info`.`description`,
                     `asset_category`.`category`,
            CONCAT(`image_collection`.`image`, '.', `image_collection`.`format`) AS `image`,
                         `asset_info`.`downloaded`,
                         `asset_info`.`is_premium`,
                       `user_profile`.`name` AS `creator`,
                         `asset_info`.`date_created`
                    FROM `asset_info`
                    JOIN `asset_category`
                      ON `asset_info`.`category` = `asset_category`.`id`
                    JOIN `image_collection`
                      ON `asset_info`.`image_id` = `image_collection`.`id`
                    JOIN `user_profile`
                      ON `asset_info`.`creator_id` = `user_profile`.`id`";
        return $query;
    }

    public function getAllAssets(): array
    {
        $query = $this->queryAllAsset();
        return $this->db->query($query)->result_array();
    }

    public function filteredAssets($category): array
    {
        $query = $this->queryAllAsset() . " WHERE `asset_category`.`category`='" . ucwords($category) . "'";
        return $this->db->query($query)->result_array();
    }
    
    public function searchAsset()
    {
        $keyword = $this->input->post('keyword', true);
        $query = $this->queryAllAsset() . " WHERE `asset_info`.`name` LIKE '" . ucwords($keyword) . "'";
        var_dump($query);
        var_dump($this->db->query($query)->result_array());
        return $this->db->query($query)->result_array();
    }
}
