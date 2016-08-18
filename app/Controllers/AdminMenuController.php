<?php
/**
 * Admin Menu Controller
 *
 * @author Travis Pronschinske
 * @version 1.0
 * @date January, 2 2016
 *
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
class AdminMenuController extends Controller
{

    private $_mainMenu;
    private $_pages;
    private $_articles;
    /**
     * Call the parent construct
     */
    public function __construct()
    {
      if(!Session::get(loggedin)){
        Url::redirect('login');
      }
        $this->_mainMenu = new \Models\Menu();
        $this->_pages = new \Models\Pages();
        $this->_articles = new \Models\Articles();
    }

    /**
     * Define Index page title and load template files
     */
    public function adminMenu()
    {
        $data['title'] = 'Juno CMS';
        $data['welcome_message'] = 'Juno Page';

        $data['main_menu'] = $this->_mainMenu->getAllMenus();

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/menu/index', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function createMenu()
    {
        $data['title'] = 'Juno CMS';
        $data['welcome_message'] = 'Juno Page';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $menuName = $_POST['menu-name'];
          $lastMenuKey = $this->_mainMenu->getLastMenuKey();
          $nemMenuKey = $lastMenuKey + 1;


          $menuData = array(
            'mainMenuName' => $menuName,
            'mainMenuKey' => $nemMenuKey
          );

          $this->_mainMenu->createMenu($menuData);
          Url::redirect('admin/menu');
        }

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/menu/add', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function editMenu($mainMenuId)
    {
        $data['title'] = 'Juno CMS';
        $data['welcome_message'] = 'Juno Page';

        $data['page_link_data'] = $this->_pages->getAllPages();
        $data['article_link_data'] = $this->_articles->getAllArticles();
        $data['menu_items_list'] = $this->_mainMenu->getMainMenuItems($mainMenuId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $menuKey = $mainMenuId;
          $linkName = $_POST['link-name'];
          $linkTitleTag = $_POST['link-title-tag'];
          $sortOrder = $_POST['sort-order'];
          $pageLink = $_POST['page-link'];
          $linkParent = $_POST['link-parent'];
        }

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/menu/edit', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function updateMenu()
    {
        $data['title'] = 'Juno CMS';
        $data['welcome_message'] = 'Juno Page';

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/menu', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function deleteMenu()
    {
        $data['title'] = 'Juno CMS';
        $data['welcome_message'] = 'Juno Page';

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/menu/delete', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }


}
