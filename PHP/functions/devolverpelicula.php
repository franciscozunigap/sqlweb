<?php

require('db.php');
session_start();
$id = $_SESSION['id']; 
$idmov = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == "POST"   )  {
    $query = "DELETE FROM relpeliculas WHERE userId=$id and movId =$idmov;";
    $result = mysqli_query($con,$query);  
    $query = "UPDATE movies SET movDisp = ( SELECT movDisp FROM movies WHERE id = $idmov ) + 1 WHERE id = $idmov";
    $result = mysqli_query($con,$query);
    header("Location: /PHP/movie.php?id=$idmov");

}

?>