
<?php 

    require "header.php";  

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE){

        header("Location: profile.php");
    }

?>

<div class="login">
<h1>INICIAR SESION</h1>
<form action="functions/f_login.php" method="post">

    <div class = "username">

        <input type="text" name="user" required>
        <label>Nombre de usuario</label>

    <div class="contraseña">

        <input type="password"  name="pass" required>
        <label>Contraseña</label>

    </div>

    <input type="submit" value="Login">

    <a href="register.php">Registrarse </a>

    </div>
</form>
</div>
