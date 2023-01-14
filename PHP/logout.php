
<?php

session_start();

if ($_SESSION['loggedin'] == TRUE){

    session_destroy();
    header("Location: /PHP/login.php");
}

else{

    header("Location: /PHP/login.php");

}

?>