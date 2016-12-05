<?php
    namespace App\Controllers;
    use App\Modules\Users;
    use App\Libraries\View;
    
    class PageController{
        public function index (){
            View::Render('pages/index');
        }
        public function register(){
            View::Render('pages/register');
        }
        public function session(){
            View::Render('pages/session');
        }
        public function E404(){
            $E404Message = $_GET['url'];
            View::Render('pages/404',compact('E404Message'));
        }
    }