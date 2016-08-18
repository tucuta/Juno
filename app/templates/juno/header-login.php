<?php
/**
 * Sample layout
 */

use Helpers\Assets;
use Helpers\Url;
use Helpers\Hooks;


//initialise hooks
$hooks = Hooks::get();
?>
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>

	<!-- Site meta -->
	<meta charset="utf-8">
	<?php
	//hook for plugging in meta tags
	$hooks->run('meta');
	?>
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/Core/Config.php ?></title>

	<!-- CSS -->
	<?php
	Assets::css(array(
		Url::templatePath() . 'css/admin.css',
	));

	//hook for plugging in css
	$hooks->run('css');
	?>
	<link href='//fonts.googleapis.com/css?family=Raleway:400,800,700,600,500' rel='stylesheet' type='text/css'>
	<style>
    body{background: #eaeaea;font-family: 'Raleway', sans-serif;}
		.loginContainer {width: 410px;margin: 0 auto;margin-top: 10%;padding:2%;box-sizing:border-box;	background:#fff;	box-shadow:1px 1px 6px #8c8c8c;    border-radius: 5px;}
		.row{float:left;width:100%;margin-bottom:15px;}
		.row.logo{text-align:center;margin-bottom: 10px;}
		.row.logo img {max-width: 155px;}
		label {font-weight: bold;font-size: 19px;color: rgb(12, 37, 67);padding-top: 15px;  display: inline-block;}
		input {width: 98%;  padding: 12px;box-sizing: border-box;  color: #8c8c8c;  border: 1px solid rgba(204, 204, 204, .81); box-shadow: 0px 0px 2px rgba(0,0,0,.1);}
		.submit {width: 100%;display: inline-block;margin-top: 26px;}
		input[type="submit"] {background: rgb(12, 37, 67);color: #fff;padding: 12px;font-size: 18px; border: none;cursor: pointer;}
		input[type="submit"]:hover {background: rgba(12, 37, 67, 0.89);}
		.row--footer {margin-top: 30px;text-align: center;border-top: 1px solid #eee;padding-top: 25px;}
		.row--footer a{color:rgb(12, 37, 67); text-decoration: none;}
		.row--footer a:hover{text-decoration: underline;}
		</style>
</head>
<body>
<?php
//hook for running code after body tag
$hooks->run('afterBody');
?>

<div class="container">
