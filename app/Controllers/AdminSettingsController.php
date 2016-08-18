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
class AdminSettingsController extends Controller
{

    private $_settings;

    /**
     * Call the parent construct
     */
    public function __construct()
    {
        if(!Session::get(loggedin)){
          Url::redirect('login');
        }

        $this->_settings = new \Models\Settings();

    }

    /**
     * Define Index page title and load template files
     */
    public function adminSettings()
    {
        $data['title'] = 'Site Settings';

        $data['settingsData'] = $this->_settings->getSettings();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

          $siteAddress = $_POST['setting-site-url'];
          $siteTitle = $_POST['setting-site-title'];
          $siteEmail = $_POST['setting-site-email'];

          $sitePhone = $_POST['setting-phone'];
          $siteTheme = $_POST['setting-site-theme'];
          $siteAdminTheme = $_POST['setting-admin-theme'];
          $siteDevEmail = $_POST['setting-dev-email'];
          $sitePagination = $_POST['setting-pagination'];


          if($siteAddress != null){
            $settingData = array(
              'siteTitle' => $siteTitle,
              'siteEmail' => $siteEmail,
              'sitePhone' => $sitePhone,
              'siteAddress' => $siteAddress,
              'siteTheme' => $siteTheme,
              'adminTheme' => $siteAdminTheme,
              'devEmail' => $siteDevEmail,
              'pagination' => $sitePagination,
            );

          $where = array('settingId' => '1');
          $this->_settings->saveSettings($settingData, $where);
        } // end of update

          Url::redirect('admin/settings');



        }

        View::renderTemplate('headerAdmin', $data, 'juno');
        View::render('admin/settings/index', $data);
        View::renderTemplate('footerAdmin', $data, 'juno');
    }





}
