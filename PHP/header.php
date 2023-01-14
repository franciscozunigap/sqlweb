<?php

require "functions/db.php";



session_start();



if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == TRUE) {

    $username = $_SESSION['username'];
    $id = $_SESSION['id'];  
    $query = "SELECT saldo FROM users WHERE userid='$id'";
    $result = mysqli_query($con,$query);
    $followingdata = $result->fetch_assoc();
    $saldo = $followingdata['saldo'];


}



else {
    $username = NULL;
}

?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
    <a class="navbar-brand" href="index.php">
        <img src="../IMG/logo.png"  class="logo" >
    </a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="index.php">Inicio</a>
      </li>


      



        <?php 
        
        if ($username != NULL )
        
        {
            echo "      <li class='nav-item dropdown'>

            <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              $username
            </a>
            <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
              <a class='dropdown-item' href='profile.php?id=$id'>Mi perfil</a>
              <a class='dropdown-item' href='/PHP/wishlist.php?id=$id'>Mi wishlist</a>
              <div class='dropdown-divider'></div>
              <a class='dropdown-item' href='logout.php'>Logout</a>
            </div>  
    
          </li>'
          
          <li class='nav-item'>
          <a class='nav-link' href='#'>Saldo: $saldo $</a>
         </li>
          
          ";
        
        }

        else {
            
            echo "<li class='nav-item'><a class='nav-link' href='login.php'> Login </a></li>";
        }

        ?>



    </ul>

    


    <form class="form-inline my-2 my-lg-0" action="/PHP/busqueda.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar usuario o pelicula" aria-label="Search" name="busqueda">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Buscar</button>
    </form>


  </div>
</nav>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<style>

    .logo {
        width: 200px;
        height: 100px;
        rotate: 8deg;
    }

</style>