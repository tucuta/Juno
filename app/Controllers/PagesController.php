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
class PagesController extends \Core\Controller
{

    private $_pages;
    private $_error;


    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->_pages = new \Models\Pages();
        $this->_error = new \Core\Error();

    }

    /**
     * Define Index page title and load template files
     * HOME PAGE
     */
    public function index()
    {
        $data['title'] = "Home";
        $data['home_page'] =  $this->_pages->getHomePage();


        if($data['home_page'] == null || empty($data['home_page'])){
          View::renderTemplate('header', $data);
          View::render('error/404', $data);
          View::renderTemplate('footer', $data);
        } else {
          View::renderTemplate('header', $data);
          View::render('pages/home-page', $data);
          View::renderTemplate('footer', $data);
        }

    }


    /**
     * Define Index page title and load template files
     * SUB PAGES
     */
    public function pages($pageUrl)  {
        $data['page'] = $this->_pages->getPage($pageUrl);

         if($data['page']){
           foreach ($data['page'] as $row) {
             $data['title'] = $row->pageName;
           } // end of foreach
         }// end of if

        if($data['page'] == null || empty($data['page'])){
            View::renderTemplate('header', $data);
            View::render('error/404', $data);
            View::renderTemplate('footer', $data);
        } else {
          $pageTemplateUrl = strtolower(rtrim($pageUrl, '/\\'));
          $customTemplate =  'pages/' . $pageTemplateUrl;
          View::renderTemplate('header', $data);

          if(!file_exists(SMVC."app/views/". $customTemplate . ".php")){ //ONLY CHANGE HERE
             View::render('pages/page', $data);
          } else {
             View::render($customTemplate, $data); //LEAVE $customTemplate AS IS
          }
          View::renderTemplate('footer', $data);
        }// end of else
    } // end of pages


}
