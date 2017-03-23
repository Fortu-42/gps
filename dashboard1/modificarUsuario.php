
<?php 
include('includes/connection.php');
 $uid = $_GET['uid'];

// query the database with client ID
$query = "SELECT * FROM usuario WHERE id=$uid";
$result = mysqli_query( $conn, $query );

// if result is returned
if( mysqli_num_rows($result) > 0 ) {
    
    // we have data!
    // set some variables
     $row = mysqli_fetch_assoc($result);


        $nombre     = $row['nombre'];
        $usuario    = $row['nombreUsuario'];
        $correo    = $row['correo'];







} else { // no results returned
    $alertMessage = "<div class='alert alert-warning'>Nothing to see here. <a href='clients.php'>Head back</a>.</div>";
}







// if update button was submitted
if( isset($_POST['update']) ) {
    
    // set variables
    $nombre     =  $_POST["nombre"] ;
    $usuario    = $_POST["usuario"] ;
    $correo    =  $_POST["correo"] ;
    $uid =    $_POST["uid"];
    
    // new database query & result
    $query = "UPDATE usuario
            SET nombre='$nombre',
            nombreUsuario ='$usuario',
            correo='$correo'
            WHERE id= $uid ";
    
    $result = mysqli_query( $conn, $query );
    
    if( $result ) {
        
        // redirect to client page with query string
        header("Location: usuarios.php?alert=updatesuccess");
    } else {
        echo "Error updating record: " . mysqli_error($conn); 
    }
}



// close the mysql connection
mysqli_close($conn);


?>


<?include ('includes/footer.php');
?>