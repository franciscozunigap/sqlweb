<?php 

    require "header.php"; 



    $query= "SELECT * FROM movies ORDER BY starsUSM DESC LIMIT 5";


    $result = mysqli_query($con,$query);


    echo "<h3>top 5 mejores pelıculas segun la calificacion de usmtomatoes</h3>";

    echo "<ul class ='lista'>";
    for ($i=0; $i < 5 ; $i++) { 

        $followingdata = $result->fetch_assoc();
        $titulo = $followingdata['titulo'];
        $id = $followingdata['id'];
        $img = $followingdata['img'];
        $starsUsm = $followingdata['starsUsm'];

        
        echo "

        <li>
            <h3><a href='movie.php?id=$id'>$titulo</a></h3> 
            <img src='$img' height='200' width='200'/>
            <h5> Calificacion: $starsUsm</h5> 
        </li>


        ";
        
    }

    echo "</ul>";


    echo "<br>";
    ###


    echo "<h3>top 5 peores pelıculas segun la calificacion de usmtomatoes</h3>";

    $query= "SELECT * FROM movies ORDER BY starsUSM ASC LIMIT 5";
    
    $result = mysqli_query($con,$query);    

    echo "<ul class ='lista'>";
    for ($i=0; $i < 5 ; $i++) { 

        $followingdata = $result->fetch_assoc();
        $titulo = $followingdata['titulo'];
        $id = $followingdata['id'];
        $img = $followingdata['img'];
        $starsUsm = $followingdata['starsUsm'];

        
        echo "

        <li>
            <h3><a href='movie.php?id=$id'>$titulo</a></h3> 
            <img src='$img' height='200' width='200'/>
            <h5> Calificacion: $starsUsm</h5> 
        </li>


        ";
        
    }

    echo "</ul>";


    echo "<br>";


    ###
    echo "<h3>top 5  pelıculas con mas reseñas</h3>";

    $query= "SELECT movid, COUNT( movid ) AS total FROM  reviews GROUP BY movid ORDER BY total DESC LIMIT 5 ;";
    $result = mysqli_query($con,$query);    

    echo "<ul class ='lista'>";
    for ($i=0; $i < $result->num_rows ; $i++) { 

        $followingdata = $result->fetch_assoc();
        $peliculaId = $followingdata['movid'];
        $cantResenas = $followingdata['total'];


        $queryab= "SELECT * FROM movies WHERE id=$peliculaId";
        $resultab = mysqli_query($con,$queryab);   
        $followingdataab = $resultab->fetch_assoc();

        $titulo = $followingdataab['titulo'];
        $img = $followingdataab['img'];


        
        echo "

        <li>
            <h3><a href='movie.php?id=$peliculaId'>$titulo</a></h3> 
            <img src='$img' height='200' width='200'/>
            <h5> Cantidad de reseñas: $cantResenas</h5> 
        </li>


        ";
        
    }

    echo "</div>";

    ####

    

?>




<style>

    .lista  {
        display: flex;
        margin-left: 20px;
        list-style: auto;
        margin-right: 20px;
        justify-content: space-between;
    }

</style>







