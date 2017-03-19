<?php

// Pre-define the core paths
// Define them as absolute paths to make sure that require_once works as expected
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
defined('SITE_ROOT') ? null :
define('SITE_ROOT', DS.'Users'.DS.'xx'.DS.'Sites'.DS.'spoonity');// need to change to current path name
defined('AB_PATH') ? null : define('AB_PATH', SITE_ROOT.DS.'includes');
// load config file first
require_once(AB_PATH.DS.'config.php');
// load basic functions next so that everything after can use them
require_once(AB_PATH.DS.'functions.php');
// load core objects
require_once(AB_PATH.DS.'database.php');
require_once(AB_PATH.DS.'database_object.php');
require_once(AB_PATH.DS.'session.php');
// load database-related classes
require_once(AB_PATH.DS.'user.php');

?>
