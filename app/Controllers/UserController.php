<?php
    namespace App\Controllers;
    use App\Modules\Users;
    use App\Libraries\View;
    
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

        // PARTE PRA LA PAGINACION DE LOS USUARIOS A MOSTRAR
            $showUsers = htmlentities(addslashes($_POST['showUser'] ?? 5)) ;
            $actualPage = htmlentities(addslashes($_GET['pg'] ?? 1)) ;
            $startUser = (($actualPage - 1) * $showUsers);
            $endUser = $showUsers;

        // PREPARANDO las variables para enviar a la vista
            $page = [
                'numPages'      => ceil(($usersAll -> rowCount()) / $showUsers),
                'nextPage'      => $actualPage + 1,
                'prevPage'      => $actualPage - 1,
                'actualPage'    => $actualPage
            ];

        // CONSULTA SQL CON LIMITE
        if(isset($usersAllSearch)){
            $rangeUsers = $usersAllSearch;
        }else{
            $rangeUsers = $user -> query(
                "SELECT id, userName, fullName, email, sex, profileImg FROM users LIMIT {$startUser}, {$endUser}"
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