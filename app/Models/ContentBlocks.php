<?php namespace Models;


/*
 * Content Block Model
 * Date Created: 12-15-2015
 * Author: Travis Pronschinske
 *
 */



class ContentBlocks extends \Core\Model {

	public function __construct(){
		parent::__construct();
	}

	public function ContentBlock(){
		return $this->db->select("SELECT * FROM " . PREFIX . "contentblock");
	}

	public function getRecentBlocks(){
		return $this->db->select("SELECT * FROM " . PREFIX . "contentblock ORDER BY blockId desc limit 5");
	}
  public function getAllContentBlocks(){
    return $this->db->select("SELECT * FROM " . PREFIX . "contentblock");
  }

	public function getContentBlockById($blockId){
		return $this->db->select("SELECT * FROM " . PREFIX . "contentblock WHERE blockId=:blockId", array(':blockId' => $blockId));
	}

	public function createContentBlock($blockData){
		 $this->db->insert(PREFIX . 'contentblock', $blockData);
	}

	public function updateContentBlock($data, $where){
		 $this->db->update(PREFIX . "contentblock", $data, $where);
	}

	public function deleteContentBlock($blockId){
	     $this->db->delete("DELETE FROM " . PREFIX . "contentblock WHERE blockId=:blockId", array(':blockId' => $blockId));
	}



}


?>
