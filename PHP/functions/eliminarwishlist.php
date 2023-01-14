<?php


require('db.php');
session_start();
$id = $_SESSION['id'];  

$idmov = $_GET['id'];

$query = "DELETE FROM wishlist WHERE movId='$idmov'";
$result = mysqli_query($con,$query);

header("Location: /PHP/wishlist.php?id=$id");


?>