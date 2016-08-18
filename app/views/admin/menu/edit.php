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
  		<h1>Edit Menu</h1>
			<hr>
	</div>
	<div class="pagesTableContainer">
		<div class="add-menu-item-container">
			<?php echo Form::open(array('method' => 'post'));?>
				<div class="pageInfo">
					<div class="col50">
						<label>Link/Page Name</label>
						<input type="text" name="link-name" id="linkName" placeholder="Link Name" />
					</div>
					<div class="col50">
						<label>Page Link</label>
						<select id="linkSelection" name="link-id">
							<option value="">Select A Link</option>
							<?php if($data['page_link_data']){
								foreach($data['page_link_data'] as $row){
									if($row->pageId != 1){
										echo "<option value='$row->pageId'>$row->pageUrl</option>";
									}
								}
							}
							?>
							<?php if($data['article_link_data']){
								foreach($data['article_link_data'] as $row){
										echo "<option value='$row->articleId'>$row->articleUrl</option>";
								}
							}
							?>
						</select>
					</div>
					<div class="col50">
						<label>Link Title Tag</label>
						<input type="text" name="link-title-tag" id="linkName" placeholder="Link Title Tag" />
					</div>
					<div class="col50">
						<label>Parent Link/Page</label>
						<select id="linkSelection" name="link-parent">
							<option value="">Select A Link</option>
							<?php if($data['page_link_data']){
								foreach($data['page_link_data'] as $row){
									if($row->pageId != 1){
										echo "<option value='$row->pageId'>$row->pageName</option>";
									}
								}
							}
							?>
							<?php if($data['article_link_data']){
								foreach($data['article_link_data'] as $row){
										echo "<option value='$row->articleId'>$row->articleName</option>";
								}
							}
							?>
						</select>
					</div>
					<div class="col50">
						<label>Sort Order</label>
						<input type="text" name="sort-order" id="linkName" placeholder="Sort Order" />
					</div>
					<div class="pageInfo">
						<div class="col100">
							<input type="submit" name="page-submit" id="submitBtn" value="Add" />
							<a href="/admin/menu" class="btnCancel">Cancel</a>
						</div>
					</div>
				</div>
			<?php echo Form::close(); ?>
		</div>

    <table class="table">
  <?php if($data['menu_items_list']){ ?>
    <tr>
      <th>Link Name</th>
      <th>Page Link</th>
      <th>Link Title Tag<th>
      <th>Link Parent<th>
      <th>Sort Order<th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>

  <?php	foreach ($data['menu_items_list'] as $row) { ?>

      <tr>
        <td><?php echo $row->menuLinkName; ?></td>
        <td><?php echo $row->menuLink; ?></td>
        <td><?php echo $row->menuLinkTitle; ?></td>
        <td></td>
        <td><?php echo $row->menuParent; ?></td>
        <td></td>
        <td><?php echo $row->menuSort; ?></td>
        <td></td>
        <td><a href="/admin/menu/edit/<?php echo $row->mainMenuId; ?>"><i class="fa fa-pencil-square"></i></a></td>
        <td><a class="red" href="/admin/menu/delete/<?php echo $row->mainMenuId; ?>"><i class="fa fa-times red"></i></a></td>
      </tr>

  <?php } ?>
    </table>
  <?php	} ?>

	</div>
</div>
</div>
