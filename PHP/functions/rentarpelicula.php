<?php

require('db.php');
session_start();
$id = $_SESSION['id'];  
$idmov = $_GET['id'];



if($_SERVER['REQUEST_METHOD'] == "POST"   )  {
    $query = "INSERT INTO `relpeliculas` (`id`,`userid`, `movid`) VALUES ('','$id', '$idmov')";
    $result = mysqli_query($con,$query);  
    $query = "UPDATE users SET saldo = ( SELECT saldo FROM users WHERE userID = $id ) - 1 WHERE userID = $id";
    $result = mysqli_query($con,$query);  
    $query = "UPDATE movies SET movDisp = ( SELECT movDisp FROM movies WHERE id = $idmov ) - 1 WHERE id = $idmov";
    $result = mysqli_query($con,$query);  


    $query = "SELECT * FROM movhistorial WHERE userid='$id' AND movid='$idmov'";
    $result = mysqli_query($con,$query);
    

    if ($result->num_rows > 0){
        
        $query = "UPDATE movhistorial SET cant = ( SELECT cant FROM movhistorial WHERE userid = $id AND movid=$idmov ) + 1 WHERE userid = $id AND movid=$idmov";
        $result = mysqli_query($con,$query);
    }


    else {
        
        $query = "INSERT into `movhistorial` (id, cant, userid, movid) VALUES ('', '1', '$id' , '$idmov')";
        $result = mysqli_query($con,$query);

    }

    header("Location: /PHP/movie.php?id=$idmov");



}  

    ?>