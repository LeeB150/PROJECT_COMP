<?php
    // Language
    define('LANG'       , 'es');

    // The paths of directories and files
    define('APP'        , ROOT . 'app' . DS);
    define('BOOTSTRAP'  , ROOT . 'bootstrap' . DS);
    define('CONFIG'     , ROOT . 'config' . DS);
    define('STORAGE'    , ROOT . 'storage' . DS);
    define('SYSTEM'     , ROOT . 'system' . DS);
    define('VENDOR'     , ROOT . 'vendor' . DS);

    // APP
    define('CONTROLLERS', APP . 'controllers' . DS);
    define('HELPERS'    , APP . 'helpers' . DS);
    define('MODELS'     , APP . 'models' . DS);
    define('ROUTES'     , APP . 'routes' . DS);

    // STORAGE
    define('CACHES'     , STORAGE . 'cache' . DS);
    define('LOGS'       , STORAGE . 'logs' . DS);
    define('UPLOADS'    , STORAGE . 'uploads' . DS);

    // SYSTEM
    define('CORE'       , SYSTEM . 'core' . DS);
    define('HTTP'       , SYSTEM . 'http' . DS);
    define('INCLUDES'   , SYSTEM . 'includes' . DS);
    define('LIBS'       , SYSTEM . 'libs' . DS);
    define('TRAITS'     , SYSTEM . 'traits' . DS);
    define('UTILS'      , SYSTEM . 'utils' . DS);


    // Know if we are working locally or remotely
    define('IS_LOCAL'   , in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1', '::1']));

    // The default controller / the default method / and the default error controller
    define('DEFAULT_CONTROLLER'         , 'Index');
    define('DEFAULT_ERROR_CONTROLLER'   , 'Index');
    define('DEFAULT_METHOD'             , 'Index');


    // Time Constant for the system
    define('TIME_ZONE_DEFAULT'          , 'UTC');
?>