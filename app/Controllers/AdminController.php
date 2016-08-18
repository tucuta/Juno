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

use Core\View;
use Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;
/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class AdminController extends Controller
{

    private $_pages;
    private $_blocks;

    /**
     * Call the parent construct
     */
    public function __construct()
    {


        if(!Session::get(loggedin)){
          Url::redirect('login');
        }

        $this->_pages = new \Models\Pages();
        $this->_blocks = new \Models\ContentBlocks();
    }

    /**
     * Define Index page title and load template files
     */
    public function index()
    {
        $data['title'] = 'Juno CMS';
        $data['welcome_message'] = 'Dashboard Page';

        $data['newPages'] = $this->_pages->getRecentPages();
        $data['newBlocks'] = $this->_blocks->getRecentBlocks();

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/index', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }




}
