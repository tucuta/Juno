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
  		<h1>Edit Content Block</h1>
		<hr />
	</div>
	<div class="formContainer">
		<?php echo Form::open(array('method' => 'post'));?>
    <?php if($data['blockData']){ ?>
		<div class="blockDetails">
			<div class="col50">
				<label>Content Block Name</label>
				<input type="text" name="block-name" id="blockName"  value="<?php echo $data['blockData'][0]->blockName; ?>"/>
			</div>
			<div class="col50">
				<label>Content Block Title</label>
				<input type="text" name="block-title" id="blockTitle" value="<?php echo $data['blockData'][0]->blockName; ?>" />
			</div>
      <div class="col100" style="margin:0;"><label>Content Block Content</label></div>
			<div class="col100 textEditor">
        <?php  echo Form::textBox(array('name' => 'block-content', 'id' => 'blockContentArea', 'value' => $data['blockData'][0]->blockContent)); ?>
				<script>
				var roxyFileman = '/fileman/index.php?integration=ckeditor';
				$(function(){
				CKEDITOR.config.extraPlugins = 'justify';
				CKEDITOR.replace( 'blockContentArea',{
					filebrowserBrowseUrl:roxyFileman,
					filebrowserImageBrowseUrl:roxyFileman+'&type=image',
					removeDialogTabs: 'link:upload;image:upload'});
				});
				</script>
			</div>
      <?php } ?>
		</div>
		<div class="pageInfo">
			<div class="col100">
				<input type="submit" name="block-submit" id="submitBtn" value="submit" />
				<a href="/admin/contentblock" class="btnCancel">Cancel</a>
			</div>
		</div>
	<?php echo Form::close(); ?>
	</div>

</div>
</div>
