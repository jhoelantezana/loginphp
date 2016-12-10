<?php
    namespace App\Modules;
    use App\Modules\DB\Database;

    class Blog{
        public function query($query = null, $values = []){
            $db = Database::connection();
            $consultDB = $db ->  prepare($query);
            $consultDB -> execute($values);
            return $consultDB;
        }
    }