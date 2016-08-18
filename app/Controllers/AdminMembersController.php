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
class AdminMembersController extends Controller
{

    private $_users;
    private $_members;

    /**
     * Call the parent construct
     */
    public function __construct()
    {

  
        $userRoleLevel = Session::get('roleLevel');
        if(!Session::get(loggedin)){
          Url::redirect('login');
        }
        if($userRoleLevel != 1){
          Url::redirect();
        }

        $this->_users = new \Models\Users();
        $this->_members = new \Models\Members();
    }

    /**
     * Define Index page title and load template files
     */
    public function adminMembers()
    {
        $data['title'] = 'Users';

        //$data['member_list'] = $this->_members->getAllMembers();
        $members = new \Helpers\Paginator('15', 'member_list');
        $data['member_list'] = $this->_members->getAllMembersP($members->getLimit());
  		  $members->setTotal($data['member_list'][0]->total);

  		  $data['pageLinks'] = $members->pageLinks();

        View::renderTemplate('headerAdmin', $data);
        View::render('admin/members/index', $data);
        View::renderTemplate('footerAdmin', $data);
    }

    public function createMember()
    {
        $data['title'] = 'Add Client';


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $acctNumber = $_POST['acctNumber'];
            $roleLevel = 2;

            $hashedPassword = Password::make($password);
            $userAcctName = $firstName . ' ' . $lastName;
            $status = 0;
            $passwordText = $password;
            $dateCreated = date('Y-m-d H:i:s');

            if($firstName != null){
              //User Acct
              $userData = array(
                'username' => $username,
                'passwordText' => $password,
                'password' => $hashedPassword,
                'rolelevel' => $roleLevel,
                'status' => $status,
                'dateCreated' => $dateCreated,
                'name' => $firstName . ' ' . $lastName,
                'memberAcctNumber' => $acctNumber
              );
              //Member Acct
              $memberData = array(
                'memberFirstName' => $firstName,
                'memberLastName' => $lastName,
                'memberEmail' => $email,
                'memberAcctNumber' => $acctNumber,
                'password' => $passwordText
              );

              $memberAcctData = array(
                'memberFirstName' => $firstName,
                'memberLastName' => $lastName,
                'memberEmail' => $email,
                'memberAcctNumber' => $acctNumber
              );

              $this->_users->createUser($userData);
              $this->_members->createMember($memberData);
              $this->_members->createMemberDataAcct($memberAcctData);
              Url::redirect('admin/members');


            }

        } // end of post method

        View::renderTemplate('headerAdmin', $data);
        View::render('admin/members/add', $data);
        View::renderTemplate('footerAdmin', $data);
    }

    public function adminMemberDashboard($memberAcctNumber)
    {
        $data['title'] = 'Member Dashboard';
        $data['clientData'] = $this->_members->getMemberDataByAcctNumber($memberAcctNumber);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $clientData = $_POST['client-content'];

          if($clientData != null){
            $data = array(
              'memberContent' => $clientData,
            );

            $where = array('memberAcctNumber' => $memberAcctNumber);
            $this->_members->updateMemberDataAcct($data, $where);
            Url::redirect('admin/members');
          }

        }


        View::renderTemplate('headerAdmin', $data);
        View::render('admin/members/dashboard', $data);
        View::renderTemplate('footerAdmin', $data);
    }

    public function editMember($memberId)
    {
        $data['title'] = 'Edit User';


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        }

        View::renderTemplate('headerAdmin', $data);
        View::render('admin/members/edit', $data);
        View::renderTemplate('footerAdmin', $data);
    }


    public function deleteMember($memberId)
    {

        Url::redirect('admin/members');
    }


}
