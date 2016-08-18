<?php
/**
 * Sample layout
 * //
 */

use Core\Language;
use Helpers\Form;
?>
<script src="/app/Modules/ckeditor/ckeditor.js"></script>

<div class="adminPanelArea">
<div class="contentPadding">
	<div class="topHeading">
  		<h1>New Article</h1>
	</div>
	<div class="formContainer">
		<?php echo Form::open(array('method' => 'post'));?>
		<div class="pageInfo">
			<div class="col50">
				<label>Article Name</label>
				<input type="text" name="article-name" id="articleName" placeholder="Article Name" />
			</div>

			<div class="col50">
				<label>Parent Article</label>
				<select name="parent" class="form-control">
					<option value="0">Choose A Parent Article</option>
						<?php if($data['pagesUrlData']){
							foreach($data['pagesUrlData'] as $row){ ?>
							 <option value="<?php echo $row->pageId; ?>" > <?php echo $row->pageName; ?> </option>';
						<?php	}	} ?>
				</select>
			</div>
		</div>
		<div class="pageDetails">
			<div class="col50">
				<label>Article Headline</label>
				<input type="text" name="article-headline" id="pageName" placeholder="Article Name" />
			</div>
			<div class="col50">
				<label>Article Url</label>
				<input type="text" name="article-url" id="pageUrl" placeholder="Article Url" />
			</div>
			<div class="col100 textEditor">
				<textarea type="text" name="article-content" id="contentArea"></textarea>
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
					<input type="text" name="article-meta-title" id="metaTitle" placeholder="Meta Title" value="" />
				</div>
				<div class="col100">
					<label>Meta Keywords</label>
					<input type="text" name="article-meta-keywords" id="pageUrl" placeholder="Meta Keywords" value="" />
				</div>
				<div class="col100">
					<label>Meta Description</label>
					<textarea name="article-meta-description" id="pageMetaDesc" placeholder="Meta Description" /></textarea>
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
				<input type="submit" name="page-submit" id="submitBtn" value="save" />
				<a href="/admin/articles" class="btnCancel">Cancel</a>
			</div>
		</div>
	<?php echo Form::close(); ?>
	</div>

</div>
</div>
