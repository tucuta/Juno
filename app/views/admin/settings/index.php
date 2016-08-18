<?php
/**
 * Sample layout
 */

use Core\Language;
use Helpers\Form;
?>



<div class="adminPanelArea">
<?php echo Form::open(array('method' => 'post'));?>

<?php if($data['settingsData']) { ?>

<div class="contentPadding">
  <div class="topHeading">
    <h1>Settings</h1>
  </div>
  <div class="pagesTableContainer">
		<div class="panel">

  <div class="settings-holder">
    <div class="row">
        <div class="label-left">
          Site Address
        </div>
        <div class="input">
          <input type="text" name="setting-site-url" class="setting" placeholder="" value="<?php echo $data['settingsData'][0]->siteAddress; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="label-left">
          Site Title
        </div>
        <div class="input">
          <input type="text" name="setting-site-title" class="setting" placeholder="" value="<?php echo $data['settingsData'][0]->siteTitle; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="label-left">
          Site Email
        </div>
        <div class="input">
          <input type="text" name="setting-site-email" class="setting" placeholder="" value="<?php echo $data['settingsData'][0]->siteEmail; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="label-left">
            Site Phone
        </div>
        <div class="input">
          <input type="text" name="setting-phone" class="setting" placeholder="" value="<?php echo $data['settingsData'][0]->sitePhone; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="label-left">
          Site Theme
        </div>
        <div class="input">
          <input type="text" name="setting-site-theme" class="setting" placeholder="" value="<?php echo $data['settingsData'][0]->siteTheme; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="label-left">
          Admin Theme
        </div>
        <div class="input">
          <input type="text" name="setting-admin-theme" class="setting" placeholder="" value="<?php echo $data['settingsData'][0]->adminTheme; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="label-left">
          Development Email (Testing)
        </div>
        <div class="input">
          <input type="text" name="setting-dev-email" class="setting" placeholder="" value="<?php echo $data['settingsData'][0]->devEmail; ?>" />
        </div>
    </div>
    <div class="row">
        <div class="label-left">
          Pagination
        </div>
        <div class="input">
          <input type="text" name="setting-pagination" class="setting" placeholder="" value="<?php echo $data['settingsData'][0]->pagination; ?>" />
        </div>
    </div>
    <div class="pageInfo">
      <div class="col100">
        <input type="submit" name="setting-submit" id="submitBtn" value="Save" />
      </div>
    </div>
    <div>

</div></div></div>
<?php } ?>
<?php echo Form::close(); ?>

</div>
