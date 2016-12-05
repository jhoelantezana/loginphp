<?php 
    $months = ['ene','feb','mar','abr','jun','jul','ago','sep','oct','nov','dic'];
    if(isset($_GET['wr'])){
        if($_GET['wr'] == 100){
            $errorR = [
                'message'   => 'El usuario que ha ingresado ya existe',
                'class'     => ''
            ];
        }elseif($_GET['wr'] == 101){
            $errorR = [
                'message'   => 'El archivo que ha subido no es soportado intentelo nuevamente',
                'class'     => ''
            ];
        }elseif($_GET['wr'] == 102){
            $errorR = [
                'message'   => 'Ingrese Una fecha Correcta',
                'class'     => ''
            ];
        }elseif($_GET['wr'] == 103){
            $errorR = [
                'message'   => 'Solo se puesden subir archivos menores a 1MB',
                'class'     => ''
            ];
        }elseif($_GET['wr'] == 104){
            $errorR = [
                'message'   => 'Las contraseñas no coniciden',
                'class'     => ''
            ];
        }
    }
?>
<div class="errorM">
    <p id="errorMessage" class='errorM__message'>
        <?=$errorR['message'] ?? ''?>
    </p>
</div>
    <section class="registerUser" id="registerUser">
        <div class="registerUser__register">
            <header class="registerUser__register__header">
                <h2 class="registerUser__register__title">Registrarse</h2>
            </header>
            <div class="registerUser__register__formContainer">
                <form action="/session/register" method="POST" enctype="multipart/form-data">
                    <div class="register__fields">
                        <div class="register__fields__item">
                            <input type="text" name="userName" placeholder="Nombre de usuario" value="<?=$_GET['uN'] ?? ''?>" required>
                            <input type="email" name="email" placeholder="Email" value="<?=$_GET['e'] ?? '' ?>" required>
                            <input type="text" name="fullName" placeholder="Nombre completo" value="<?=$_GET['fn'] ?? '' ?>" required>
                        <!-- =========================== Password ===============================-->
                            <input type="password" name="password" placeholder="Contraseña" required>
                            <input type="password" name="confirmPassword" placeholder="Confirmar Contraseña" required>
                        </div>
                        <!-- =========================== Sex ===============================-->
                        <div class="sex">
                            <div class="sex__f">
                                <input type="radio" id="female" name="sex" value="0" required>
                                <label for="female">Mujer</label>
                            </div>
                            <div class="sex__m">
                                <input type="radio" id="male" name="sex" value="1" required>
                                <label for="male">Hombre</label>
                            </div>
                        </div>
                        <!-- =========================== date ===============================-->
                        <p class="register__fields__txt">Fecha de nacimiento</p>
                        <div class="register__fields__date">
                            <select name="day" id="day" required>
                                <option value="0" selected="1">Dia</option>
                                <?php for($i = 1; $i < 32; $i++):?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                <?php endfor;?>
                            </select>

                            <select name="month" id="months" required>
                                <option value="0" selected="1">Mes</option>
                                <?php for ($i=0; $i < count($months); $i++):?>
                                    <option value="<?=$i + 1?>"><?=$months[$i]?></option>
                                <?php endfor;?>
                            </select>

                            <select name="year" id="year" required>
                                <option value="0" selected="1">Año</option>
                                <?php for($i = 1905; $i <= 2016; $i++):?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                <?php endfor;?>
                            </select>
                        </div>
                        <!-- =========================== profile ===============================-->
                        <p>Foto de perfil</p>
                        <div class="profileSubmit">
                            <input type="file" name="imgProfile" size="20">
                        </div>
                    </div>
                    <div class="loginRegisterOption">
                        <input type="submit" value="Restrarse" id="sendRegister">
                        <div class="closeWindow icon-close" id="closeRegister">Cerrar</div>
                    </div>
                </form>
            </div>
        </div>
    <section class="loginUser">
