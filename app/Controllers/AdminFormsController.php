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
class AdminFormsController extends Controller
{




    /**
     * Call the parent construct
     */
    public function __construct()
    {
        if(!Session::get(loggedin)){
          Url::redirect('login');
        }
    }

    /**
     * Define Index page title and load template files
     */
    public function index()
    {
        $data['title'] = "Juno Forms";


        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/forms/index', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function createForm()
    {
        $data['title'] = $this->language->get('welcome_text');
        $data['welcome_message'] = $this->language->get('welcome_message');

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/form/info', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function editForm()
    {
        $data['title'] = $this->language->get('welcome_text');
        $data['welcome_message'] = $this->language->get('welcome_message');

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/form/info', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function deleteForms($formId)
    {
      $this->_form->deleteReferralForm($formId);
      Url::redirect('admin/forms');
      Session::set('message', 'Page Deleted');
    }



}
