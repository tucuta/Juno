<?php
/**
 * Sample layout
 */

use Core\Language;

?>


<?php if($data['article_data'] ){
	foreach ($data['article_data'] as $row) { ?>

		<div class="page-header">
			<h1><?php echo $row->articleTitle ?></h1>

			<div class="content">
				<?php echo $row->articleContent ?>
			</div>
		</div>









	<?php }
} ?>
