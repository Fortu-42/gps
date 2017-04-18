<?php

include ('includes/connection.php');

$isAvailable = true;

$formUsername = $_POST['username'];

$formEmail = $_POST['email'];


      $query = "SELECT nombre FROM usuario WHERE nombreUsuario='$formUsername' OR correo ='$formEmail'";

      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0){

    
        $isAvailable = false;
      
        }
      


echo json_encode(array('valid' => $isAvailable));
?>