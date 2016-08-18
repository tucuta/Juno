<?php
/**
 * Sample layout
 */

use Core\Language;
use Helpers\Form;
?>
<script src="/app/Modules/ckeditor/ckeditor.js"></script>
		<?php if($data['articleData']){ ?>
<div class="adminPanelArea">
<div class="contentPadding">
	<div class="topHeading">
  		<h1>Edit "<?php echo $data['articleData'][0]->articleName; ?>" Page</h1>
		<hr />
	</div>
	<div class="formContainer">
		<?php echo Form::open(array('method' => 'post'));?>

		<div class="pageInfo">
			<div class="col50">
				<label>Article Name</label>
				<input type="text" name="article-name" id="pageName" placeholder="Page Name" value="<?php echo $data['articleData'][0]->articleName; ?>" />
			</div>
			<div class="col50">
				<label>Article Url</label>
				<input type="text" name="article-url" id="pageUrl" placeholder="Page Url" value="<?php echo $data['articleData'][0]->articleUrl; ?>" />
			</div>
		</div>
		<div class="pageDetails">
			<div class="col100">
				<label>Article Headline</label>
				<input type="text" name="article-headline" id="pageName" placeholder="Page Name" value="<?php echo $data['articleData'][0]->articleTitle; ?>" />

			</div>
			<div class="col100">
				<?php  echo Form::textBox(array('name' => 'article-content', 'id' => 'contentArea', 'value' => $data['articleData'][0]->articleContent)); ?>
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
					<input type="text" name="article-meta-title" id="metaTitle" placeholder="Meta Title" value="<?php echo $data['articleData'][0]->metaTitle; ?>" />
				</div>
				<div class="col100">
					<label>Meta Keywords</label>
					<input type="text" name="article-meta-keywords" id="pageUrl" placeholder="Meta Keywords" value="<?php echo $data['articleData'][0]->metaKeywords; ?>" />
				</div>
				<div class="col100">
					<label>Meta Description</label>
					<?php  echo Form::textBox(array('name' => 'article-meta-description', 'id' => 'pageMetaDesc', 'placeholder' => 'Meta Description', 'value' => $data['articleData'][0]->metaDescription)); ?>

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
				<label>Categories</label>
				<select id="categorySelection" name="category-id">
					<option value="">Select Category</option>
					<?php if($data['categories']){
						foreach($data['categories'] as $catRow){
							if($data['pageData'][0]->categoryId == $catRow->categoryId){
									$selected = "selected";
							} else {
									$selected = null;
							}
							echo "<option class='$selected' value='$catRow->categoryId' $selected>$catRow->categoryName</option>";
						}
					}
					?>
				</select>
			</div>
		</div>

		<div class="pageInfo">
			<div class="col100">
				<input type="submit" name="article-submit" id="submitBtn" value="submit" />
				<a href="/admin/articles" class="btnCancel">Cancel</a>
			</div>
		</div>



		<?php } ?>
		<?php echo Form::close(); ?>
	</div>

</div>
</div>