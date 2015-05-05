<?php
/*
 * load base 
 */

require_once CORE_PATH . '/BASE.php';
$base = new BASE ( );
/*
 * check if db is installed or not; if not, then install;
 */
$base->check_installation ();
/*
 * escape all special charecters in URI
 */
$URI = explode ( "/", $_SERVER ['REQUEST_URI'] );
unset ( $URI [0] );
unset ( $URI [1] );
$URI_VAL = "";
foreach ( $URI as $k => $v ) {
	if ($v != "" && strlen ( $v ) > 0) {
		$uri_values [] = htmlspecialchars_decode ( $v );
		$URI_VAL .= "/" . htmlspecialchars_decode ( $v );
	}
}
/*
 * load base MVC
 */
require_once CORE_PATH . '/MVC.php';

/*
 * get route file 
 */
/*$routes_path = $core_path . '/routes.php';
require_once $routes_path;*/

/*
 * check routes if URI is predefined
 */
if ($data_source_type == "mysql") {


	$route = $base->GET_ROUTES ( $URI_VAL );
        
	if ($route) {
		/*
		 * get default template 
		 */
		
		$temp_info = $base->GET_DEFAULT_TEMPLATE ();
		
		if ($temp_info) {
			/*
			 * get controller 
			 */
			if ($route != "system") {
                                
				$execution_info = explode ( "/", $route );
				$controller = $execution_info [0];
				$method = $execution_info [1];
				require_once CONTROLLERS_PATH . '/' . $controller . ".php";
				/*
                                 * execute custom method(without template), if $method != _systemview
                                 */
				$Cont = new $controller ( $temp_info );
				
				echo $Cont->$method ();
			
			} else {
				$html = $base->PARSE_TEMPLATE ( $temp_info, $URI_VAL );
				echo $html;
			}
		} else {
			die ( "ERROR>> default template not defined!" );
		}
	} else {
		die ( "ERROR>> URI is not defined." );
	}
}
?>