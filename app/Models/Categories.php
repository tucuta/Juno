<?php namespace Models;


/*
 * Categories Model
 * Date Created: 12-31-2015
 * Author: Travis Pronschinske
 *
 */



class Categories extends \Core\Model {

	public function __construct(){
		parent::__construct();
	}

	public function Categories(){
		return $this->db->select("SELECT * FROM " . PREFIX . "categories");
	}

  public function getAllCategories(){
    return $this->db->select("SELECT * FROM " . PREFIX . "categories");
  }

	public function getCategoriesById($pageId){
		return $this->db->select("SELECT * FROM " . PREFIX . "categories WHERE categoryId=:categoryId", array(':categoryId' => $pageId));
	}

	public function getCatParentUrl($catParent){
		return $this->db->select("SELECT categoryUrl FROM " . PREFIX . "categories WHERE parentId=:categoryId", array(':parentId' => $catParent));
		return $data[0]->categoryUrl;
	}

	public function createCategories($catData){
		 $this->db->insert(PREFIX . 'categories', $catData);
	}

	public function updateCategories($data, $where){
		 $this->db->update(PREFIX . "categories", $data, $where);
	}

	public function deleteCategories($pageId){
	     $this->db->delete("DELETE FROM " . PREFIX . "categories WHERE categoryId=:categoryId", array(':categoryId' => $pageId));
	}

}


?>
