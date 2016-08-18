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
class AdminArticlesController extends Controller
{

    private $_articles;
    private $__categriesModel;

    /**
     * Call the parent construct
     */
    public function __construct()
    {
      if(!Session::get(loggedin)){
        Url::redirect('login');
      }
      $this->_articles = new \Models\Articles();
      $this->_categriesModel = new \Models\Categories();
    }

    /**
     * Define Index page title and load template files
     */


    public function adminArticles()
    {
        $data['title'] = 'Juno CMS';
        $data['article_data'] = $this->_articles->getAllArticles();

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/articles/index', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function createAdminArticles()
    {
        $data['title'] = 'Juno CMS';
        $data['categories'] = $this->_categriesModel->getAllCategories();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $articleName = $_POST['article-name'];
          $articleHeadline = $_POST['article-headline'];
          $articleUrl = $_POST['article-url'];
          $articleContent = $_POST['article-content'];
          $articleMetaTitle = $_POST['article-meta-title'];
          $articleMetaKeywords = $_POST['article-meta-keywords'];
          $articleMetaDescription = $_POST['article-meta-description'];
          $categoryId = $_POST['category-id'];

          if($articleName != null && $articleUrl != null && $articleHeadline != null){

              $articleData = array(
                'articleName' => $articleName,
                'articleTitle' => $articleHeadline,
                'articleUrl' => $articleUrl,
                'articleContent' => $articleContent,
                'metaTitle' => $articleMetaTitle,
                'metaKeywords' => $articleMetaKeywords,
                'metaDescription' => $articleMetaDescription,
                'categoryId' => $categoryId
              );

              $this->_articles->createArticle($articleData);
              Url::redirect('admin/articles');
          }

        }
        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/articles/add', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function editAdminArticles($articleId)
    {

        $data['title'] = 'Juno CMS';
        $data['articleData'] = $this->_articles->getArticleById($articleId);
        $data['categories'] = $this->_categriesModel->getAllCategories();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $articleName = $_POST['article-name'];
          $articleHeadline = $_POST['article-headline'];
          $articleUrl = $_POST['article-url'];
          $articleContent = $_POST['article-content'];
          $articleMetaTitle = $_POST['article-meta-title'];
          $articleMetaKeywords = $_POST['article-meta-keywords'];
          $articleMetaDescription = $_POST['article-meta-description'];
          $categoryId = $_POST['category-id'];

          if($articleName != null){

              $articleData = array(
                'articleName' => $articleName,
                'articleTitle' => $articleHeadline,
                'articleUrl' => $articleUrl,
                'articleContent' => $articleContent,
                'metaTitle' => $articleMetaTitle,
                'metaKeywords' => $articleMetaKeywords,
                'metaDescription' => $articleMetaDescription,
                'categoryId' => $categoryId
              );

              $where = array('articleId' => $articleId);
    					$this->_articles->updateArticle($articleData, $where);
              Url::redirect('admin/articles');
          }

        }
        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/articles/edit', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function deleteArticle($articleId)
    {
      $this->_articles->deleteArticle($articleId);
      Url::redirect('admin/articles');
    }



}
