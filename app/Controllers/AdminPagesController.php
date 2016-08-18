<?php


namespace Controllers;

use \Core\View;
use \Core\Controller;
use \Helpers\Session;
use \Helpers\Password;
use \Helpers\Url;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class AdminPagesController extends Controller
{

    private $_pages;
    private $_categoriesModel;
    /**
     * Call the parent construct
     */
    public function __construct()
    {


      if(!Session::get(loggedin)){
        Url::redirect('login');
      }

        $this->_pages = new \Models\Pages();
        $this->_categriesModel = new \Models\Categories();
    }


    public function index()
    {
        $data['title'] = 'Juno CMS';
        $data['welcome_message'] = 'Juno Page';

        $data['pages_data'] = $this->_pages->getAllPages();


        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/pages/index', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function createPage()
    {

        $data['title'] = 'Juno CMS';
        $data['welcome_message'] = 'Juno Page';
        $data['pagesUrlData'] = $this->_pages->getAllPages();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $pageName = $_POST['page-name'];
          $parentPage = $_POST['parent'];
          $pageHeadline = $_POST['page-headline'];
          $pageUrl = $_POST['page-url'];
          $pageContent = $_POST['page-content'];
          $pageMetaTitle = $_POST['page-meta-title'];
          $pageMetaKeywords = $_POST['page-meta-keywords'];
          $pageMetaDescription = $_POST['page-meta-description'];

          if($parentPage != 0){

              $fullPageUrl = $this->_pages->getPageParentUrl($parentPage);
              $completeUrl = $fullPageUrl . '/' . $pageUrl;

            } else {
              $completeUrl = $pageUrl;
            }

          if($pageName != null){

            $pageData = array(
              'pageName' => $pageName,
              'parentPage' => $parentPage,
              'pageTitle' => $pageHeadline,
              'pageUrl' => $completeUrl,
              'pageContent' => $pageContent,
              'metaTitle' => $pageMetaTitle,
              'metaKeywords' => $pageMetaKeywords,
              'metaDescription' => $pageMetaDescription,
            );

            $this->_pages->createPage($pageData);
          }

          Url::redirect('admin/pages');

        }


        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/pages/add', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }


        public function editPage($pageId)
        {
            $data['title'] = "Edit Page";
    		    $data['pageData'] = $this->_pages->getPageById($pageId);

    		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

              if($pageId == 1){$pageUrl = "";} else {$pageUrl = $_POST['page-url'];}
              $pageName = $_POST['page-name'];
              $parentPage = $_POST['parent'];
              $pageHeadline = $_POST['page-headline'];
              $categoryId = $_POST['category-id'];

              $pageContent = $_POST['page-content'];
              $pageMetaTitle = $_POST['page-meta-title'];
              $pageMetaKeywords = $_POST['page-meta-keywords'];
              $pageMetaDescription = $_POST['page-meta-description'];


              if($pageName != null){
                $pageData = array(
        					'pageName' => $pageName,
        					'parentPage' => $parentPage,
        					'pageTitle' => $pageHeadline,
        					'pageUrl' => $pageUrl,
        					'pageContent' => $pageContent,
        					'metaTitle' => $pageMetaTitle,
        					'metaKeywords' => $pageMetaKeywords,
        					'metaDescription' => $pageMetaDescription,
                  'categoryId' => $categoryId,
        				);

    					$where = array('pageId' => $pageId);
    					$this->_pages->updatePage($pageData, $where);
            } // end of update

              Url::redirect('admin/pages');

            }// End Of Post

            View::renderTemplate('headerAdmin', $data, 'juno');
            View::render('admin/pages/edit', $data);
            View::renderTemplate('footerAdmin', $data, 'juno');

        }// end of edit function



    /**
     * Define Index page title and load template files
    */


    public function deletePage($pageId)
    {
      $this->_pages->deletePage($pageId);
      Url::redirect('admin/pages');
      Session::set('message', 'Page Deleted');
    }

}
