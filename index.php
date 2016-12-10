<?php
    require_once __DIR__ . '/config/app.php';
    use App\Libraries\Router;
    session_start();
    // =================== Acceso solo a usuarios registrados ===================
    if(isset($_SESSION['userName'])){
        $url = ROUTES[$_GET['url'] ?? ''] ?? false;
        if($url){
            Router::any($url['controller'],$url['action']);
        }else{
            Router::any('Page','E404');
        }
    // ============================= Acceso publico =============================
    }else{
        $url = ROUTERPUBLIC[$_GET['url'] ?? ''] ?? false;
        if($url){
            Router::any($url['controller'],$url['action']);
        }else{
            header('location:/');
        }
    }
