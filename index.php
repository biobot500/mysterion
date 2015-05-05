<?php
//set development environment
define('ENV', 'dev'); // define('ENV', 'test'), define('ENV', 'prod');
if (defined('ENV'))
{
    switch (ENV)
    {
        case 'dev':
                error_reporting(E_ALL);
        break;
        case 'test':
        case 'prod':
                error_reporting(0);
        break;
        default:
                exit('please set an application environment....');
    }
}
/*
 * load configurations
 */
require_once 'config/system.php';
require_once 'config/database.php';
/*
 * load application engine
 */
require_once CORE_PATH . '/APP_LOADER.php';
?>