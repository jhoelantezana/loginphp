<?php
    namespace App\Modules;
    use App\Modules\DB\Database;

    class Users{
        public function query($query = null, $values = []){
            $db = Database::connection();
            $consultDB = $db ->  prepare($query);
            $consultDB -> execute($values);
            return $consultDB;
        }
    }