<?php
/**
 * Block Helper
 *
 * @author Travis Pronschinske
 * @version 1.0
 * @date June 07, 2016
 *
 */

namespace Helpers;

use Helpers\Database;

/**
 * Retrieve Content Block Elements Quickly.
 */
class Block
{

  /**
   * Render Content Block
   *
   * This method returns A Content Block
   *
   * @param   $blockId
   *
   * @return  string
   */
  public static function renderBlock($blockId)
  {

          $db = Database::get();
          $id = $blockId;
          $data['blockData'] = $db->select("SELECT * FROM " . PREFIX . "contentblock WHERE blockId=:blockId", array(':blockId' => $id));
          if($data['blockData'] ){
      			foreach ($data['blockData'] as $row) {
              $blockId = $row->blockId;
              $title = $row->blockTitle;
              $content = $row->blockContent;
              $classKey = $row->blockKey;
      			 }
      		}

          return
          '<div class="block block-'. $classKey .'" id="content-block-'. $blockId .'">' .
            '<div class="block-title"><h3 class="block-title--'. $classKey .'">
            ' . $title .
            '</h3></div>
              <div class="block-content">
              ' . $content . '
              </div>
          </div>';

  }


}
