<?php
/**
 * Sample layout
 */

use Core\Language;

?>



<div class="adminPanelArea">
<div class="contentPadding">
	<div class="topHeading">
  		<h1>Menu</h1>
	</div>
	<div class="pagesTableContainer">
		<div class="buttonContainer"><a class="btnLink" href="/admin/menu/add"><i class="fa fa-plus-circle"></i> New Menu</a></div>
		<div class="panel">


			<table class="table">
		<?php if($data['main_menu']){ ?>


		<?php	foreach ($data['main_menu'] as $row) { ?>

				<div class="menu-row">
					<div class="menu-name">
						Menu Name : <?php echo $row->mainMenuName; ?>
					</div>
					<div class="row-100">
						<div class="change-menu">

						</div>
						<div class="add-menu-items">
							<a href="/admin/menu/edit/<?php echo $row->mainMenuId; ?>">Add Menu Items</a>
						</div>
						<div class="delete-menu">
							<a href="/admin/menu/delete/<?php echo $row->mainMenuId; ?>">Delete Menu</a>
						</div>
					</div>
				</div>

	 <?php } ?>
			</table>
	<?php	} ?>
	</div>
	</div>
</div>
</div>
