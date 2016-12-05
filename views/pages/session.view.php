<?php require_once APP_PATH . '/views/layaut/public/header.view.php'?>
    <main class="main">
        <div class="contentFluit">
            <div class="sessionLR">
                <div class="efectCube">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <a href="#" class="sessionLR__login" id="showLogin">Iniciar Session</a>
                <a href="#" class="sessionLR__register" id="showRegister">Registrarse</a>
            </div>
            <?php require_once APP_PATH . '/views/blocks/session/login.view.php'?>
            <?php require_once APP_PATH . '/views/blocks/session/register.view.php'?>
        </div>
    </main>
<?php require_once APP_PATH . '/views/layaut/public/footer.view.php'?>