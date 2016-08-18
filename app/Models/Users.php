<?php namespace Models;


/*
 * Users Model
 * Date Created: 12-15-2015
 * Author: Travis Pronschinske
 *
 */



class Users extends \Core\Model {

	public function __construct(){
		parent::__construct();
	}

	public function Users(){
		return $this->db->select("SELECT * FROM " . PREFIX . "users");
	}

	public function getAllUsers(){
		return $this->db->select("SELECT * FROM " . PREFIX . "users");
	}

	public function getUserById($userId){
		return $this->db->select("SELECT * FROM " . PREFIX . "users WHERE userId=:userId", array(':userId' => $userId));
	}

	public function getUserRoleLevel($username){
		$data = $this->db->select("SELECT rolelevel FROM " . PREFIX . "users WHERE username=:username", array(':username' => $username));
		return $data[0]->rolelevel;
	}

	public function getUserRole($username){
		$data = $this->db->select("SELECT role FROM " . PREFIX . "users WHERE username=:username", array(':username' => $username));
		return $data[0]->role;
	}

	public function getUsersName($username){
		$data = $this->db->select("SELECT name FROM " . PREFIX . "users WHERE username=:username", array(':username' => $username));
		return $data[0]->name;
	}

	public function getMemberAcctNumber($username){
		$data = $this->db->select("SELECT memberAcctNumber FROM " . PREFIX . "users WHERE username=:username", array(':username' => $username));
		return $data[0]->memberAcctNumber;
	}

	public function getUsersId($username){
		$data = $this->db->select("SELECT userId FROM " . PREFIX . "users WHERE username=:username", array(':username' => $username));
		return $data[0]->userId;
	}

	public function getUsersLoginName($username){
		$data = $this->db->select("SELECT username FROM " . PREFIX . "users WHERE username=:username", array(':username' => $username));
		return $data[0]->username;
	}

	public function getUserLoginData(){
			return $this->db->select("SELECT * FROM " . PREFIX . "users");
	}

	public function createUser($userData){
		 $this->db->insert(PREFIX . 'users', $userData);
	}

	public function updateUser($data, $where){
		 $this->db->update(PREFIX . "users", $data, $where);
	}

	public function deleteUser($userId){
			 $where = array('userId' => $userId);
	     $this->db->delete(PREFIX . 'users', $where);
	}

	public function saveLoginTime($username){
		$date = date('Y-m-d H:i:s');
		$dataLog = array(
				'dateLoggedIn' => $date
		);
		$where = array('username' => $username);
		$this->db->update(PREFIX . "users", $dataLog, $where);
	}

	public function saveLogoutTime($username){

		$data = $this->db->select("SELECT userlogins FROM " . PREFIX . "users WHERE username=:username", array(':username' => $username));
		$count = $data[0]->userlogins;///
		$newCount = $count + 1;
		$date = date('Y-m-d H:i:s');
		$dataLog = array(
				'userlogins' => $newCount,
				'dateLoggedOut' => $date
		);

		$where = array('username' => $username);

	 $this->db->update(PREFIX . "users", $dataLog, $where);
	}



}


?>
