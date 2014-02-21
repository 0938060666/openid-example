<?php
ini_set('display_errors', 'On');

$baseDir = dirname(__FILE__);
set_include_path($baseDir . '/php-openid-2.1.3/');
require_once('Auth/OpenID/SReg.php');
require_once('Auth/OpenID/FileStore.php');
require_once('Auth/OpenID/Consumer.php');
require_once('Auth/OpenID/PAPE.php');
require_once('Auth/OpenID/AX.php');

define('STORE_PATH', '/tmp');
define('PIXNET_OPENID', 'https://openid.pixnet.cc');
define('TRUSTED_ROOT', 'http://example.com'); // please change this
define('RETURN_TO', TRUSTED_ROOT .'/openid/finish.php'); // please change this

?>
