<?php
/**
 * Sample layout
 */

use Core\Language;


?>


<div class="adminPanelArea">

<div class="contentPadding">
	<div class="topHeading">
  		<h1>Pages</h1>
	</div>
	<div class="pagesTableContainer">
  		<div class="buttonContainer">
					<a class="btnLink shrink" href="/admin/pages/add"><i class="fa fa-plus"></i> New Page</a>
			</div>
			<div class="panel">

				<?php if($data['pages_data']){ ?>
				<?php	foreach ($data['pages_data'] as $row) { ?>
						<div class="page-data">
							<div class="block-id">
								<?php echo $row->pageId; ?>
							</div>
							<div class="row">
								<div class="col50">
									<div class="page-name">
										Page Name: <?php if($row->parentPage > 0){  echo '-'; ?> <?php } ?><?php echo $row->pageName; ?>
									</div>
								</div>
								<div class="col50">
									<div class="col33 center">
										<a href="/<?php echo $row->pageUrl; ?>" target="_blank"><i class="fa fa-file-text-o fa-3x icon-blue" aria-hidden="true"></i></a>
									</div>
									<div class="col33 center">
										<a href="/admin/pages/edit/<?php echo $row->pageId; ?>"><i class="fa fa-pencil fa-3x icon-blue" aria-hidden="true"></i></a>
									</div>
									<div class="col33 center">
										<a class="red" href="/admin/pages/delete/<?php echo $row->pageId; ?>"><i class="fa fa-times fa-3x red"></i></a>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col50">
									<div class="date-created">
										Date Created: <?php echo $row->dateCreated; ?>
									</div>
								</div>
								<div class="col50">
									<div class="url">
									  Page Url: <a href="/<?php echo $row->pageUrl; ?>" target="_blank">/<?php echo $row->pageUrl; ?></a>
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
