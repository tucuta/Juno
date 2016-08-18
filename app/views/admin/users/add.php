<?php
/**
 * Sample layout
 */

 use Core\Language;
 use Helpers\Form;

?>



<div class="adminPanelArea">
<div class="contentPadding">
  <h1>Add User</h1>
	<hr />
  <div class="formContainer">

  <table class="table">
		<tbody>
      <tr>
				<th>Role Name</th>
				<th>Role Id</th>
      </tr>
      <tr>
        <td>Admin</td>
        <td>1</td>
      </tr>
      <tr>
        <td>Member</td>
        <td>2</td>
      </tr>
    </tbody>
  </table>

    <?php echo Form::open(array('method' => 'post'));?>

      <div class="col100">
        <label>Full Name</label>
        <input type="text" name="name" id="name" placeholder="Name..." />
      </div>

      <div class="col100">
        <label>Username</label>
        <input type="text" name="username" id="username" placeholder="Username..." />
      </div>

      <div class="col100">
        <label>Password</label>
        <input type="text" name="password" id="password" placeholder="Password...." />
      </div>

      <div class="col100">
        <label>Role Level</label>
        <input type="text" name="roleLevel" id="roleLevel" placeholder="Role Level...." />
      </div>

      <div class="col100">
        <label>Status</label>
        <select type="text" name="status" id="status">
          <option value="0">Active</option>
          <option value="1">Disabled</option>
        </select>
      </div>


      <div class="pageInfo">
  			<div class="col100">
  				<input type="submit" name="page-submit" id="submitBtn" value="submit" />
  				<a href="/admin/pages" class="btnCancel">Cancel</a>
  			</div>
  		</div>

    <?php echo Form::close(); ?>
  </div>
</div>
</div>
