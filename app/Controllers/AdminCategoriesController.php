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
class AdminCategoriesController extends Controller
{

    private $_categories;
    /**
     * Call the parent construct
     */
    public function __construct()
    {
        if(!Session::get(loggedin)){
          Url::redirect('login');
        }
        $this->_categories = new \Models\Categories();
    }

    /**
     * Define Index page title and load template files
     */
    public function adminCategories()
    {
      $data['title'] = 'Juno CMS';
      $data['welcome_message'] = 'Juno Page';


        $data['category_data'] = $this->_categories->getAllCategories();

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/categories/index', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function createCategories()
    {
      $data['title'] = 'Juno CMS';
      $data['welcome_message'] = 'Juno Page';

      $data['allCategories'] = $this->_categories->getAllCategories();

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $catName = $_POST['catName'];
        $catTitle = $_POST['catTitle'];
        $catUrl = $_POST['catUrl'];
        $catParent = $_POST['catParent'];
        $catParentName = $this->_categories->getCatParentUrl($catParent);

        if($catParentName == null){
          $catParentName = '';
        }

        if($catName != null){

          $catData = array(
            'categoryName' => $catName,
            'categoryTitle' => $catTitle,
            'categoryUrl' => $catUrl,
            'parentId' => $catParent,
            'categoryParentUrl' => $catParentName,
          );

          $this->_categories->createCategories($catData);
        }

        Url::redirect('admin/categories');
      }

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/categories/add', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function editCategories()
    {
      $data['title'] = 'Juno CMS';
      $data['welcome_message'] = 'Juno Page';


        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/categories/edit', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function updateCategories()
    {
      $data['title'] = 'Juno CMS';
      $data['welcome_message'] = 'Juno Page';


        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/pages', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function deleteCategories()
    {
      $data['title'] = 'Juno CMS';
      $data['welcome_message'] = 'Juno Page';


        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/categories/delete', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }


}
