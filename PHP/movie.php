<?php

require "header.php";

$idmov = $_GET['id'];


$query = "SELECT * FROM movies WHERE id='$idmov'";
$result = mysqli_query($con,$query);
$followingdata = $result->fetch_assoc();

$titulo = $followingdata['titulo'];
$img = $followingdata['img'];
$duracion = $followingdata['time'];
$precio = $followingdata['price'];
$genero = $followingdata['genre'];
$puntM = $followingdata['starsMed'];
$puntUSM = $followingdata['starsUsm'];
$disponibles = $followingdata['movDisp'];
$public = $followingdata['public'];
$actors = $followingdata['actors'];
$descripcion = $followingdata['description'];




echo "<h1>$titulo</h1>";
echo "<br>";
echo "<img src='$img' height='200' width='200'/>";
echo "<br>";
echo "<h5>$descripcion</h5>" ;
echo "<br>";
echo "Actores: $actors";
echo "<br>";
echo "Duracion: $duracion";
echo "<br>";
echo "Precio: $precio";
echo "<br>";
echo "Genero: $genero" ;
echo "<br>";
echo "Puntuacion Media: $puntM";
echo "<br>";
echo "Puntuacion USM: $puntUSM";
echo "<br>";
echo "Disponibles: $disponibles" ;
echo "<br>";
echo "Publico: $public " ;
echo "<br>";

$query = "SELECT SUM(cant) total FROM movhistorial WHERE movid=$idmov";
$result = mysqli_query($con,$query);
$result = mysqli_fetch_array($result)[0];
if ($result != NULL) {
    echo "Cantidad historica de veces rentadas: $result";
}
else {
    echo "Cantidad historica de veces rentadas: $result";
}





if ($username != NULL) {

    $query = "SELECT * FROM relpeliculas WHERE userid='$id' AND movid='$idmov'";
    $result = mysqli_query($con,$query);
    if ($result-> num_rows > 0) {

            echo "
        <form action='/PHP/functions/devolverpelicula.php?id=$idmov' method='post'>
        <button type='submit' class='btn btn-primary' >Devolver</button>
        </form>";

    }

    else {

        if ($disponibles > 0) {

            echo "
            <form action='/PHP/functions/rentarpelicula.php?id=$idmov' method='post'>
            <button type='submit' class='btn btn-primary' >Rentar</button>
            </form>";

            
            }


        }
}

echo "<h2>RESEÑAS</h2>";

$query = "SELECT * FROM reviews WHERE movid='$idmov'";
$result = mysqli_query($con,$query);


for ($i=0; $i<$result->num_rows;$i++){
    $followingdata = $result->fetch_assoc();
    $fecha = $followingdata['fecha'];
    $descripcionresena = $followingdata['description'];
    $idescritor = $followingdata['userId'];
    $estrellas = $followingdata['punt'];

    $querya = "SELECT username FROM users WHERE userid='$idescritor'";
    $resulta = mysqli_query($con,$querya);
    $usernameEscritor =  mysqli_fetch_array($resulta) [0];
    
    echo "Username: $usernameEscritor , Estrellas: $estrellas, Reseña: $descripcionresena, Fecha: $fecha";
    echo "<br>" ;



}


if ($username != NULL) {
$query = "SELECT * FROM movhistorial WHERE userid='$id' AND movid='$idmov'";
$result = mysqli_query($con,$query);

if ($result->num_rows > 0) {

    
echo "<h2>ESCRIBE UNA RESEÑA</h2>";

    echo "
    
    
    <form method = 'post' action= '/PHP/functions/resena.php?id=$idmov'>
    <label for='estrellas'>Estrellas</label>
        <select class='form-control' id='estrellas' name='estrellas'>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
    <label for='resena'>Reseña</label>
        <textarea class='form-control' id='resena' rows='3' name='resena'></textarea>
    <button type='submit' class='btn btn-primary'>Enviar reseña</button>
</form> 
    
    ";



}


    
}
?>
