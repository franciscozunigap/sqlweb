<?php

require('db.php');
session_start();
$id = $_SESSION['id'];  


$query = "DELETE FROM users WHERE userID='$id'";
$result = mysqli_query($con,$query);
session_destroy();

echo "<script>
window.location.href='/PHP'; 
</script>"; 
?>