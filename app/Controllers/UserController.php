<?php
    namespace App\Controllers;
    use App\Modules\Users;
    use App\Libraries\View;

    use App\Libraries\Pagination;           // CLASS PAGINATION FOR PAGES
    
    class UserController{
        public function index(){
            $user = new Users();
            if(isset($_POST['searchUser'])){
                // CONSULTA SQL busqueda de usuario
                $usersAll = $user -> query(
                    'SELECT id, userName, fullName FROM users WHERE userName LIKE :searchUser OR fullName LIKE :searchFullName',
                    [
                        ':searchUser'       =>  '%' . htmlentities(addslashes($_POST['searchUser'])) . '%' ,
                        ':searchFullName'   =>  '%' . htmlentities(addslashes($_POST['searchUser'])) . '%' 
                    ]
                );
                foreach($usersAll as $row){
                    echo $row['userName'];
                }
                $usersAllSearch = $usersAll;
            }else{
                $usersAll = $user -> query('SELECT id FROM users');
            }
        // ONTENIENDO DATOS PARA LA PAGINACION
            $page = Pagination::getPages(
                                        $usersAll -> rowCount(),
                                        $_GET['pg'] ?? 1,
                                        $_POST['showUser'] ?? 5
                                        );
        // CONSULTA SQL CON LIMITE
        if(isset($usersAllSearch)){
            $rangeUsers = $usersAllSearch;
        }else{
            $rangeUsers = $user -> query(
                "SELECT id, userName, fullName, email, sex, profileImg FROM users
                LIMIT {$page['startData']}, {$page['endData']}"
            );
        }
        // renderisando la vista en el navegador y pasando las variables correspondientes
            View::Render('adminusers/index',compact('rangeUsers','page'));
        }

        /**------------------------------------------------------------------------------------+
        +----------------------------------- Eliminar usuarios --------------------------------+
        +--------------------------------------------------------------------------------------+*/
        public function deleteUsers(){
            $userC = new Users();
            $userConsult = $userC -> query(
                'SELECT id, userName, profileImg FROM users WHERE id= :id',
                [
                    ':id' => htmlentities(addslashes($_GET['id']))
                ]
            );
            foreach($userConsult  as $row){
                $user = $row;
            }
            unlink(APP_PATH . "/public/img/{$user['profileImg']}");

            $userD = new Users();
            $userD -> query(
                'DELETE FROM users WHERE id= :id',
                [
                    ':id' => $_GET['id']
                ]
            );
            echo session_status();
            session_destroy();
            echo session_status();
            // header('location:/adminusers');
        }



        /**------------------------------------------------------------------------------------+
        +------------------------------------ Editar Usuarios ---------------------------------+
        +--------------------------------------------------------------------------------------+*/
        public function updateUsers(){
            $nUsers = new Users();
            $updateUsers = $nUsers -> query(
                'SELECT id, userName, fullName, email, password, sex, profileImg
                FROM users WHERE id= :id',
                [
                    ':id' => $_GET['id']
                ]
            );
            // $userID = [];
            foreach($updateUsers as $row){
                $user = $row;
            }
            View::Render('adminusers/update',compact('user'));
        }



        /**------------------------------------------------------------------------------------+
        +---------------------------------------- Ver Perfil ----------------------------------+
        +--------------------------------------------------------------------------------------+*/
        public function viewUser(){
            $nUsers = new Users();
            $showUser = $nUsers -> query(
                'SELECT id, userName, fullName, email, password, sex, profileImg
                FROM users WHERE id= :id',
                [
                    ':id' => $_GET['id']
                ]
            );
            foreach($showUser as $row){
                $user = $row;
            }
            View::Render('adminusers/view',compact('user'));
        }

        public function test(){
            $cons = new Users();
        }

    }