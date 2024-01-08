<?php
define("DEBUG",         1);
define("LOGGING",       1);
define("MYSQL_DEBUG",   0);
define("CACHE",         1);
define("ZEROCODE",      1);

require_once realpath(__DIR__)."/bootstrap/init.php";

$App = new Zero\App;
?>