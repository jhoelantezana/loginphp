<?php 
    $months = ['ene','feb','mar','abr','jun','jul','ago','sep','oct','nov','dic'];
    // --------------------------- control error register -----------------------------
?>

<div class="erroM">
    <p id="errorMessge" class='errrM__message'></p>
</div>
<section class="loginUser" id="loginUser">
    <div class="loginUser__login">
        <header class="loginUser__login__header">
            <h1 class="loginUser__login__title">Iniciar Session</h1>
            <img src="<?=PUBLIC_PATH?>/assets/img/profileicon.png" alt="" class="loginUser__login__profile">
        </header>
        <div class="loginUser__login__formContainer">
            
            <form action="/session/login" method="POST" id="formLogin">
                <div class="icon-user">
                    <input type="text" name="userName" placeholder="Nombre de usuario" id="usnLogin" required>
                </div>
                <div class="icon-key">
                    <input type="password" name="password" placeholder="Contraseña" id="passLogin" required>
                </div>
                <div class="loginRegisterOption">
                    <input type="submit" Value="Iniciar session" id="sendLogin">
                    <div id="closeLogin" class="closeWindow icon-close">Cancelar</div>
                </div>
            </form>
            <div class="loading" id="loading">
                
            </div>
        </div>
    </div>
</section>