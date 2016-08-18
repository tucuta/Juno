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
      		<h1>New Menu</h1>
    	</div>
    	<div class="formContainer">
    		<?php echo Form::open(array('method' => 'post'));?>
    		<div class="pageInfo">
    			<div class="col50">
    				<label>Menu Name</label>
    				<input type="text" name="menu-name" id="menuName" placeholder="Menu Name" />
    			</div>
          <div class="pageInfo">
      			<div class="col100">
      				<input type="submit" name="page-submit" id="submitBtn" value="Add Menu" />
      				<a href="/admin/articles" class="btnCancel">Cancel</a>
      			</div>
      		</div>

    	<?php echo Form::close(); ?>
    	</div>

    </div>
  </div>
</div>
