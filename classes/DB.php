<?php

class DB {
    
    protected static $con;
    
    private function __construct() {
        
        try {
            
            self::$con = new PDO( 'mysql:charset=utf8mb4;host=localhost;port=3306;dbname=social', 'root', 'g0ld3nr00tz');
            self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            self::$con->setAttribute( PDO::ATTR_PERSISTENT, false );
            
        } catch (PDOException $e) {
            echo "Cron could not connect to db";
            exit;
        }
    }
    
    public static function getConnection() {
        if(!self::$con){
            new DB();
        }
        return self::$con;
    }
}

?>