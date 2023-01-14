<?php

require('db.php');
session_start();
$id = $_SESSION['id'];  

if ($_SERVER["REQUEST_METHOD"] == "POST"){

$usernameN = $_POST["username"];

if ($usernameN = NULL) {
    $usernameN = $_SESSION['username'] ;
}


$descripcionN = $_POST["descripcion"];

$_SESSION['username'] = $usernameN;

$query = "UPDATE users SET userName='$usernameN', descripcion='$descripcionN' WHERE userID='$id'";
$result = mysqli_query($con,$query);
echo "listo";

}

echo "<script>
window.location.href='/PHP/profile.php?id=$id'; 
</script>";


?>