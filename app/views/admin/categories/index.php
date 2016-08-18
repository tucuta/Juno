<?php
/**
 * Sample layout
 */

use Core\Language;

?>



<div class="adminPanelArea">
	<div class="contentPadding">
		<div class="topHeading">
	  		<h1>Categories</h1>
		</div>

		<div class="pagesTableContainer">
			<div class="buttonContainer"><a class="btnLink" href="/admin/categories/add"><i class="fa fa-plus-circle"></i> New Category</a></div>
			<div class="panel">

			<?php if($data['category_data']){ ?>

			<?php	foreach ($data['category_data'] as $row) { ?>
				<div class="category-data">
	        <div class="block-id">
	          <?php echo $row->categoryId; ?>
	        </div>
	        <div class="row">
	          <div class="col50">
	            <div class="page-name">
	              Category Name: <?php echo $row->categoryName; ?>
	            </div>
	          </div>
	          <div class="col50">
	            <div class="mar-col33 center">

	            </div>
	            <div class="col33 center">
	              <a href="/admin/categories/edit/<?php echo $row->categoryId; ?>"><i class="fa fa-pencil fa-3x icon-blue" aria-hidden="true"></i></a>
	            </div>
	            <div class="col33 center">
	              <a class="red" href="/admin/categories/delete/<?php echo $row->categoryId; ?>"><i class="fa fa-times fa-3x red"></i></a>
	            </div>
	          </div>
	        </div>
	        <div class="row">
	          <div class="col50">
	            <div class="date-created">
	              Category Url: <?php echo $row->categoryParentUrl; ?>/<?php echo $row->categoryUrl; ?>
	            </div>
	          </div>
						<div class="col50">
	            <div class="parent-id">
	              Parent Category: <?php echo $row->parentId; ?>
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
