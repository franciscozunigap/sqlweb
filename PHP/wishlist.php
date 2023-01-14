
<?php 

require "header.php";  

$idurl = $_GET['id'];


if ($id == $idurl){
echo "<a href='#' data-target='#exampleModal' data-toggle='modal' >Añadir peliculas </a>"; }

$query = "SELECT movId from wishlist WHERE userid= '$id' ";
$result = mysqli_query($con,$query);  

echo "<h5> WISHLIST</h5>";
for ($i=0 ; $i < $result->num_rows ; $i++) {

    $followingdata = $result->fetch_assoc();
    $idmov = $followingdata['movId'];

    $queryaa = "SELECT titulo from movies WHERE id = '$idmov' ";
    $resultaa = mysqli_query($con,$queryaa);  
    $followingdata = $resultaa->fetch_assoc();
    $titulo = $followingdata['titulo'];

    echo "<br> <a href='/PHP/movie.php?id=$idmov'>$titulo</a> , <a href='/PHP/functions/eliminarwishlist.php?id=$idmov'>Eliminar</a>";


}




?>



<!-- Modal  añadir  -->

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

        $query = "SELECT id, titulo from movies";
        $result = mysqli_query($con,$query); 

        
        echo "    <form method = 'post' action= '/PHP/functions/anadirwishlist.php'>
                    <label for='peli'>Peliculas</label>
                        <select class='form-control' id='peli' name='peli'>
                        ";for ($i=0 ; $i < $result->num_rows ; $i++) {
                            $followingdata = $result->fetch_assoc();
                            $titulo = $followingdata ['titulo'];
                            echo "<option>$titulo</option>";
                        }
                        echo"
                        </select>
                        <button type='submit' class='btn btn-primary'>Añadir pelicula</button>
                    </form> ";



        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


