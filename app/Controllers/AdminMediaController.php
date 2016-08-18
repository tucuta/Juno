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
class AdminMediaController extends Controller
{

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        if(!Session::get(loggedin)){
          Url::redirect('login');
        }

    }

    /**
     * Define Index page title and load template files
     */
    public function adminMedia()
    {
        $data['title'] = $this->language->get('welcome_text');
        $data['welcome_message'] = $this->language->get('welcome_message');

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/media/index', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }



}
