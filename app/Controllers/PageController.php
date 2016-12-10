<?php
    namespace App\Controllers;
    use App\Modules\Users;
    use App\Modules\Blog;
    use App\Libraries\View;
    use App\Libraries\Pagination;           // CLASS PAGINATION FOR PAGES
    
    class PageController{
        public function index (){
            $use = new Blog();
            // CONSULTA SQL DETODO LOS POST EN LA BASE DE DATOS
                $postAll = $use -> query('SELECT id FROM blog');
            // OPTENIENDO DATOS DE LA PAGINACION
                $page = Pagination::getPages(
                                            $postAll->rowCount(),   // TODO LOS DATOS
                                            $_GET['pg'] ?? 1,       // PAGINA ACTUAL
                                            10                       // INTERVALO
                                            );
            // CONSULTA SQL CON LIMITE A LA TABLA BLOG
                $blogPosts = $use -> query(
                    "SELECT id, autor, autorProfile, date, title, content, image FROM blog
                    ORDER BY date DESC
                    LIMIT {$page['startData']}, {$page['endData']}"
                );
            // RENDERIZANDO LA PLANTILLA CORRESPONDIeNTE
                View::Render('pages/index',compact('blogPosts','page'));
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