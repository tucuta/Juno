<?php namespace Models;


/*
 * Users Model
 * Date Created: 12-15-2015
 * Author: Travis Pronschinske
 *
 */



class Settings extends \Core\Model {

	public function __construct(){
		parent::__construct();
	}

	public function Settings(){
		return $this->db->select("SELECT * FROM " . PREFIX . "settings");
	}

	public function getSettings(){
		return $this->db->select("SELECT * FROM " . PREFIX . "settings");
	}

  public function saveSettings($data, $where){
		 $this->db->update(PREFIX . "settings", $data, $where);
	}

}


?>
