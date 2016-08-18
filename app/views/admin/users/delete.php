<?php
/**
 * Sample layout
 */

use Core\Language;
use Helpers\Form;
?>



<div class="adminPanelArea">
<div class="contentPadding">
  <h1>Delete User</h1>
	<hr />

  <div class="formContainer">
    <p>Are you sure you want to delete this user?</p>
    <?php echo Form::open(array('method' => 'post'));?>
      <div class="pageInfo">
        <div class="col100">
          <?php if($data['user']){ ?>
          <?php	foreach ($data['user'] as $row) { ?>
            <input type="hidden" name="userId" id="userId" value="<?php echo $row->userId; ?>" hidden />
          <?php }
          } ?>
          <input type="submit" name="delete" id="deleteButton" value="Delete" />
          <a href="/admin/users" class="btnCancel">Cancel</a>
        </div>
      </div>

    <?php echo Form::close(); ?>

  </div>
</div>
</div>
