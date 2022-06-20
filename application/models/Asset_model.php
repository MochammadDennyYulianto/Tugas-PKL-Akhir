<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asset_model extends CI_Model
{
	public function getAllAssets() : array
	{
		$query = $this->db->get('asset_info');
        return $query->result_array();
	}

    public function filterCategory($category) : array
    {
        $query = $this->db->get_where('asset_info', ['category' => $category]);
        return $category->result_array();
    }
}
