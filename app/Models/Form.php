<?php namespace Models;


/*
 * Pages Model
 * Date Created: 12-15-2015
 * Author: Travis Pronschinske
 *
 */



class Forms extends \Core\Model {

	public function __construct(){
		parent::__construct();
	}

	public function saveForm($formData){
		 $this->db->insert(PREFIX . 'forms', $formData);
	}




}


?>
