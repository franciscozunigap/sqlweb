<?php


require('db.php');
session_start();
$id = $_SESSION['id'];  
$idmov = $_GET['id'];

$fecha = date("Y-m-d H:i:s");

if($_SERVER['REQUEST_METHOD'] == "POST"   )  {
    $estrellas = $_POST['estrellas'];
    $resena = $_POST['resena'];

    $query = "INSERT into `reviews` (id ,userID, movId, description, punt, fecha) VALUES 
    ('', '$id', '$idmov', '$resena','$estrellas','$fecha')";

    $result = mysqli_query($con,$query);  

    header("Location: /PHP/movie.php?id=$idmov");

}



?>