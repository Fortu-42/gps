<?php

// if update button was submitted
if( isset($_POST['update']) ) {
    
    // set variables
    $cantPuestos     =   $_POST["cantPuestos"] ;
    $ipDispGPS       =   $_POST["ipDispGPS"] ;
    $uid             =   $_POST["uid"];
    
    // new database query & result
    $query = "UPDATE unidades
            SET cantPuestos='$cantPuestos',
            ipDispGPS ='$ipDispGPS',
            WHERE id= $uid ";
    
    $result = mysqli_query( $conn, $query );
    
    if( $result ) {
        
        // redirect to client page with query string
        header("Location: unidades.php?alert=updatesuccess");
    } else {
        echo "Error updating record: " . mysqli_error($conn); 
    }
}



// close the mysql connection
mysqli_close($conn);


?>


<?include ('includes/footer.php');
?>      