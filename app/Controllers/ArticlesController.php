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
use \Core\Error;
use \Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class ArticlesController extends Controller
{

    private $_article;
    private $_error;
    /**
     * Call the parent construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->_article = new \Models\Articles();
        $this->_error = new \Core\Error();
    }

    /**
     * Define Index page title and load template files
     * SUB PAGES
     */
    public function index($articleUrl)
    {

        $data['article_data'] = $this->_article->getArticle($articleUrl);

        if($data['article_data']){
          $data['title'] = $data['article_data'][0]->articleTitle;
        }

       if($data['article_data'] == null || empty($data['article_data'])){
           View::renderTemplate('header', $data);
           View::render('error/404', $data);
           View::renderTemplate('footer', $data);
       } else {
         $articleTemplateUrl = strtolower(rtrim($articleUrl, '/\\'));
         $customTemplate =  'articles/' . $articleTemplateUrl;
         View::renderTemplate('header', $data);

         if(!file_exists(SMVC."app/views/". $customTemplate . ".php")){ //ONLY CHANGE HERE
            View::render('articles/article', $data);
         } else {
            View::render($customTemplate, $data); //LEAVE $customTemplate AS IS
         }
         View::renderTemplate('footer', $data);
       }// end of else

    }


}
