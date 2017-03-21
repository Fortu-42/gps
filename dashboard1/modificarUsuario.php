<?php include('includes/functions.php');
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




        ?> 
         <? include('includes/header.php');?>
<header>
<nav class="navbar navbar-default navbar-fixed-top">

  <div class="container-fluid">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">

      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="#"><i class="fa fa-bus fa-2" aria-hidden="true"></i> TecnoBus GPS</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


    
      <ul class="nav navbar-nav navbar-right">

        <li><a href="#"><i class="fa fa-binoculars" aria-hidden="true"></i>Encontrar Parada</a></li>
        <li><a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i> Planear Viaje</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i>Menú<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Gestionar Usuario</a></li>
            <li><a href="#"><i class="fa fa-bus" aria-hidden="true"></i> Gestionar unidades </a></li>
            <li><a href="#"><i class="fa fa-street-view" aria-hidden="true"></i> Gestionar Paradas </a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesión </a></li>
          </ul>
        </li>
        
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->

</nav>
</header>

        <section class="container" id="login-features" style="margin-top:100px">

    <div class="row">


      <div class="col-md-6 col-xs-12 main-title">

          <div class="row">
            <div class="col-md-2 col-sm-12  col-xs-12 icon">
            </div>
            <div class="col-md-10 col-sm-12 col-xs-12 clearfix">
                <h3 class="title-landing">Nombre Completo</h3>
                <p class="main-lead">Nombre y apellido completo</p>
            </div>
          </div>
              

          <div class="row">
            <div class="col-sm-2 icon">
            </div>
            <div class="col-sm-10 clearfix">
              <h3 class="title-landing">Nombre de Usuario</h3>
              <p class="main-lead">Nombre de Usuario necesario para el inicio de sesón en el sistema</p>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-2 icon">
            </div>
            <div class="col-sm-10 clearfix">
              <h3 class="title-landing">Correo</h3>
              <p class="main-lead">Tu mejor dirección de correo electrónico</p>
            </div>
          </div>


      </div>


      <div class="col-md-6 col-xs-12" style="margin-top:100px;">

        <div class="form-box">

    
          <div class="form-bottom">

            <form id="contactForm" method="post" class="form-horizontal" role="form" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>">

                <div class="form-group">
                  <div class="col-xs-12">
                    <input type="text" class="form-control" name="nombre"  placeholder="Nombre y Apellido" value="<?=$nombre;?>"/>
                     <input type="hidden" class="form-control" name="update" value="true"/>
                     <input type="hidden" class="form-control" name="uid" value="<?=$uid; ?>"/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                      <input type="text" class="form-control" name="nombreUsuario"  placeholder="Nombre de Usuario" value="<?=$usuario?>"/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <input type="text" class="form-control" name="correo"  placeholder="E-mail" value="<?=$correo;?>"/>
                  </div>
                </div>


                <div class="form-group">
                  <div class="col-xs-12">
                    <div class="errorM" id="messages"></div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-default" name="update">Modificar</button>
                  </div>
                </div>

            </form>

              
        </div>
          
      </div>

    </div>

</section>

        
        
        
        <?



} else { // no results returned
    $alertMessage = "<div class='alert alert-warning'>Nothing to see here. <a href='clients.php'>Head back</a>.</div>";
}

// if update button was submitted
if( isset($_POST['update']) ) {
    
    // set variables
    $nombre     =  $_POST["nombre"] ;
    $usuario    = $_POST["nombreUsuario"] ;
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