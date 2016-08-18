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
    <h1>Add Categories</h1>
	</div>
  <div class="formContainer">
    <?php echo Form::open(array('method' => 'post'));?>
      <div class="col100">
        <label>Category Name</label>
        <input type="text" name="catName" id="catName" placeholder="Category Name..." />
      </div>
      <div class="col100">
        <label>Category Title</label>
        <input type="text" name="catName" id="catTitle" placeholder="Category Title..." />
      </div>

      <div class="col100">
        <label>Category Url</label>
        <input type="text" name="catUrl" id="catUrl" placeholder="Category Url..." />
      </div>

      <div class="col100">
        <label>Parent Category</label>
        <select name="catParent">
          <option value="">Select A Parent Category</option>
          <?php
            if($data['allCategories']){
              foreach($data['allCategories'] as $row){
                echo "<option value='$row->categoryId' >$row->categoryName</option>";
              }
            }

          ?>
        </select>
      </div>

      <div class="pageInfo">
  			<div class="col100">
  				<input type="submit" name="page-submit" id="submitBtn" value="submit" />
  				<a href="/admin/categories" class="btnCancel">Cancel</a>
  			</div>
  		</div>
      <div class="currentCats">
        <table class="table">
    			<?php if($data['allCategories']){ ?>
    				<tr>
    					<th>Current Categories</th>
    				</tr>
    			<?php	foreach ($data['allCategories'] as $row) { ?>
    					<tr>
    						<td><?php echo $row->categoryName; ?></td>
    					</tr>
    		  <?php }
           }
          ?>
				</table>
      </div>
    <?php echo Form::close(); ?>
  </div>
</div>
</div>
