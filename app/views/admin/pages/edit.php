<?php
/**
 * Sample layout
 */

use Core\Language;
use Helpers\Form;
?>
<script src="/app/Modules/ckeditor/ckeditor.js"></script>
		<?php if($data['pageData']){ ?>
<div class="adminPanelArea">
<div class="contentPadding">
	<div class="topHeading">
  		<h1>Edit "<?php echo $data['pageData'][0]->pageName; ?>" Page</h1>
		<hr />
	</div>
	<div class="formContainer">
		<?php echo Form::open(array('method' => 'post'));?>

		<div class="pageInfo">
			<div class="col50">
				<label>Page Name</label>
				<input type="text" name="page-name" id="pageName" placeholder="Page Name" value="<?php echo $data['pageData'][0]->pageName; ?>" />
			</div>
			<div class="col50">
				<label>Page Url</label>
				<input type="text" name="page-url" id="pageUrl" placeholder="Page Url" value="<?php echo $data['pageData'][0]->pageUrl; ?>" />
			</div>
		</div>
		<div class="pageDetails">
			<div class="col100">
				<label>Page Headline</label>
				<input type="text" name="page-headline" id="pageName" placeholder="Page Name" value="<?php echo $data['pageData'][0]->pageTitle; ?>" />

			</div>
			<div class="col100">
				<?php  echo Form::textBox(array('name' => 'page-content', 'id' => 'contentArea', 'value' => $data['pageData'][0]->pageContent)); ?>
				<script>
					var roxyFileman = '/fileman/index.php?integration=ckeditor';
					$(function(){
					CKEDITOR.replace( 'contentArea',{
						filebrowserBrowseUrl:roxyFileman,
						filebrowserImageBrowseUrl:roxyFileman+'&type=image',
						removeDialogTabs: 'link:upload;image:upload'});
					});
				</script>
			</div>
			<div class="metaEntryInfo">
				<div class="col100">
					<label>Meta Title</label>
					<input type="text" name="page-meta-title" id="metaTitle" placeholder="Meta Title" value="<?php echo $data['pageData'][0]->metaTitle; ?>" />
				</div>
				<div class="col100">
					<label>Meta Keywords</label>
					<input type="text" name="page-meta-keywords" id="pageUrl" placeholder="Meta Keywords" value="<?php echo $data['pageData'][0]->metaKeywords; ?>" />
				</div>
				<div class="col100">
					<label>Meta Description</label>
					<?php  echo Form::textBox(array('name' => 'page-meta-description', 'id' => 'pageMetaDesc', 'placeholder' => 'Meta Description', 'value' => $data['pageData'][0]->metaDescription)); ?>

				</div>
			</div>
			<div class="metaPreview">
				<div class="col100">
					<div class="metaPreviewTitle">Meta Search Preview</div>
					<hr />
					<div class="metaTitle"></div>
					<div class="metaDescription"></div>


				</div>
				<script>
					$(document).ready(function(){
						$('#metaTitle').on('input', function () {
						    $(".metaTitle").html($(this).val() + ' | ');
						});
						$('#pageMetaDesc').on('input', function () {
						    $(".metaDescription").html($(this).val());
						});
					});

				</script>
			</div>
		</div>

		<div class="pageInfo">
			<div class="col100">
				<input type="submit" name="page-submit" id="submitBtn" value="submit" />
				<a href="/admin/pages" class="btnCancel">Cancel</a>
			</div>
		</div>



		<?php } ?>
		<?php echo Form::close(); ?>
	</div>

</div>
</div>
