<?php
namespace Zero;

use mysqli;
class App{
    public function __construct() {
        \Zero\Database::initialize();
        \Zero\Authentication::initialize();
        \Zero\Router::parse_url();
        \Zero\Router::parse_controller();
        $controller = \Zero\Router::get_controller(\Zero\Router::$controller, \Zero\Router::$path);
        $method = \Zero\Router::parse_method($controller);
        $params = \Zero\Router::get_params();
        date_default_timezone_set(Date::$default_timezone);
        Date::$timezone = date_default_timezone_get();
        Date::$date = Date::get();
        Database::close();
    }
}
?>