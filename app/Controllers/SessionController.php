<?php
    namespace App\Controllers;
    use App\Modules\Users;
    use App\Libraries\View;
    class SessionController{
        public function sessionValidator(){
            // Consulta a la base de datos del usuario que se esta ingresando en el formulario
            if($_POST['userName'] != '' && $_POST['password'] != ''){
                $users = new Users();
                $sessionUsers = $users -> query(
                    'SELECT id, userName, password, profileImg FROM users WHERE userName= :userName',
                    [
                        ':userName' => $_POST['userName']
                    ]
                );
                //=======control si existe o no el usuario que esta tratando de iniciar session=======
                if($sessionUsers -> rowCount()){
                    foreach($sessionUsers as $row){
                        $user = $row;
                    }
                    // veficando la validez de la contraseña
                    // echo $_POST['password'] + 'contraseña';
                    if( password_verify(htmlentities(addslashes($_POST['password'])),$user['password'])){
                        // ==================== Acciones si la session fue exitosa ====================
                        $this->sessionStart($user); // llamando a la funcion encargado de iniciar session
                        echo 'continue';
                    }else{
                    // ==================== Accion que se ejecuta cuando la contraseña es incorrecta ====================
                        echo 'errorPass';
                    }
                }else{
                    // ====================Accion a ejecutar si el usuario no existe====================
                    echo 'errorUser';
                }
            }
        }

        public function sessionStart($user){
            $_SESSION['userName'] = $user['userName'];
            $_SESSION['profileImg'] = $user['profileImg'];
            $_SESSION['id'] = $user['id'];
        }

        public function logout(){
            session_destroy();
            header('location:/');
        }
                /**------------------------------------------------------------------------------------+
        +---------------------------- Añadir o registrar nuevos usuarios ----------------------+
        +--------------------------------------------------------------------------------------+*/
        public function register(){
            // procesando la subida de imagen php*********************
            $imgProfileName = $_FILES['imgProfile']['name'];
            $imgProfileSize = $_FILES['imgProfile']['size'];
            $imgProfileType = $_FILES['imgProfile']['type'];

            echo 'hola registrado';

            // comprobacion de la coincidencia de las contraseña
            if($_POST['password'] === $_POST['confirmPassword']){
                // comprobacion tamaño maximo de la imagen
                if($imgProfileSize < 1048576){
                    // condicional validacion de fecha
                    if(checkdate($_POST['month'],$_POST['day'],$_POST['year'])){
                        // condicional tipos de imagenes soportados
                        if($imgProfileType == 'image/jpg' || $imgProfileType == 'image/png' || $imgProfileType == 'image/jpeg' || $imgProfileType == ''){

                            $suer = new Users();
                            $userConsult = $suer -> query(
                                'SELECT id, userName FROM users WHERE userName= :userName',
                                [
                                    ':userName' => htmlentities(addslashes($_POST['userName']))
                                ]
                            );
                            if($userConsult -> rowCount() != 0){
                                // ERROR = 100 se ejecuta cunado el usuario ingresado ya existe
                                header('location:/session?wr=100'."&uN={$_POST['userName']}&e={$_POST['email']}&fn={$_POST['fullName']}");
                            }else{
                                // ========================================================================
                                // ========================= ACCIO PRINCIPAL ==============================
                                    $routeImgsProfile = "{$_SERVER['DOCUMENT_ROOT']}/assets/img/profile/";

                                    move_uploaded_file($_FILES['imgProfile']['tmp_name'],$routeImgsProfile . $imgProfileName);
                                    
                                    // ************************************************** //
                                    $addUser = new Users();
                                    $addUser -> query(
                                        'INSERT INTO users (userName,fullName,email,password, birday, sex,profileImg)
                                        VALUES (:userName, :fullName, :email, :password, :birday, :sex, :profileImg)',
                                        [
                                            ':userName'     => htmlentities(addslashes($_POST['userName'])),
                                            ':fullName'     => htmlentities(addslashes($_POST['fullName'])),
                                            ':email'        => htmlentities(addslashes($_POST['email'])),
                                            ':password'     => password_hash(htmlentities(addslashes($_POST['password'])),PASSWORD_DEFAULT,['cost' => 12]),
                                            ':birday'       => "{$_POST['year']}-{$_POST['month']}-{$_POST['day']}",
                                            ':sex'          => htmlentities(addslashes($_POST['sex'])),
                                            ':profileImg'   => htmlentities(addslashes('profile/' . $imgProfileName)),
                                        ]
                                    );

                                // ========================================================================
                                // ============================== Iniciado Session ========================
                                    $userUp = new Users();
                                    $userR = $userUp -> query(
                                        'SELECT id, userName, profileImg FROM users WHERE userName= :userName',
                                        [
                                            ':userName' => htmlentities(addslashes($_POST['userName']))
                                        ]
                                    );
                                    foreach($userR as $row){
                                        $user = $row;
                                    }
                                    $this -> sessionStart($user);
                                    header('location:/');
                            }
                        }else{
                            // ERROR = 101 Accion que se ejecuta si el archivo subido no es soportado
                            header('location:/session?wr=101'."&uN={$_POST['userName']}&e={$_POST['email']}&fn={$_POST['fullName']}");
                        }
                    }else{
                        // ERROR = 102 accion que se ejecuta cunado la fecha es incorrecta
                        header('location:/session?wr=102'."&uN={$_POST['userName']}&e={$_POST['email']}&fn={$_POST['fullName']}");
                    }
                }else{
                    // ERROR = 103 Accion que ejecuta sis se supera los 1MB limite maximo 
                    header('location:/session?wr=103'."&uN={$_POST['userName']}&e={$_POST['email']}&fn={$_POST['fullName']}");
                }
            }else{
                // ERROR = 104 Accion que se ejecuta si las contraseñas no coinciden
                header('location:/session?wr=104'."&uN={$_POST['userName']}&e={$_POST['email']}&fn={$_POST['fullName']}");
            }
        }
    }