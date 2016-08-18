<?php

use Core\Router;
use Helpers\Hooks;
use Helpers\Blocks;
/** Define routes. **/

Router::any('', 'Controllers\PagesController@index');
Router::any('article/(:any)', 'Controllers\ArticlesController@index');
Router::any('cat/(:any)', 'Controllers\CategoriesController@index');

Router::any('admin', 'Controllers\AdminController@index');
Router::any('login', 'Controllers\AuthorizeController@login');
Router::any('logout', 'Controllers\AuthorizeController@logout');
Router::any('reset', 'Controllers\AuthorizeController@resetEmail');
Router::any('password-reset', 'Controllers\AuthorizeController@resetPassword');

Router::any('admin/articles', 'Controllers\AdminArticlesController@adminArticles');
Router::any('admin/articles/add', 'Controllers\AdminArticlesController@createAdminArticles');
Router::any('admin/articles/edit/(:num)', 'Controllers\AdminArticlesController@editAdminArticles');
Router::any('admin/articles/delete/(:num)', 'Controllers\AdminArticlesController@deleteArticle');

Router::any('admin/categories', 'Controllers\AdminCategoriesController@adminCategories');
Router::any('admin/categories/add', 'Controllers\AdminCategoriesController@createCategories');
Router::any('admin/categories/edit/(:num)', 'Controllers\AdminCategoriesController@editCategories');
Router::any('admin/categories/delete/(:num)', 'Controllers\AdminCategoriesController@deleteCategories');

Router::any('admin/forms', 'Controllers\AdminFormsController@index');
Router::any('admin/forms/delete/(:num)', 'Controllers\AdminFormsController@deleteForms');

Router::any('admin/media', 'Controllers\AdminMediaController@adminMedia');

Router::any('admin/menu', 'Controllers\AdminMenuController@adminMenu');
Router::any('admin/menu/add', 'Controllers\AdminMenuController@createMenu');
Router::any('admin/menu/edit/(:num)', 'Controllers\AdminMenuController@editMenu');
Router::any('admin/menu/delete/(:num)', 'Controllers\AdminMenuController@deleteMenu');

Router::any('admin/contentblock', 'Controllers\AdminContentBlockController@index');
Router::any('admin/contentblock/add', 'Controllers\AdminContentBlockController@createContentBlock');
Router::any('admin/contentblock/edit/(:num)', 'Controllers\AdminContentBlockController@editContentBlock');
Router::any('admin/contentblock/delete/(:num)', 'Controllers\AdminContentBlockController@deleteContentBlock');

Router::any('admin/pages', 'Controllers\AdminPagesController@index');
Router::any('admin/pages/add', 'Controllers\AdminPagesController@createPage');
Router::any('admin/pages/edit/(:num)', 'Controllers\AdminPagesController@editPage');
Router::any('admin/pages/delete/(:num)', 'Controllers\AdminPagesController@deletePage');

Router::any('admin/users', 'Controllers\AdminUsersController@adminUsers');
Router::any('admin/users/add', 'Controllers\AdminUsersController@createUsers');
Router::any('admin/users/edit/(:num)', 'Controllers\AdminUsersController@editUsers');
Router::any('admin/users/delete/(:num)', 'Controllers\AdminUsersController@deleteUsers');

Router::any('admin/settings', 'Controllers\AdminSettingsController@adminSettings');


Router::any('(:all)', 'Controllers\PagesController@pages');
/** Module routes. */
$hooks = Hooks::get();
$hooks->run('routes');

/** If no route found. */
Router::error('Core\Error@index');

/** Turn on old style routing. */
Router::$fallback = true;

/** Execute matched routes. */
Router::dispatch();

?>
