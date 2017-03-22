<?php

 include('includes/header.php');

include('includes/connection.php');

 

if( isset($_POST['confirm-delete']) ) {
    
    $uid = $_POST['uid'];
    // new database query & result
    $query = "DELETE FROM unidades WHERE id='$uid'";
    $result = mysqli_query( $conn, $query );
    
    if( $result ) {
        
        // redirect to client page with query string
         
  
        header( "Location: unidades.php" );

    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
}

// if confirm delete button was submitted


// close the mysql connection
mysqli_close($conn);
?>




<?php
include('includes/footer.php');
?>

