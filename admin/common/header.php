<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<br/>
    <div  style="width:960px;margin:0 auto;">
        <h1>Admin Panel</h1>
    </div>
	<br/>
	<?php if($_SESSION['admin_logedin']) {?>
	<div id="menu">
        <?php include 'common/links.php';?>
	</div>        
	<?php
	} 
	?>

