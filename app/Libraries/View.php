<?php
    namespace App\Libraries;
    class View{
        public static function Render($viewRender,$contentVar = []){
            extract($contentVar);
            require_once APP_PATH . "/views/{$viewRender}.view.php";
        }
    }