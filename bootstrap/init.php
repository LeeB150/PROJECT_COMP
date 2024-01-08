<?php
    define("DS",    DIRECTORY_SEPARATOR);
    define("ROOT",  getcwd().DS);
    
    date_default_timezone_set("UTC");

    require_once __DIR__.DS."constants.php";

    $config_files = glob(CONFIG."*.php");

    foreach ($config_files as $config_file) {
        require $config_file;
    }
    
    define("SITE_URL", (IS_LOCAL ? URL_LOCAL : URL));
    
    define('COOKIE_PATH', preg_replace('|https?://[^/]+|i', '', SITE_URL));

    define('CACHE_DEFAULT_SECONDS', 2592000);

    session_set_cookie_params([
        "lifetime"  => null,
        "path"      => COOKIE_PATH,
        "samesite"  => "Lax"
    ]);

    require_once INCLUDES."debug.php";

    spl_autoload_register(function($class){
        $namespace_prefix = "Zero";
        $split = explode("\\",$class);
        if ($split[0] !== $namespace_prefix) {
            return;
        }

        if (isset($split[1]) && !isset($split[2])) {
            // echo CORE.$split[1].".php<br>";
            if (!is_file(CORE.$split[1].".php")) {
                die(sprintf('The File "%s" is not found',CORE.$split[1].'.php'));
            }
            require_once CORE.$split[1].".php";
        }

        if (isset($split[1],$split[2]) && in_array($split[1],["Traits","Models","Libs"])) {
            $folder = constant(strtoupper(strtolower($split[1])));
            $file = $folder.$split[2].".php";

            if (!is_file($file)) {
                die("The File '$file' is not found");
            }
            require_once $file;
        }
    });

    require_once CORE."Controller.php";
    require_once CORE."Model.php";
    
    require_once UTILS."links.php";
    require_once UTILS."strings.php";
    require_once UTILS."others.php";
    require_once UTILS."core.php";

    require_once VENDOR."autoload.php";
?>