<?php
namespace Zero;

class Database
{
    public static $database;
    public static $db;



    public static function initialize() {
        try {
            self::$database = new \mysqli(
                IS_LOCAL ? LDB_HOST : DB_HOST,
                IS_LOCAL ? LDB_USER : DB_USER,
                IS_LOCAL ? LDB_PASS : DB_PASS,
                IS_LOCAL ? LDB_NAME : DB_NAME,
                IS_LOCAL ? LDB_PORT : DB_PORT
            );
        } catch (\Exception $e) {
            die("The connect to the database Failed! Check the config.php file and make sure database connection details are correct and your server is running.<br>".$e->getMessage());
        }

        if (MYSQL_DEBUG) {
            self::$database->query("set profiling_history_seize=100");
            self::$database->query("set profiling=1");
        }

        self::$database->set_charset("utf8mb4");

        self::initialize_helper();
        
        return self::$database;
    }
    
    public static function initialize_helper() {
        self::$db = new \MysqliDB(self::$database);
        self::$db->returnType = "Object";
    }
    
    public static function close() {
        if (MYSQL_DEBUG) {
            $result = self::$database->query("show profiles");
            while($profile = $result->fetch_object()){
                echo $profile->Query_ID." - ".round($profile->Duration,4) * 1000 ." ms - ".$profile->Query;
            }
        }
        self::$database->close();
    }

}

?>