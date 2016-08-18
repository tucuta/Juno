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
class AdminContentBlockController extends Controller
{

    private $_block;

    /**
     * Call the parent construct
     */
    public function __construct()
    {

        if(!Session::get(loggedin)){
          Url::redirect('login');
        }

        $this->_block = new \Models\ContentBlocks();
    }

    /**
     * Define Index page title and load template files
     */
    public function index()
    {
      $data['title'] = 'Juno CMS';

      $data['contentBlockData'] = $this->_block->getAllContentBlocks();

      View::renderTemplate('headerAdmin', $data, 'juno');
      View::render('admin/contentblock/index', $data);
      View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function createContentBlock()
    {
      $data['title'] = 'Juno CMS';

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $blockName = $_POST['block-name'];
        $blockTitle = $_POST['block-title'];
        $blockContent = $_POST['block-content'];


        if($blockName != null){

          $blockData = array(
            'blockName' => $blockName,
            'blockTitle' => $blockTitle,
            'blockContent' => $blockContent,
          );

          $this->_block->createContentBlock($blockData);
        }

        Url::redirect('admin/contentblock');

      }


        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/contentblock/add', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }

    public function editContentBlock($blockId)
    {
      $data['title'] = 'Juno CMS';

      $data['blockData'] = $this->_block->getContentBlockById($blockId);


      if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $blockName = $_POST['block-name'];
        $blockTitle = $_POST['block-title'];
        $blockContent = $_POST['block-content'];

        if($blockName != null){

          $blockData = array(
            'blockName' => $blockName,
            'blockTitle' => $blockTitle,
            'blockContent' => $blockContent
          );

        $where = array('blockId' => $blockId);
        $this->_block->updateContentBlock($blockData, $where);
      } // end of update

        Url::redirect('admin/contentblock');


      }


        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/contentblock/edit', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }


    public function deleteContentBlock()
    {
      $this->_block->deleteContentBlock($pageId);
      Url::redirect('admin/contentblock');
      Session::set('message', 'Content Block Deleted');
    }




}
