
<?php

require('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

	$username = $_POST["user"];
	$password = $_POST["pass"];


    $query = "SELECT userID, pass FROM `users` WHERE username='$username'";

    $result = mysqli_query($con,$query);

    if($result->num_rows > 0  ){


        $result = mysqli_fetch_array($result);  
        $id = $result[0];
        $pass = $result[1];

        if($pass==$password ){
           
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $id;


            echo "<script>
            window.location.href='/PHP/';
            </script>";

        }


        else{

            echo "  <h3>No existe ningun usuario con ese usuario y contraseña.</h3> ";
        
        }

    } 


    else { echo "  <h3>No existe ningun usuario con ese usuario y contraseña.</h3> ";}



}


else{

    echo "  <h3>Error1.</h3> ";

}

$con->close();

?>