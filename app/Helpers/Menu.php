<?php
/**
 * Block Helper
 *
 * @author Travis Pronschinske
 * @version 1.0
 * @date July 12, 2016
 *
 */

namespace Helpers;

use Helpers\Database;


/**
 * Retrieve Menu
 */
class Menu
{


	public function getMenu($keyId){

			 $db = Database::get();
			 $id = $keyId;
			 $data['menuItems'] = $db->select("SELECT * FROM " . PREFIX . "menu WHERE menuKey=:menuKey", array(':menuKey' => $id));


			 if ($data['menuItems']){

				 $menu = '<ul class="main-menu" id="menu-'. $id .'">';

				 foreach ($data['menuItems'] as $row) {
					 $id = $row->menuId;
					 $link = $row->menuLink;
					 $linkName = $row->menuLinkName;
					 $menuTitle = $row->menuLinkTitle;
					 $parent = $row->menuParent;
					 $hasSubMenu = $row->childLinks;

					if ($hasSubMenu != 1){
						if($parent == 0){
							$menu .= '<li class="menu-item"><a href="'. $link .'" title="'. $menuTitle .'">'. $row->menuLinkName .'</a></li>';
						}
					} else {
						$menu .='<li class="menu-item"><a href="'. $link .'" title="'. $menuTitle .'">'. $row->menuLinkName . '</a>';
						$data['subMenuItems'] = $db->select("SELECT * FROM " . PREFIX . "menu WHERE menuParent=:menuId", array(':menuId' => $id));

							if($data['subMenuItems']){
								$menu .= '<ul class="sub-menu">';
								foreach($data['subMenuItems'] as $item){
									$subLinkName = $item->menuLinkName;
									$subLink = $item->menuLink;
									$subLinkTitle = $item->menuTitle;
									$menu .= '<li class="sub-menu-item"><a href="'. $subLink .'" title="'. $subLinkTitle .'">'. $subLinkName  .'</a></li>';
								}
								$menu .= '</ul></li>';
							}
					 }
				 }
				 $menu .= '</ul>';
				 return $menu;
			 }
			   return 'Menu does not exist. Please Contact Your Administrator';

	}

}
