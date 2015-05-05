<?php
	session_start();
	include_once 'admin_functions.php';
	$action = $_GET['action'];
	switch ($action) {
		case "login":
				$username = $_POST['username'];
				$password = $_POST['password'];
				if($username=='admin' && $password=='demo#admin') {
					
					$_SESSION['admin_logedin'] = true;
					header("Location: pages.php");
				} else {
					echo "ERROR> Invalid username / password";
				}
			break;
		case "pages":
			break;
		case "uninstall_module":
				$id = $_GET['id'];
				uninstall_modules($id);
				header("Location:modules.php");
			break;
		case "delete_page":
				$id = $_GET['id'];
				delete_page($id);
				header("Location:pages.php");				
			break;
		case "uninstall_temp":
				$id = $_GET['id'];
				uninstall_temp($id);
				header("Location:templates.php");
			break;
		case "logout":
				unset($_SESSION['admin_logedin']);
				header("Location:index.php");
			break;												
		
	}
?>