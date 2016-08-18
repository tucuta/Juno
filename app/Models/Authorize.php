<?php

namespace Models;

class Authorize extends \Core\Model {

	public function getHash($username){
		$data = $this->db->select("SELECT password FROM ". PREFIX ."users WHERE username = :username", array(':username' => $username));
		return $data[0]->password;
	}

	public function getID($username){
		$data = $this->db->select("SELECT id FROM " . PREFIX . "users WHERE username = :username", array(':username' => $username));
		return $data[0]->password;
	}


}


?>
