<main class="main">
<div class="contentfluit">
    <section class="main__sidebar">
        <header class="main__sidebar__header">
            <h1>Red Social</h1>
        </header>
        <div class="profile">
            <div class="profile__item">
                <img src="<?=PUBLIC_PATH . '/assets/img/' . $_SESSION['profileImg']?>" class="profile__banner"alt="">
            </div>
            <div class="profile__item">
                <img src="<?=PUBLIC_PATH . '/assets/img/' . $_SESSION['profileImg']?>" class="profile__img"alt="">
            </div>
            <div class="profile__item">
                <a href="/auview?id=<?= $_SESSION['id'] ?? ''?>" class="profile__userName"><?= $_SESSION['userName'] ?? ''?></a>
                <p class="profile__online">online</p>
                <a href="auview?id=<?= $_SESSION['id'] ?? ''?>" class="profile__logout">Editar Perfil</a>
            </div>
        </div>
        <nav>
            <ul class="sidebar__menu">
                <li class="sidebar__menu__item"><a href="/" class="icon-home">Inicio</a></li>
                <li class="sidebar__menu__item">
                    <h4 class="icon-user-profile">Usuarios</h4>
                    <ul class="sidebar__subMenu">
                        <li class="sidebar__subMenu__item"><a class="sidebar__subMenu__link icon-user-add"href="/register">Añadir</a></li>
                        <li class="sidebar__subMenu__item"><a class="sidebar__subMenu__link icon-bubble"href="/message">Mensajes</a></li>
                        <li class="sidebar__subMenu__item"><a class="sidebar__subMenu__link icon-lock"href="/rol">Roles</a></li>
                        <li class="sidebar__subMenu__item"><a class="sidebar__subMenu__link icon-users"href="/adminusers">Administrar</a></li>
                    </ul>
                </li>
                <li class="sidebar__menu__item">
                    <h4 class="icon-params">Configuracion</h4>
                </li>
            </ul>
        </nav>
        
        <div class="onlineOfline">
        </div>
    </section>