<?php
/**
 * Sample layout
 */

use Helpers\Assets;
use Helpers\Url;
use Helpers\Hooks;
use Helpers\Menu;

//initialise hooks
$hooks = Hooks::get();
?>
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>
	<!-- Site meta -->
	<meta charset="utf-8">
	<?php $hooks->run('meta');	?>
	<title><?php echo $data['title'].' - '. SITETITLE; ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script>
	$(document).ready(function () {
		$('#menu-1 li').hover(
			function () {
					$('ul', this).stop(true).slideToggle(200);
			},
			function () {
					$('ul', this).stop(true).slideToggle(200);
			}
	);
	});
	</script>
	<?php
	Assets::css(array(
		Url::templatePath() . 'css/style.css',
		Url::templatePath() . 'css/grid.css',
	));
	//hook for plugging in css
	$hooks->run('css');
	?>
</head>
<body>
<?php $hooks->run('afterBody'); ?>
<body>

	<header class="mdl-layout__header">

    <div class="mdl-layout__tab-bar" >
			<?php echo Menu::getMenu(1); ?>
    </div>
  </header>



<main class="content">
	<div class="wrapper">
