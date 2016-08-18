<?php
/**
 * Sample layout
 */

use Core\Language;
use Helpers\Form;
use Helpers\Block;
?>


<?php if($data['page'] ){
	foreach ($data['page'] as $row) { ?>
		<div class="page-header">
			<h1><?php echo $row->pageTitle ?></h1>
			<div class="content">
				<div class="form-container">
					<?php include FORM . 'contact-form.php'; ?>
				</div>
				<?php echo $row->pageContent ?>
				<?php echo Block::renderBlockContent("1"); ?>
			</div>
		</div>
	<?php }
} ?>
