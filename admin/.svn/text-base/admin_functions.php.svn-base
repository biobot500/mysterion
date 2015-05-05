<?php
session_start();
if(!$_SESSION['admin_logedin']) {
	header("Location: index.php");
}
include_once '../core/adodb/adodb.inc.php';

require_once '../config/system.php';
require_once '../config/database.php';

define("HOST", DB_HOST);
define("USER", DB_USER);
define("PASS", DB_PASS);
define("ADM_DB", DB_NAME);

function get_all_modules() {
	
	$DB = NewADOConnection ( 'mysql' );
	//$DB->PConnect ( "localhost", "root", "", "swi_app_engine" );
	
	$DB->PConnect ( HOST, USER, PASS, ADM_DB);
	$DB->SetFetchMode ( ADODB_FETCH_ASSOC );
	$rs = $DB->Execute ( "SELECT * FROM modules ORDER by id DESC" );
	if ($rs) {
		return $rs;
	}
	return false;
}
function install_module($target_path) {
	$DB = NewADOConnection ( 'mysql' );
	$DB->PConnect ( HOST, USER, PASS, ADM_DB);
	$zip_file = basename ( $_FILES ['module'] ['name'] );
	//unzip and copy to module folder
	$zip = new ZipArchive ( );
	if ($zip->open ( $target_path )) {
		$zip->extractTo ( '../modules/' );
		$zip->close ();
		
		$folder = explode ( ".", basename ( $_FILES ['module'] ['name'] ) );
		
		$folder = $folder [0];
		
		$install_info_file = "../modules/$folder/install.xml";
		
		if (file_exists ( $install_info_file )) {
			$xml = file_get_contents ( $install_info_file );
			
			$xml = simplexml_load_string ( $xml ) or die ( "<br/>Unable to load XML string!<br/>" );
			
			foreach ( $xml->module as $module ) {
				
				if ($module ["name"] == "foldername") {
					$foldername = $module ['value'];
				}
				if ($module ["name"] == "name") {
					$name = $module ['value'];
				}
				if ($module ["name"] == "systemname") {
					$sysname = $module ['value'];
				}
			
			}
			$sql = "INSERT INTO modules (`name`,`folder_name`,`sys_name`,`active`) values('$name','$foldername','$sysname',1)";
			
			$rs = $DB->Execute ( $sql );
			if ($rs) {
				unlink ( "../modules/" . $zip_file );
				echo "<br/>Module Installed Successfully....<br/>";
				return $rs;
			}
			return false;
		} else {
			echo "<br/>install.xml file not found!<br/>";
		}
	
	} else {
		echo '<br/>zip extraction failed<br/>';
	}

}
function uninstall_modules($module_id) {
	$DB = NewADOConnection ( 'mysql' );
	$DB->PConnect ( HOST, USER, PASS, ADM_DB);
	$sql = "DELETE FROM modules WHERE id=$module_id";
	$rs = $DB->Execute ( $sql );
	if ($rs) {
		return $rs;
	}
	return false;

}
function get_all_links() {
	$DB = NewADOConnection ( 'mysql' );
	$DB->PConnect ( HOST, USER, PASS, ADM_DB);
	$sql = "SELECT * FROM links ORDER by id DESC";
	$rs = $DB->Execute ( $sql );
	if ($rs) {
		return $rs;
	}
	return false;

}
function create_page($params) {
	$DB = NewADOConnection ( 'mysql' );
	$DB->PConnect ( HOST, USER, PASS, ADM_DB);
	$name = $params ['name'];
	$title = $params ['title'];
	$uri = $params ['uri'];
	$route = $params ['route'];
	$pid = $params ['pid'];
	
	$sql = "INSERT INTO links (`name`,`title`,`uri`,`route`,`parent_id`) VALUES ('$name','$title','$uri','$route','$pid')";
	
	$rs = $DB->Execute ( $sql );
	if ($rs) {
		return $rs;
	}
	return false;
}
function get_layout($id) {
	$DB = NewADOConnection ( 'mysql' );
	$DB->PConnect ( HOST, USER, PASS, ADM_DB);
	
	$sql = "SELECT * FROM layouts WHERE link_id=" . $id;
	
	$rs = $DB->Execute ( $sql );
	if ($rs) {
		return $rs;
	}
	return false;
}
function get_link($id) {
	$DB = NewADOConnection ( 'mysql' );
	$DB->PConnect ( HOST, USER, PASS, ADM_DB);
	
	$sql = "SELECT * FROM links WHERE id=" . $id;
	
	$rs = $DB->Execute ( $sql );
	if ($rs) {
		return $rs;
	}
	return false;
}
function update_layout($params) {
	$DB = NewADOConnection ( 'mysql' );
	$DB->PConnect ( HOST, USER, PASS, ADM_DB);
	
	$name = $params ['name'];
	$title = $params ['title'];
	$uri = $params ['uri'];
	$route = $params ['route'];
	$link_id = $params ['link_id'];
	
	$layout = $params ['layout'];
	$layout_id = $params ['layout_id'];
	// update link
	$sql = "UPDATE links SET `name`='$name' , `title`='$title' , `uri`='$uri' , `route`='$route' WHERE id=$link_id";
	
	$rs = $DB->Execute ( $sql );
	// update layout
	$sql = "SELECT * FROM layouts WHERE link_id=$link_id";
	$rs = $DB->Execute ( $sql );
	if ($rs->RecordCount () == 0) {
		$sql = "INSERT INTO layouts (`link_id`,`layouts`,`template_id`)VALUES('$link_id','$layout','0')";
	} else {
		$sql = "UPDATE layouts SET `layouts`='$layout'  WHERE id=$layout_id";
	}
	
	$rs = $DB->Execute ( $sql );
	
	return true;
}
function delete_page($id) {
	$DB = NewADOConnection ( 'mysql' );
	$DB->PConnect ( HOST, USER, PASS, ADM_DB);
	$sql = "DELETE FROM links WHERE id=$id";
	$rs = $DB->Execute ( $sql );
	if ($rs) {
		return $rs;
	}
	return false;
}
function get_all_templates() {
	$DB = NewADOConnection ( 'mysql' );
	$DB->PConnect ( HOST, USER, PASS, ADM_DB);
	$sql = "SELECT * FROM templates ORDER by id DESC";
	$rs = $DB->Execute ( $sql );
	if ($rs) {
		return $rs;
	}
	return false;
}
function install_temp($target_path) {
	$DB = NewADOConnection ( 'mysql' );
	$DB->PConnect ( HOST, USER, PASS, ADM_DB);
	$zip_file = basename ( $_FILES ['temp'] ['name'] );
	//unzip and copy to module folder
	$zip = new ZipArchive ( );
	if ($zip->open ( $target_path )) {
		$zip->extractTo ( '../templates/' );
		$zip->close ();
		
		$folder = explode ( ".", basename ( $_FILES ['temp'] ['name'] ) );
		
		$folder = $folder [0];
		
		$install_info_file = "../templates/$folder/install.xml";
		
		if (file_exists ( $install_info_file )) {
			$xml = file_get_contents ( $install_info_file );
			
			$xml = simplexml_load_string ( $xml ) or die ( "<br/>Unable to load XML string!<br/>" );
			
			foreach ( $xml->module as $module ) {

				
				if ($module ["name"] == "foldername") {
					$foldername = $module ['value'];
				}
				if ($module ["name"] == "name") {
					$name = $module ['value'];
				}
				if ($module ["name"] == "css") {
					$css = $module ['value'];
				}
				if ($module ["name"] == "js") {
					$js = $module ['value'];
				}
				if ($module ["name"] == "imagepath") {
					$image_path = $module ['value'];
				}
			
			}
			$sql = "INSERT INTO templates (`name`,`folder_name`,`css`,`js`,`image_path`,`default`) values('$name','$foldername','$css','$js','$image_path',1)";
			
			$rs = $DB->Execute ( $sql );
			if ($rs) {
				unlink ( "../templates/" . $zip_file );
				echo "<br/>Template Installed Successfully....<br/>";
				return $rs;
			}
			return false;
		} else {
			echo "<br/>install.xml file not found!<br/>";
		}
	
	} else {
		echo '<br/>zip extraction failed<br/>';
	}

}
function uninstall_temp($id) {
	$DB = NewADOConnection ( 'mysql' );
	$DB->PConnect ( HOST, USER, PASS, ADM_DB);
	$sql = "DELETE FROM templates WHERE id=$id";
	$rs = $DB->Execute ( $sql );
	if ($rs) {
		return $rs;
	}
	return false;

}
?>