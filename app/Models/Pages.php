<?php namespace Models;


/*
 * Pages Model
 * Date Created: 12-15-2015
 * Author: Travis Pronschinske
 *
 */



class Pages extends \Core\Model {

	public function __construct(){
		parent::__construct();
	}

	public function Pages(){
		return $this->db->select("SELECT * FROM " . PREFIX . "pages");
	}

	public function getPage($pageUrl){
		return $this->db->select("SELECT * FROM " . PREFIX . "pages WHERE pageUrl = :pageUrl", array(':pageUrl' => $pageUrl));
	}

	public function getRecentPages(){
		return $this->db->select("SELECT * FROM " . PREFIX . "pages ORDER BY pageId desc limit 5");
	}

	public function getHomePage(){
		$pageUrl = "";
		return $this->db->select("SELECT * FROM " . PREFIX . "pages WHERE pageUrl=:pageUrl", array(':pageUrl' => $pageUrl));
	}
	public function getPageParentUrl($parentPage){
			$data = $this->db->select("SELECT * FROM " . PREFIX . "pages WHERE pageId=:parentPage", array(':parentPage' => $parentPage));
			return $data[0]->pageUrl;
	}

  public function getAllPages(){
    return $this->db->select("SELECT * FROM " . PREFIX . "pages");
  }

	public function getPageById($pageId){
		return $this->db->select("SELECT * FROM " . PREFIX . "pages WHERE pageId=:pageId", array(':pageId' => $pageId));
	}

	public function createPage($pageData){
		 $this->db->insert(PREFIX . 'pages', $pageData);
	}

	public function updatePage($data, $where){
		 $this->db->update(PREFIX . "pages", $data, $where);
	}

	public function deletePage($pageId){
			 $where = array('pageId' => $pageId);
	     $this->db->delete(PREFIX . 'pages', $where);
	}



}


?>
