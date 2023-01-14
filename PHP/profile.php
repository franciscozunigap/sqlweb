<?php


require "header.php";


if ( !isset($_SESSION['loggedin'])){
   
    header("Location: /PHP/login.php");

}

$id_url = $_GET['id'];

$query = "SELECT * FROM users WHERE userID=$id_url";
$result = mysqli_query($con,$query);

if($result->num_rows > 0  ){


    $result = mysqli_fetch_array($result); 

    
    $username = $result[1];
    $cantFollows = $result[4];
    $cantFollowers = $result[5];
    $description = $result[6];



}

else {

    echo "No existe este usuario";  
    exit;

}

$query = "SELECT SUM(cant) total FROM movhistorial WHERE userid=$id_url;";
$result = mysqli_query($con,$query);
$result = mysqli_fetch_array($result)[0]; 




echo  "<h3>Nombre de usuario: $username </h3>";
echo  "<h3><a href='#' data-target='#exampleModal' data-toggle='modal' >Seguidos: $cantFollows</a> </h3>";
echo  "<h3><a href='#' data-target='#modalfollows' data-toggle='modal' >Seguidores: $cantFollowers</a> </h3>";
echo  "<h5>Descripcion: $description </h5>";
if ($result != NULL){
echo  "<h5>Cantidad de peliculas rentadas : $result </h5>";}
else {
  echo  "<h5>Cantidad de peliculas rentadas : 0 </h5>";
}
echo  "<a href='/PHP/wishlist.php?id=$id_url'>Ver wishlist</a>";
echo  "<br>";
echo  "<a href='#' data-target='#resenas' data-toggle='modal' >Ver Reseñas</a>";
echo  "<br>";



if ($id_url != $id){

    
    $query = "SELECT * FROM reluser WHERE userID=$id_url AND followerid=$id" ;
    $result = mysqli_query($con,$query);

    if($result->num_rows > 0  ){

        echo "
        <form action='/PHP/profile.php?id=$id_url' method='post'>
        <button type='submit' class='btn btn-primary' >Dejar de seguir</button>
        </form>"
        ;

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $query = "DELETE FROM reluser WHERE userId=$id_url AND followerId=$id";
            $result = mysqli_query($con,$query);  
            $query = "UPDATE users SET cantFollows = ( SELECT cantFollows FROM users WHERE userID = $id ) -1 WHERE userID = $id";
            $result = mysqli_query($con,$query);
            $query = "UPDATE users SET cantFollowers = ( SELECT cantFollowers FROM users WHERE userID = $id_url ) - 1 WHERE userID = $id_url";
            $result = mysqli_query($con,$query);
            header("Location: /php/profile.php?id=$id_url");

        }


    }

    else {
        echo "
        <form action='/PHP/profile.php?id=$id_url' method='post'>
        <button type='submit' class='btn btn-primary' >Seguir</button>
        </form>";

        if($_SERVER['REQUEST_METHOD'] == "POST"   )  {
            $query = "INSERT INTO `reluser` (`id`, `userId`, `followerId`) VALUES (NULL, '$id_url', '$id')";
            $result = mysqli_query($con,$query);  
            $query = "UPDATE users SET cantFollows = ( SELECT cantFollows FROM users WHERE userID = $id ) + 1 WHERE userID = $id";
            $result = mysqli_query($con,$query); 
            $query = "UPDATE users SET cantFollowers = ( SELECT cantFollowers FROM users WHERE userID = $id_url ) + 1 WHERE userID = $id_url";
            $result = mysqli_query($con,$query);
            header("Location: /php/profile.php?id=$id_url");
        }

    }


}

else {

    
echo  "<a href='functions/eliminarcuenta.php'>Eliminar cuenta</a>";
echo  "<br>";
echo  "<a href='#' data-target='#editarperfil' data-toggle='modal' >Editar Perfil</a> ";
}




?>


<!-- Modal  SEGUIDOS-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Seguidos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php

        $query = "SELECT userName, userID from users WHERE userID IN (SELECT userid FROM reluser WHERE followerId=$id_url);";
        $result = mysqli_query($con,$query);

        for ($i=0; $i < $result -> num_rows ; $i++) {
            $followingdata = $result->fetch_assoc();
            $username = $followingdata['userName'];
            $userid = $followingdata['userID'];
            echo "<a href='profile.php?id=$userid'> $username<a>";
            echo "<br>";
        }

        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal  SEGUDIORES-->
<div class="modal fade" id="modalfollows" tabindex="-1" role="dialog" aria-labelledby="modalfollowsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalfollowsLabel">Seguidores</h5>
        <button type="button" class="close" data-dismiss="modalfollows" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php

        $query = "SELECT userName, userID from users WHERE userID IN (SELECT followerId FROM reluser WHERE userId=$id_url)";
        $result = mysqli_query($con,$query);

        for ($i=0; $i < $result -> num_rows ; $i++) {
            $followingdata = $result->fetch_assoc();
            $username = $followingdata['userName'];
            $userid = $followingdata['userID'];
            echo "<a href='profile.php?id=$userid'> $username<a>";
            echo "<br>";
        }

        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal  Resenas-->
<div class="modal fade" id="resenas" tabindex="-1" role="dialog" aria-labelledby="modalfollowsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalfollowsLabel">Resenas</h5>
        <button type="button" class="close" data-dismiss="modalfollows" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php

        $query = "SELECT * from reviews WHERE userID = $id_url ORDER BY fecha DESC;";
        $result = mysqli_query($con,$query);

        for ($i=0; $i < $result -> num_rows ; $i++) {

            $followingdata = $result->fetch_assoc();
            $estrellas = $followingdata['punt'];
            $resena = $followingdata['description'];
            $idpelicula = $followingdata['movId'];
            $fecha = $followingdata['fecha'];

            echo "Estrellas: $estrellas, Reseña: $resena, Fecha: $fecha ,<a href='/PHP/movie.php?id=$idpelicula'>Ir a la pelicula</a> <br>";
            


        }

        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal  Editar Perfil-->
<div class="modal fade" id="editarperfil" tabindex="-1" role="dialog" aria-labelledby="modalfollowsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalfollowsLabel">Editar Perfil</h5>
        <button type="button" class="close" data-dismiss="modalfollows" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method = "post" action= "functions/actualizarperfil.php">
            <label for="formGroupExampleInput2">Nombre de Usuario</label>
            <input class="form-control" type="text"  name = "username" placeholder="<?php echo $username?>">
            <label for="formGroupExampleInput2">Descipcion</label>
            <input class="form-control" type="text"   name = "descripcion" placeholder="<?php echo $description?>">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
      </div>   
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
