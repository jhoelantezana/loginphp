<?php
    namespace App\Controllers;
    use App\Modules\Blog;
    use App\Libraries\View;
    use PDO;
    
    class BlogController{
        public function newPost(){
            $nPostTitle = htmlentities(addslashes($_POST['titlePost']));
            $nPostContent = htmlentities(addslashes($_POST['contentPost']));
            echo 'ejecute';
            if($nPostTitle != '' & $nPostContent != ''){
                // Preparando la imagen
                $postImgName = $_FILES['imgPost']['name'];
                $postImgSize = $_FILES['imgPost']['size'];
                $postImgType = $_FILES['imgPost']['type'] ?? '';
                echo $postImgType;
                if($postImgType == 'image/jpg' or $postImgType == 'image/jpeg' or $postImgType == 'image/png'){
                    if($postImgSize < 10000000){
                        // Mueve la imagen de la memoria temporal al revidor
                        $ruteImgPost = "{$_SERVER['DOCUMENT_ROOT']}/assets/img/blog/";
                        move_uploaded_file($_FILES['imgPost']['tmp_name'],$ruteImgPost . $postImgName);

                        // SQL connecion a la base de datos
                        $use = new Blog();
                        $setPost = $use -> query(
                            'INSERT INTO blog (autor,autorProfile,date,title,content,image)
                            VALUES(:autor,:autorProfile,:date,:title,:content,:image)',
                            [
                                ':autor'            => $_SESSION['userName'],
                                ':autorProfile'     => $_SESSION['profileImg'],
                                ':date'     => date('c'),
                                ':title'    => $nPostTitle,
                                ':content'  => $nPostContent,
                                ':image'    => $postImgName
                            ]
                        );
                        header('location:/');

                    }else{
                        // accion que se ejecuta cuando el archivos pesa mas de 1MB
                        echo 'error tamaño imagen';
                    }
                }else{
                    // accion que se ejecuta cundo el tupo de archivo no es soportado
                    echo 'este archivo no es soportado';
                }
            }else{
                // accion que se ejecuata cuando no hay contenido en los campos
                echo 'no hay contenido';
            }
        }
        public function updatePost(){
            $postImgName = $_FILES['imgPost']['name'];
            $postImgSize = $_FILES['imgPost']['size'];
            $postImgType = $_FILES['imgPost']['type'] ?? '';

            unlink("{$_SERVER['DOCUMENT_ROOT']}/assets/img/blog/{$_POST['imageName']}");

            $ruteImgPost = "{$_SERVER['DOCUMENT_ROOT']}/assets/img/blog/";
            move_uploaded_file($_FILES['imgPost']['tmp_name'],$ruteImgPost . $postImgName);
            
            $use = new BLog();
            $use -> query(
                'UPDATE blog SET title=:title, content=:content, image=:image WHERE id=:id',
                [
                    ':title'        => $_POST['title'],
                    ':content'      => $_POST['content'],
                    ':image'        => $postImgName,
                    ':id'           => $_GET['id']
                ]
            );
            header('location:/blog/admin');
        }
        public function deletePost(){
            $use = new BLog();
            $deletePost = $use -> query(
                'DELETE FROM blog WHERE id=:id',
                [
                    ':id'       => $_GET['id']
                ]
            );
            header('location:/blog/admin');
        }
        // ADMINISTRAR LAS ENTRADAS
        public function addminPost(){
            $blogShow = 'adminPost';        // ESPECIFICADON EL BLOQUE QUE SE BA MOSTRAR
            $use = new BLog();
            $posts = $use -> query('SELECT id, autor,autorProfile,date,title,content,image FROM blog ORDER BY date DESC');
            View::Render('blog/index',compact('blogShow','posts'));
        }
        public function editPost(){
            $blogShow = 'editPost';        // ESPECIFICADON EL BLOQUE QUE SE BA MOSTRAR
            echo 'estamos editando el post';
            $use = new BLog();
            $postEdit = $use -> query(
                                    'SELECT id,title,content,image FROM blog WHERE id=:id',
                                    [
                                        ':id'       => $_GET['id']
                                    ]
                                    );
            foreach($postEdit as $row){
                $posts = $row;
            }
            View::Render('blog/index',compact('blogShow','posts'));
        }
    }