<?php
/**
 * Sample layout
 */

use Core\Language;
?>

<div class="adminPanelArea">

<div class="contentPadding">
	<div class="topHeading">
  		<h1>Articles</h1>
	</div>
		<div class="pagesTableContainer">
	<div class="buttonContainer"><a class="btnLink" href="/admin/articles/add"><i class="fa fa-plus-circle"></i> New Article</a></div>
<div class="panel">



		<?php if($data['article_data']){ ?>


		<?php	foreach ($data['article_data'] as $row) { ?>

			<div class="article-data">
				<div class="block-id">
					<?php echo $row->articleId; ?>
				</div>
				<div class="row">
					<div class="col50">
						<div class="page-name">
							Article Name: <?php echo $row->articleName; ?>
						</div>
					</div>
					<div class="col50">
						<div class="col33 center">
							<a href="/article/<?php echo $row->pageUrl; ?>" target="_blank"><i class="fa fa-file-text-o fa-3x icon-blue" aria-hidden="true"></i></a>
						</div>
						<div class="col33 center">
							<a href="/admin/articles/edit/<?php echo $row->articleId; ?>"><i class="fa fa-pencil fa-3x icon-blue" aria-hidden="true"></i></a>
						</div>
						<div class="col33 center">
							<a class="red" href="/admin/articles/delete/<?php echo $row->articleId; ?>"><i class="fa fa-times fa-3x red"></i></a>
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
							Article Url: <a href="/article/<?php echo $row->articleUrl; ?>" target="_blank">article/<?php echo $row->articleUrl; ?></a>
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
