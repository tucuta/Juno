<?php
/**
 * Sample layout
 */

use Core\Language;

?>



<div class="adminPanelArea">
<div class="contentPadding">
<div class="topHeading">
  <h1>Content Area</h1>

</div>
<div class="pagesTableContainer">
  	<div class="buttonContainer"><a class="btnLink" href="/admin/contentblock/add"><i class="fa fa-plus-circle"></i> New Content Area</a></div>
  <div class="panel">

    <?php if($data['contentBlockData']){ ?>
    <?php	foreach ($data['contentBlockData'] as $row) { ?>

      <div class="article-data">
        <div class="block-id">
          <?php echo $row->blockId; ?>
        </div>
        <div class="row">
          <div class="col50">
            <div class="page-name">
              Content Area Name: <?php echo $row->blockName; ?>
            </div>
          </div>
          <div class="col50">
            <div class="mar-col33 center">

            </div>
            <div class="col33 center">
              <a href="/admin/contentblock/edit/<?php echo $row->blockId; ?>"><i class="fa fa-pencil fa-3x icon-blue" aria-hidden="true"></i></a>
            </div>
            <div class="col33 center">
              <a class="red" href="/admin/contentblock/delete/<?php echo $row->blockId; ?>"><i class="fa fa-times fa-3x red"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col50">
            <div class="date-created">
              Content Title: <?php echo $row->blockTitle; ?>
            </div>
          </div>
        </div>
      </div>

    <?php } ?>
    <?php	} ?>
</div>
</div>

</div>




</div>
