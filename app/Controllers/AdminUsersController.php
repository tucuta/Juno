<?php
/**
 * Welcome controller
 *
 * @author David Carr - dave@daveismyname.com
 * @version 2.2
 * @date June 27, 2014
 * @date updated Sept 19, 2015
 */

namespace Controllers;

use \Core\View;
use Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class AdminUsersController extends Controller
{

    private $_users;

    /**
     * Call the parent construct
     */
    public function __construct()
    {

      if(!Session::get(loggedin)){
        Url::redirect('login');
      }
        $this->_users = new \Models\Users();
    }

    /***
     * Define Index page title and load template files
     */
    public function adminUsers()
    {
        $data['title'] = 'Users';

        $data['user_list'] = $this->_users->getAllUsers();

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/users/index', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function createUsers()
    {
        $data['title'] = 'Add User';


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $name = $_POST['name'];
          $username = $_POST['username'];
          $password = $_POST['password'];
          $passwordHashed = Password::make($password);
          $roleLevel = $_POST['roleLevel'];

          if($roleLevel == 1){
            $role = 'Super Admin';
          } else {
            $role = 'Member';
          }
          $status = $_POST['status'];
          $dateCreated = date('Y-m-d H:i:s');


          if($username != null && $password != null && $roleLevel != null && $status != null){
            $userData = array(
              'name' => $name,
              'role' => $role,
              'username' => $username,
              'password' => $passwordHashed,
              'rolelevel' => $roleLevel,
              'status' => $status,
              'dateCreated' => $dateCreated
            );

            $this->_users->createUser($userData);
            Url::redirect('admin/users');
          }


        } // end of post method

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/users/add', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function editUsers($userId)
    {
        $data['title'] = 'Edit User';
        $data['user'] = $this->_users->getUserById($userId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $name = $_POST['name'];
          $username = $_POST['username'];
          $password = $_POST['password'];
          $passwordHashed = Password::make($password);
          $roleLevel = $_POST['roleLevel'];
          $status = $_POST['status'];

          if($roleLevel == 1){
            $role = 'Super Admin';
          } else {
            $role = 'Member';
          }

          if($username != null && $password != null && $roleLevel != null && $status != null){
            $userData = array(
              'name' => $name,
              'role' => $role,
              'username' => $username,
              'password' => $password,
              'rolelevel' => $roleLevel,
              'status' => $status,
            );

            $where = array('userId' => $userId);
            $this->_users->updateUser($userData, $where);

            Session::set('message', 'User Updated Successfully');
            Url::redirect('admin/users');
          }
        }

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/users/edit', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function updateUsers()
    {
        $data['title'] = $this->language->get('welcome_text');
        $data['welcome_message'] = $this->language->get('welcome_message');

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/users', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function deleteUsers($userId)
    {
        $this->_users->deleteUser($userId);
        Url::redirect('admin/users');
        Session::set('message', 'User Deleted');
    }


}
