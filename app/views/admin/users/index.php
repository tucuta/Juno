<?php
/**
 * Sample layout
 */

use Core\Language;

?>

<script>
  $(document).ready(function(){
    setTimeout(function(){
      $('.message').fadeOut();
    }, 5000);
  });
</script>

<div class="adminPanelArea">
<div class="contentPadding">
    <?php echo   '<div class="message hidden">' .   \helpers\session::pull('message') . '</div>'; ?>
<div class="topHeading">
  <h1>Users</h1>
</div>


  <div class="pagesTableContainer">
  <div class="buttonContainer"><a class="btnLink" href="/admin/users/add"><i class="fa fa-plus-circle"></i> Create User</a></div>
<div class="panel">





			<table class="table">
		<?php if($data['user_list']){ ?>
			<tr>
				<th>User Id</th>
				<th>Username</th>
				<th>Date Created</th>
        <th>Status</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>

		<?php	foreach ($data['user_list'] as $row) { ?>

				<tr>
					<td><?php echo $row->userId; ?></td>
					<td><?php echo $row->username; ?></td>
					<td><?php echo $row->datecreated; ?></td>
          <td><?php if($row->status == 0){ echo "Active"; }else{ echo "Disabled"; }?></td>
					<td><a href="/admin/users/edit/<?php echo $row->userId; ?>"><i class="fa fa-pencil-square"></i></a></td>
					<td>
							<a class="red" href="/admin/users/delete/<?php echo $row->userId; ?>"><i class="fa fa-times red"></i></a>
					</td>
				</tr>

	 <?php } ?>
  		</table>
	<?php	} ?>

	</div>
</div>
</div>
</div>
