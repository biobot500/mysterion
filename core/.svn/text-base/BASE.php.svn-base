<?php
include_once CORE_PATH . '/adodb/adodb.inc.php';
class BASE {
	
	public static $DB;
	public function __construct() {
		$this->DB = NewADOConnection ( 'mysql' );
		$this->DB->PConnect ( DB_HOST, DB_USER, DB_PASS, DB_NAME );
	}
	public function readArrayFromFile($filename) {
		$config = include $filename;
		return $config;
	}
	public function writeArrayToFile($filename, array $config) {
		$config = var_export ( $config, true );
		if (file_put_contents ( $filename, "<?php return $config ;" )) {
			return true;
		}
		return false;
	}
	public function check_installation() {
		//check if table exists
		

		//$rs = $this->DB->Execute ( "select Table_Name from information_schema.TABLES where Table_Name='links' and TABLE_SCHEMA='swi_app_engine'" );
		//$total = $rs->RecordCount ();
		//if ($total > 0) {
			/*
	 * get required datas
	 * routes info
	 * get module info
	 * get layout info for routes
	 * execute controller and default function
	 *  
	 * 
	*/
			return true;
		//} else {
			//$this->install ();
		//}
	}
	public function install() {
		echo "please wait...installing application engine";
	}
	public function GET_ROUTES($uri) {
		$this->DB->SetFetchMode ( ADODB_FETCH_ASSOC );
		$rs = $this->DB->Execute ( "SELECT route FROM links WHERE uri='$uri'" );
		if ($rs->RecordCount () > 0) {
			return $rs->fields ['route'];
		}
		return false;
	}
	public function GET_DEFAULT_TEMPLATE() {
		$this->DB->SetFetchMode ( ADODB_FETCH_ASSOC );
		$rs = $this->DB->Execute ( "SELECT * FROM templates WHERE `default`=1" );
		if ($rs) {
			define ( 'TMPL_NAME', $rs->fields ["name"] );
			define ( 'TMPL_FOLDER', BASE_URL . TMPL_PATH . "/" . $rs->fields ["folder_name"] );
			define ( 'TMPL_CSS', $rs->fields ["css"] );
			define ( 'TMPL_JS', $rs->fields ["js"] );
			define ( 'IMAGE_PATH', $rs->fields ["image_path"] );
			return $rs->fields;
		}
		return false;
	}
	public function GET_URI_ID($uri_name) {
		$this->DB->SetFetchMode ( ADODB_FETCH_ASSOC );
		$rs = $this->DB->Execute ( "SELECT * FROM links WHERE `uri`='$uri_name'" );
		
		if ($rs->RecordCount () > 0) {
			return $rs->fields ['id'];
		}
		return false;
	}
	public function GET_LAYOUT_BY_URI($link_id, $template_id) {
		$this->DB->SetFetchMode ( ADODB_FETCH_ASSOC );
		$rs = $this->DB->Execute ( "SELECT layouts FROM layouts WHERE `link_id`=$link_id" );
		if ($rs) {
			return $rs->fields ['layouts'];
		}
		return false;
	}
	public function GET_TITLE_BY_URI($link_id) {
		$this->DB->SetFetchMode ( ADODB_FETCH_ASSOC );
		$rs = $this->DB->Execute ( "SELECT title FROM links WHERE `id`=$link_id" );
		if ($rs) {
			return $rs->fields ['title'];
		}
		return false;
	}
	public function PARSE_TEMPLATE($temp_info, $uri) {
                
		$html = file_get_contents ( TMPL_PATH . $temp_info ['folder_name'] . '/index.html' );
		// get URI_ID by URI
		$uri_id = $this->GET_URI_ID ( $uri );
		// get page title
		$page_title = $this->GET_TITLE_BY_URI ( $uri_id );
		// get layout for ID
		$layout = $this->GET_LAYOUT_BY_URI ( $uri_id, $temp_info ['id'] ); // returns xml value
		

		// load xml layout
		$xml = simplexml_load_string ( $layout ) or die ( "Unable to load XML string!" );
		foreach ( $xml->module as $module ) {
			$mdl_details = $this->GET_MODULE_DETAILS ( $module ["name"] );
			if ($mdl_details) {
				$modules [] = array ("name" => $module ["name"], "container" => $module ["container"], "position" => $module ["position"] == "" ? 0 : $module ["position"], "folder_name" => $mdl_details ["folder_name"] );
			}
		
		}
		/*echo $xml->Title;
		foreach ( $xml->Title [0]->attributes () as $a => $b ) {
			echo $a, '="', $b, "\"\n";
		}
		$page_title = $xml->Title;
		
		echo $page_title;*/
		
		// TODO:: check module existance;
		

		// get all css files
		$all_css = explode ( ";", TMPL_CSS );
		$css_html = "";
		foreach ( $all_css as $k => $v ) {
			$tmpl_folder = TMPL_FOLDER;
			$css_html .= "<link href='" . $tmpl_folder . "/" . $v . "' rel='stylesheet' type='text/css' />\n";
		}
		
		// get all js files
		$all_js = explode ( ";", TMPL_JS );
		$js_html = "";
		foreach ( $all_js as $k => $v ) {
			if ($v != "") {
				$tmpl_folder = TMPL_FOLDER;
				$js_html .= "<script type='javacript' src='" . $tmpl_folder . "/" . $v . "'></script>\n";
			}
		}
		
		// add module by div container		
		include ('core/simplehtmldom/simple_html_dom.php');
		$html = file_get_html ( TMPL_PATH . $temp_info ['folder_name'] . '/index.html' ); // get template file
                
		foreach ( $modules as $k => $v ) {

			$module_output = $this->GET_INCLUDE_CONTENT( MODULE_PATH . $v ['folder_name'] . '/index.php' );
			$html->find ( '#' . $v ['container'], 0 )->innertext = $html->find ( '#' . $v ['container'], 0 )->innertext ."". $module_output;
		}
		
		// replace static tags
		$replace_vals = array ("<#^css^#>" => $css_html, "<#^js^#>" => $js_html, "<#^image_path^#>" => IMAGE_PATH, "<#^title^#>" => $page_title );
		$html = $this->SEARCH_AND_REPLACE ( $replace_vals, $html );
		
		//TODO parse language, configurations
		return $html;
	}
	public function SEARCH_AND_REPLACE($replace_vals, $html) {
		foreach ( $replace_vals as $key => $val ) {
			$html = str_ireplace ( $key, $val, $html );
		}
		return $html;
	}
	public function GET_MODULE_DETAILS($module_name) {
		$this->DB->SetFetchMode ( ADODB_FETCH_ASSOC );
		$rs = $this->DB->Execute ( "SELECT * FROM modules WHERE `sys_name`='$module_name'" );
		if ($rs) {
			return $rs->fields;
		}
		return false;
	}
	public function GET_INCLUDE_CONTENT($filename) {
		if (is_file ( $filename )) {
			ob_start ();
			include $filename;
			return ob_get_clean ();
		}
		return false;
	}
        public function View($page_name, $data_array) {
            //Convert array into variable
            foreach ($data_array as $k=>$v) {
                ${$k} = $v;
            }
            //load the view
            require_once 'views/'.$page_name.'.php';
        }
}
?>