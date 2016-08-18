<?php namespace Controllers;

use \Core\View;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;
use Helpers\AjaxHandler as Ajax;

class FormsController extends \Core\Controller {

	private $_form;

	public function __construct(){
		$this->_form = new \Models\Form();
	}

  public function contactFormSubmit(){

					$name = Ajax::get("name");
				 	$email = Ajax::get("email");
          $phone = Ajax::get("phone");
          $message = Ajax::get("message");

            $formData = array(
              'formName' => 'Contact',
              'fullName' => $name,
              'email' => $email,
              'phone' => $phone,
              'message' => $message,
            );

            $this->_form->saveForm($formData);


    }

}


?>
