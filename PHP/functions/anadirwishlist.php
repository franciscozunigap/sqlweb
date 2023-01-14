<?php


require('db.php');
session_start();
$id = $_SESSION['id'];  

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $pelicula = $_POST['peli'];
    $query = "SELECT id FROM movies WHERE titulo='$pelicula'";
    $result = mysqli_query($con,$query); 
    $followingdata = $result->fetch_assoc();
    $idpelicula = $followingdata['id'];

    $query = "INSERT into `wishlist` (id, userId, movId) VALUES  ('','$id','$idpelicula')";
    $result = mysqli_query($con,$query); 
    header("Location: /PHP/wishlist.php?id=$id");


}
?>