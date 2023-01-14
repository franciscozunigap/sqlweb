<?php 

    require "header.php"; 
    $busqueda = $_GET['busqueda'];



    $query = "SELECT * FROM movies WHERE titulo LIKE '%$busqueda%'";
    $result = mysqli_query($con,$query);

    echo "<h2>PELICULAS</h2>";

    if ($result -> num_rows > 0) {

        for ($i=0; $i < $result -> num_rows ; $i++ ) {
            $followingdata = $result->fetch_assoc();
            $img = $followingdata['img'];
            $id = $followingdata['id'];
            $titulo = $followingdata['titulo'];
            echo "<a  href='/PHP/movie.php?id=$id'>$titulo</a>"; 
            echo "<img src='$img' height='200' width='200'/>";
            echo "<br>";
        }

    }

    else {
        echo "No se encontraron peliculas para '$busqueda'.";
    }

    $query = "SELECT * FROM users WHERE userName LIKE '%$busqueda%'";
    $result = mysqli_query($con,$query);

    echo "<h2>Usuarios</h2>";
    
    if ($result -> num_rows > 0) {

        for ($i=0; $i < $result -> num_rows ; $i++ ) {
            $followingdata = $result->fetch_assoc();
            $username = $followingdata['userName'];
            $id = $followingdata['userID'];
            echo "<a  href='/PHP/profile.php?id=$id'>$username</a>"; 
            echo "<br>";
        }

    }

    else {
        echo "No se encontraron peliculas para '$busqueda'.";
    }





?>

