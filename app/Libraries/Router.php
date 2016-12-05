<?php
    namespace App\Libraries;
    use App\Controllers\PageController;

    class Router{
        public static function any($controller = null, $action = 'index'){
            if($controller){
                $use = "\\App\\Controllers\\{$controller}Controller";
                $useController = new $use;
            }else{
                $useController = new PageController;
            }
            if(method_exists($useController,$action)){
                return $useController -> $action();
            }else{
                header('location:/');
            }
        }
    }