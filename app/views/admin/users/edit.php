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
    <h1>Edit User</h1>
  </div>
  <div class="info-tip">
    <p>
      If your user has forgotten there password you will have to enter a new one. Passwords do not get returned on this screen for security reasons.
    </p>
  </div>
  <div class="formContainer">
    <?php if($data['user']){ ?>
      <?php	foreach ($data['user'] as $row) {
          $name = $row->name;
          $role = $row->role;
          $username = $row->username;
          $password = $row->password;
          $role = $row->rolelevel;
          $status = $row->status;

          if($status == 0){
            $active = 'selected';
          } else {
            $disabled = 'selected';
          }
       }
    } ?>
    <?php echo Form::open(array('method' => 'post'));?>

      <div class="col100">
        <label>Full Name</label>
        <input type="text" name="name" id="name" value="<?php echo $name; ?>"  />
      </div>

      <div class="col100">
        <label>Username</label>
        <input type="text" name="username" id="username" value="<?php echo $username; ?>"  />
      </div>

      <div class="col100">
        <label>Password</label>
        <input type="text" name="password" id="password" value=""  />
      </div>

      <div class="col100">
        <label>Role Level</label>
        <input type="text" name="roleLevel" id="roleLevel" value="<?php echo $role; ?>"  />
      </div>

      <div class="col100">
        <label>Status</label>
        <select type="text" name="status" id="status">
          <option value="0"<?php echo $active; ?>>Active</option>
          <option value="1" <?php echo $disabled; ?>>Disabled</option>
        </select>
      </div>


      <div class="pageInfo">
        <div class="col100">
          <input type="submit" name="page-submit" id="submitBtn" value="submit" />
          <a href="/admin/users" class="btnCancel">Cancel</a>
        </div>
      </div>

    <?php echo Form::close(); ?>
  </div>
</div>
</div>
