<?php


namespace Controllers;

use \Core\View;
use \Core\Error;
use \Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class CategoriesController extends \Core\Controller
{

    private $_cats;
    private $_error;


    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->_cats = new \Models\Categories();
        $this->_error = new \Core\Error();

    }

    /**
     * Define Index page title and load template files
     * HOME PAGE
     */
    public function index()
    {
        $data['title'] = "Home";
        $data['categories'] = '';


        if($data['categories'] == null || empty($data['categories'])){
          View::renderTemplate('header', $data);
          View::render('error/404', $data);
          View::renderTemplate('footer', $data);
        } else {
          View::renderTemplate('header', $data);
          View::render('pages/home-page', $data);
          View::renderTemplate('footer', $data);
        }

    }

  }
