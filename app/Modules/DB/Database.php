<?php
    namespace App\Modules\DB;
    use PDO;
    require_once 'env.php';

    class Database{
        public static function connection(){
            $db = new PDO(
                DATABASE['driver'] . ":
                host=" . DATABASE['host'] . ";
                dbname=" . DATABASE['dbname'],
                DATABASE['useranme'],
                DATABASE['password']
            );
            return $db;
        }
    }