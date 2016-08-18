<?php namespace Models;


/*
 * Menu Model
 * Date Created: 12-15-2015
 * Author: Travis Pronschinske
 *
 */



class Menu extends \Core\Model {

	public function __construct(){
		parent::__construct();
	}

	public function Menu(){
		return $this->db->select("SELECT * FROM " . PREFIX . "mainmenu");
	}

	  public function getAllMenus(){
	    return $this->db->select("SELECT * FROM " . PREFIX . "mainmenu");
	  }

	public function getMenuById($mainMenuId){
		return $this->db->select("SELECT * FROM " . PREFIX . "mainmenu WHERE mainMenuId=:mainMenuId", array(':mainMenuId' => $mainMenuId));
	}

	public function createMenu($pageData){
		 $this->db->insert(PREFIX . 'mainmenu', $pageData);
	}

	public function updateMenu($data, $where){
		 $this->db->update(PREFIX . "mainmenu", $data, $where);
	}

	public function deleteMenu($pageId){
	     $this->db->delete("DELETE FROM " . PREFIX . "mainmenu WHERE mainMenuId=:mainMenuId", array(':mainMenuId' => $mainMenuId));
	}

  public function getMainMenuItems($mainMenuId){
	     return $this->db->select("SELECT * FROM " . PREFIX . "menu WHERE menuKey=:menuKey", array(':menuKey' => $mainMenuId));
	}

	public function getMenuByKey($keyId){
		return $this->db->select("SELECT * FROM " . PREFIX . "menu WHERE menuKey=:menuKey", array(':menuKey' => $keyId));
	}
	public function getLastMenuKey(){
		$data = $this->db->select("SELECT mainMenuKey FROM " . PREFIX . "mainmenu ORDER BY mainMenuId DESC LIMIT 1");
		return $data[0]->mainMenuKey;
	}

}


?>
