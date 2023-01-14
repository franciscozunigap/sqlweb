
<?php 

    require "header.php";  

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {

        header("Location: profile.php");
    }


?>

<div class="signin">
    <h1>Registrarse</h1>
    <form action="functions/f_register.php" method="post">

        <div class = "username">

            <input type="text" name="user" required>
            <label>Nombre de usuario</label>

        <div class="contraseña">

            <input type="password"  name="pass" required>
            <label>Contraseña</label>

        </div>

        <input type="submit" value="Register">
        <a href="login.php">Iniciar sesion </a>
        </div>
    </form>
</div>



