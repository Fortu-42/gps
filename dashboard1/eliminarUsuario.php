<?php

 include('includes/header.php');

include('includes/connection.php');

 

if( isset($_POST['confirm-delete']) ) {
    
    $uid = $_POST['uid'];
    // new database query & result
    $query = "DELETE FROM usuario WHERE id='$uid'";
    $result = mysqli_query( $conn, $query );
    
    if( $result ) {
        
        // redirect to client page with query string
         
    $success = "<div class='alert alert-success' style='text-align: center;
        padding: 50px;
        width: 100%;
        border-radius: 0;
         font-weight: bold;
        font-size: 2em;margin-top:25vh;'>
    <p>Usuario borrado!</p><a href='usuarios.php' class='btn btn-primary'>Ir a Usuarios <i class='fa fa-user'></i></a>
                    </div>";

echo $success;


    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
}

// if confirm delete button was submitted

header( "refresh:2;url=usuarios.php" );
// close the mysql connection
mysqli_close($conn);
?>




<?php
include('includes/footer.php');
?>

