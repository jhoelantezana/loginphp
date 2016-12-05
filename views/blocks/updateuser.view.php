<div class="updateUser">
    <form action="/adduser" method="POST" enctype="multipart/form-data">
        <div class="register__fields">
            <p>Datos Personales</p>
            <input type="text" name="userName" placeholder="Nombre de usuario" value="<?=$user['userName']?>" required>
            <input type="text" name="firtsName" placeholder="Nombres" value="<?=$user['firtsName']?>" required>
            <input type="text" name="lastName" placeholder="Apellidos" value="<?=$user['lastName']?>">
            <!-- =========================== date ===============================-->
            <p>Fecha de nacimiento</p>
            <select name="day" id="day" required>
                <option value="0" selected="1">Dia</option>
                <?php for($i = 1; $i < 32; $i++):?>
                    <option value="<?=$i?>"><?=$i?></option>
                <?php endfor;?>
            </select>

            <select name="byrthday" id="byrthday" required>
                <option value="0" selected="1">Mes</option>
                <?php for ($i=0; $i < count($months); $i++):?>
                    <option value="<?=$i?>"><?=$months[$i]?></option>
                <?php endfor;?>
            </select>

            <select name="year" id="year" required>
                <option value="0" selected="1">Año</option>
                <?php for($i = 1905; $i < 2016; $i++):?>
                    <option value="<?=$i?>"><?=$i?></option>
                <?php endfor;?>
            </select>

            <p>Email</p>
            <input type="email" name="email" placeholder="Email" value="<?=$user['email']?>" required>

            <p>Cambiar Contraseña</p>
            <input type="password" name="password" placeholder="Contraseña Actual">
            <input type="password" name="password" placeholder="Nueva Contraseña">
            <input type="password" name="confirmPassword" placeholder="Confirmar Nueva Contraseña">

            <!-- =========================== Sex ===============================-->
            <p>Sexo</p>
            <div class="sex">
                <div class="sex__f">
                    <input type="radio" id="female" name="sex" value="0">
                    <label for="female">Mujer</label>
                </div>
                <div class="sex__m">
                    <input type="radio" id="male" name="sex" value="1">
                    <label for="male">Hombre</label>
                </div>
            </div>
            <!-- =========================== profile ===============================-->
            <p>Foto de perfil</p>
            <div class="profileSubmit">
                <input type="file" name="imgProfile" size="20">
            </div>

        </div>
        <input type="submit" value="Guardar cambios">
    </form>
</div>