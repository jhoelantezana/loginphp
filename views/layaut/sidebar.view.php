    <section class="sidebar">
        <div class="sidebar__profile">
            <div class="sidebar__profile__item">
                <img src="<?=PUBLIC_PATH . '/assets/img/' . $_SESSION['profileImg']?>" class="sidebar__profile__banner"alt="">
            </div>
            <div class="sidebar__profile__item">
                <img src="<?=PUBLIC_PATH . '/assets/img/' . $_SESSION['profileImg']?>" class="sidebar__profile__img"alt="">
            </div>
            <div class="sidebar__profile__item">
                <a href="/auview?id=<?= $_SESSION['id'] ?? ''?>" class="sidebar__profile__userName"><?= $_SESSION['userName'] ?? ''?></a>
                <p class="sidebar__profile__online">online</p>
                <a href="auview?id=<?= $_SESSION['id'] ?? ''?>" class="sidebar__profile__logout">Editar Perfil</a>
            </div>
        </div>
        <nav>
            <ul class="sidebar__menu">
                <li class="sidebar__menu__item">
                    <a href="/" class="sidebar__menu__link icon-home">Inicio</a>
                </li>
                <li class="sidebar__menu__item">
                    <a class="sidebar__menu__link icon-user-add"href="/">Entradas</a>
                    <ul class="sidebar__subMenu">
                        <li class="sidebar__subMenu__item"><a href="#" class="sidebar__subMenu__link" id="ampaddPost">Nueva Entrada</a></li>
                        <li class="sidebar__subMenu__item"><a href="/blog/admin" class="sidebar__subMenu__link">Gestionar</a></li>
                    </ul>
                </li>
                <li class="sidebar__menu__item">
                    <a class="sidebar__menu__link icon-user-add"href="/adminusers">Usuarios</a>
                    <ul class="sidebar__subMenu">
                        <li class="sidebar__subMenu__item"><a href="" class="sidebar__subMenu__link">Añadir</a></li>
                        <li class="sidebar__subMenu__item"><a href="" class="sidebar__subMenu__link">Roles</a></li>
                    </ul>
                </li>
                <li class="sidebar__menu__item">
                    <a class="sidebar__menu__link icon-user-add"href="/adminusers">Configuracion</a>
                    <ul class="sidebar__subMenu">
                        <li class="sidebar__subMenu__item"><a href="" class="sidebar__subMenu__link">Principal</a></li>
                        <li class="sidebar__subMenu__item"><a href="" class="sidebar__subMenu__link">Blog</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        
        <div class="onlineOfline">
        </div>
    </section>