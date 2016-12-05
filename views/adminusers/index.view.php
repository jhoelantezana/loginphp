<?php include_once APP_PATH . '/views/layaut/header.view.php'?>
<?php include_once APP_PATH . '/views/layaut/sidebar.view.php'?>
    <section class="main__content">
        <div class="adminUser__opctions">
            <form action="/adminusers" class="adminUser__opctions__form" method="POST">
                <input type="number" min="0" max="15" step="3" name="showUser">
                <input type="submit" value="Listar">
            </form>
            <form action="/adminusers" class="adminUser__opctions__form" method="POST">
                <input type="text" name="searchUser"placeholder="Buscar Usuario">
                <input type="submit" value="Buscar">
            </form>
        </div>
        <div class="adminUser__container">
            <table class="adminUser">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Perfil</th>
                        <th>Nombre de usuario</th>
                        <th>Nombre Completo</th>
                        <th>Email</th>
                        <th>Sexo</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($rangeUsers as $us):?>
                        <tr>
                            <td><?=$us['id']?></td>
                            <td>
                                <img src="<?= PUBLIC_PATH . '/assets/img/' . $us['profileImg'] ?>" alt="profile" class="adminUser__profile">
                            </td>
                            <td><?=$us['userName']?></td>
                            <td><?=$us['fullName']?></td>
                            <td><?=$us['email']?></td>
                            <td><?=($us['sex'] == 1) ? "Hombre" : "Mujer" ?></td>
                            <td>
                                <a href="/audelete?id=<?=$us['id']?>" class="adminUser__delete">Eliminar</a>
                                <a href="/auupdate?id=<?=$us['id']?>" class="adminUser__update">Editar</a>
                                <a href="/auview?id=<?=$us['id']?>" class="adminUser__view">Ver</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
        <div class="pgUsers__container">
            <ul class="pgUsers">


                <li class="pgUsers__item"><a href="/adminusers?pg=<?=$page['prevPage']?>" class="pgUsers__link">Anterior</a></li>
                <?php 
                    for($i = 1; $i <= $page['numPages']; $i++){
                        if($i == $page['actualPage']){ ?>
                        <li class="pgUsers__item"><a href="/adminusers?pg=<?=$i?>" class="pgUsers__link actualPage"><?=$i?></a></li>
                        <?php }else{ ?>
                        <li class="pgUsers__item"><a href="/adminusers?pg=<?=$i?>" class="pgUsers__link"><?=$i?></a></li>
                        <?php }
                    }
                ?>
                <li class="pgUsers__item"><a href="/adminusers?pg=<?=$page['nextPage']?>" class="pgUsers__link">Siguinete</a></li>
            </ul>
        </div>
    </section>
<?php include_once APP_PATH . '/views/layaut/footer.view.php'?>