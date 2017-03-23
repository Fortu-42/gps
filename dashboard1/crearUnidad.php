<?
// connect to database
include('includes/connection.php');

// if add button was submitted
if( isset( $_POST['create'] ) ) {
    
    // set all variables to empty by default
    $cantPuestos = $ipDispGPS = $identificacion = "";
    
    // check to see if inputs are empty
    // create variables with form data
    // wrap the data with our function
    
    if( !$_POST["cantPuestos"] ) {
        $puestosError = "Ingrese una cantidad de puestos <br>";
    } else {
        $cantPuestos =  $_POST["cantPuestos"] ;
    }

    if( !$_POST["ipDispGPS"] ) {
        $GPSerror = "Ingrese la cantidad de puestos de la unidad <br>";
    } else {
        $ipDispGPS = $_POST["ipDispGPS"] ;
    }
    
    // these inputs are not required
    // so we'll just store whatever has been entered
    $identificacion    = $_POST["identificacion"];
    
    // if required fields have data
    if( $cantPuestos && $ipDispGPS ) {
        
        // create query
        $query = "INSERT INTO unidades (idUnidad, cantPuestos, ipDispGPS, identificacion) VALUES (NULL, '$cantPuestos', '$ipDispGPS', '$identificacion')";
        
        $result = mysqli_query( $conn, $query );
        
        // if query was successful
        if( $result ) {
            
            // refresh page with query string
            header( "Location: unidades.php?alert=success" );
        } else {
            
            // something went wrong
            echo "Error: ". $query ."<br>" . mysqli_error($conn);
        }
        
    }
    
}

// close the mysql connection
mysqli_close($conn); ?>