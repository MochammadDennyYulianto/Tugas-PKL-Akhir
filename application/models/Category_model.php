<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{
    public function getAllCategory() : array
    {
        $query = $this->db->get('asset_category')->result_array();
        return $query;
    }

    public function getCategory(string $category) : array
    {
        $query = $this->db->get_where('asset_category', ['category' => $category]);
        return $query->row_array();
    }

    public function isCategoryActive(string $category) : bool
    {
        $query = $this->getCategory($category);
        
        if ($query['is_disabled'] == 0)
        { return true; }
        else
        { return false; }
    }

	public function getCategoryIcon(string $category) : string
    {
        $query = $this->getCategory($category);
        return $query['icon'];
    }
    
	public function getCategoryBackground(string $category) : string
    {
        $query = $this->getCategory($category);
        return $query['bg_color'];
    }
}
