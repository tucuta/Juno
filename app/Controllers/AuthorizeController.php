<?php namespace Controllers;

use \Core\View;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;

class AuthorizeController extends \Core\Controller {

		private $_model;
		private $_user;

	public function __construct(){
		$this->_model = new \Models\Authorize();
		$this->_user = new \Models\Users();
	}

	public function login(){

		//uncomment below and enter the word you want for a password to see hash value
		//echo Password::make('admin');

		if(Session::get('loggedin')){
			Url::redirect('admin');
		}

		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			//user login validation
			if(Password::verify($password, $this->_model->getHash($username)) == false){
				$error[] = 'Your Username or Password is incorrect. Please try again';
			} else {
				// to do if user successfully logged in
				if(!$error){
					$usersName = $this->_user->getUsersName($username);
					$roleLevel = $this->_user->getUserRole($username);

					Session::set('user', $usersName);
					Session::set('role', $roleLevel);
					Session::set('loggedin', true);
				  Url::redirect('admin');
				}
			}
		}

		$data['pageId'] = 'Login';
		$data['title'] = 'Login';
		View::rendertemplate('header-login', $data, 'juno');
		View::render('authorize/login',$data,$error);
		View::rendertemplate('footer-login', $data, 'juno');

	}

	public function resetEmail(){
		if(Session::get('loggedin')){
			Url::redirect('admin');
		}

		if(isset($_POST['submit'])){
			$username = $_POST['username'];

				// to do if user successfully logged in
				if(!$error){
					$userNameCompare = $this->_user->getUsersLoginName($username);

					if($username != $userNameCompare){
						$error[] = 'Your Account Doesnt Exist';
						View::rendertemplate('header-login', $data, 'juno');
						View::render('authorize/reset',$data,$error);
						View::rendertemplate('footer-login', $data, 'juno');
				} else {
					Session::set('userResetEmail', $usersEmail);
					Url::redirect('password-reset');
				}
			}

		}
				$data['pageId'] = 'Login';
				$data['title'] = 'Login';
				View::rendertemplate('header-login', $data, 'juno');
				View::render('authorize/reset',$data,$error);
				View::rendertemplate('footer-login', $data, 'juno');
	}
	public function resetPassword(){

		//uncomment below and enter the word you want for a password to see hash value
		//echo Password::make('admin');

		if(Session::get('loggedin')){
			Url::redirect('admin');
		}


		$data['pageId'] = 'Login';
		$data['title'] = 'Login';
		View::rendertemplate('header-login', $data, 'juno');
		View::render('authorize/password-reset',$data,$error);
		View::rendertemplate('footer-login', $data, 'juno');

	}

	public function logout(){
		Session::destroy();
		Url::redirect();
	}


}


?>
