<?php
    if(DEBUG){
        ini_set("display_errors",1);
        ini_set("display_startup_errors",1);
        error_reporting(E_ALL);
    }else{
        ini_set("display_errors","Off");
    }
        
    if(LOGGING){
        ini_set("log_errors",1);
        ini_set("error_log",LOGS."debug-".date("Y-m-d").".log");
    }else{
        ini_set("log_errors", 0);
    }
?>