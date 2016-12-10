<?php include_once APP_PATH . '/views/layaut/head.view.php'?>
    <header class="header">
        <div class="contentFluit">
            <nav class="primaryMenu__nav">
                <ul class="primaryMenu">
                    <li class="primaryMenu__item">
                        <a href="/" class="primaryMenu__link">Inicio</a>
                    </li>
                    <li class="primaryMenu__item">
                        <form action="/blog/search" class="primaryMenu__form icon-search">
                            <input type="text" name="search" placeholder="Buscar en blog">
                            <input type="submit" value="buscar">
                        </form>
                    </li>
                    <li class="primaryMenu__item"><a href="/logout" class="primaryMenu__link">Cerrar Session</a></li>
                </ul>
            </nav>
        </div>
    </header>
    

    <div class="modal" id="vmpaddPost">
        <?php require_once APP_PATH . '/views/blog/addpost.view.php'?>
    </div>