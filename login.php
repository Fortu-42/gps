<?php
session_start();




    if (isset($_GET['alert']) ) {
      if( $_GET['alert'] == 'success' ) {
      $alertMessage = "<div class='alert alert-success'>Nueva Cuenta Creada <a class='close' data-dismiss='alert'>&times;</a></div>";
      }
    }


  include('includes/functions.php');

  if(isset($_POST['login'] ) ){

      $formUsername = validateFormData($_POST['form-user']);
      $formPass = validateFormData($_POST['form-password']);

      include ('includes/connection.php');

      $query = "SELECT nombre, contrasena, id FROM usuario WHERE nombreUsuario='$formUsername'";

      $result = mysqli_query($conn, $query);

      if(mysqli_num_rows($result) > 0){

        while($row = mysqli_fetch_assoc($result)){
          $username   = $row['nombre'];
          $hashedPass = $row['contrasena'];
        }

        if( password_verify( $formPass, $hashedPass ) ) {

            // correct login details!
            // store data in SESSION variables
            $_SESSION['loggedInUser'] = $username;
            $_SESSION['userId'] = $id;

            // redirect user to clients page
            header( "Location: dashboard1/index.php" );
        } else { // hashed password didn't verify

            // error message
            $loginError = "<div class='alert alert-danger'>Wrong username / password combination. Try again.</div>";
        }
      }else { // there are no results in database

          // error message
          $loginError = "<div class='alert alert-danger'>No such user in database. Please try again. <a class='close' data-dismiss='alert'>&times;</a></div>";
      }

  }



mysqli_close($conn);
include('includes/header.php');
?>





<header class="container-fluid">
  <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand active" href="index.php"><i class="fa fa-bus"></i> TecnoBus GPS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">

          <ul class="nav navbar-nav navbar-right">
            <li><a href="../navbar/">Nosotros</a></li>
            <li><a href="../navbar-static-top/">Rutas</a></li>
            <li><a href="./"> Planes <span class="sr-only">(current)</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


  <!--<div class="row">
    <div class="col-md-12 jumbotron text-center jumbo">
      <h1 class="main-text">TecnoBus GPS</h1>
      <h3 class="main-text">Tu gestor de viajes en unidades de transporte público</h3>
    </div>
  </div>-->
</header>


<section class="container">
  <?php echo $alertMessage; ?>

        <div class="row">

      

    <!--  <div class="col-md-5">-->
<div class="col-md-4 col-md-offset-4">
          <div class="form-box form-box-in">

            <div class="form-top">
              <div class="form-top-left">
                <h2 class="login-title">Inicia Sesión</h2>
                  <p class="login-lead">Empieza a gestionar tus viajes ahora:</p>
              </div>
              <div class="form-top-right">
                <i class="fa fa-bus login-icon"></i>
              </div>
              </div>
              <div class="form-bottom">
            <form role="form" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" class="registration-form">
              <div class="form-group">
                <label class="sr-only" for="form-user">Usuario o Email</label>
                <span><?php echo $loginError  ?></span>
                  <input type="text" name="form-user" placeholder="Usuario" class="form-first-name form-control ">
                </div>

                <div class="form-group">
                  <label class="sr-only" for="form-password">Contraseña</label>
                  <input type="password" name="form-password" placeholder="Contraseña" class="form-last-name form-control ">
                </div>

                <button type="submit" class="btn" name="login">Iniciar Sesión</button>
            </form>
          </div>
          </div>

        </div>
    </div>
    <!--  end Sign up form -->


  </div>
</section>
<?php include ('footer.php'); ?>
