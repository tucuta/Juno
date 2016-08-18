<?php
/**
 * Sample layout
 */

use Core\Language;
use Helpers\Form;
?>
<div class="adminPanelArea">
<div class="contentPadding">
	<div class="topHeading">
    <h1>Delete Page</h1>
		<hr />
    <p>Are you sure you want to delete this page</p>
	</div>


<?php echo Form::open(array('method' => 'post')); ?>
  <input type="text" name="pageId" value="<?php echo $row->pageId; ?>" hidden />
  <button type="submit" value="Delete Page" name="deletePage" id="delete" ><i class="fa fa-times"></i> Delete Page</button>
<?php echo Form::close(); ?>
</div>
</div>
