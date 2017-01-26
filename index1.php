<?php


  include('includes/connection.php');

  include('includes/functions.php');

  if(isset($_POST['new'] ) ){

   $name =  $username = $password = $repassword = $email = "";

   if( !$_POST["name"] ) {
       $nameError = "Please enter a name <br>";
   } else {
       $name = validateFormData( $_POST["name"] );
   }

   if( !$_POST["username"] ) {
       $usernameError = "Please enter a username <br>";
   } else {
       $username = validateFormData( $_POST["username"] );
   }

   if( !$_POST["password"] ) {
       $passwordError = "Ingrese una contraseña válida <br>";

   } elseif ($_POST["password"] == $_POST["repassword"]) {
       $password = validateFormData( $_POST["password"] );
       $password = password_hash($password, PASSWORD_DEFAULT);

     }elseif ($_POST["password"] =! $_POST["repassword"]) {
       $passwordError = "Las contraseñas no coinciden <br>";
     }


   if( !$_POST["email"]) {
       $emailError = "Please enter a valid Email <br>";
   } else {
       $email = validateFormData( $_POST["email"] );
       if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $emailError = "Please enter a valid Email <br>";
          $email = false;
       }
   }

    if($name && $username && $email && $password){
      $query = "INSERT INTO user (id, name, username, email, password, signup_date)
      VALUES (NULL, '$name', '$username', '$email', '$password', CURRENT_TIMESTAMP)";
    }

    $result = mysqli_query( $conn, $query);
    if ($result) {

      header( "Location: login.php?alert=success" );
    }else{
      echo "Error: ". $query . "<br>" . mysqli_error($conn);
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
          <a class="navbar-brand active" href="#"><i class="fa fa-bus"></i> TecnoBus GPS</a>
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



 
</header>

<section id="mainContainer">

  <div class="row">
    <div class="col-md-12 jumbotron text-center jumbo">
      <h1 class="main-text">TecnoBus GPS</h1>
      <h3 class="main-text">Tu gestor de viajes en unidades de transporte público</h3>
    </div>
  </div>

</section>

<section class="container">

        <div class="row">

          <!-- Main tittle -->

          <div class="col-md-6 main-title">
            <div class="row">
							<div class="col-md-2 col-sm-12  col-xs-12 icon"><i class="fa fa-eye"></i></div>
							<div class="col-md-10 col-sm-12 col-xs-12 clearfix">
								<h3 class="title-landing">Visualiza en Tiempo Real</h3>
								<p class="main-lead">Consigue la unidad BTR mas cercana a ti o la que mas se ajuste a tu conveniencia visualizando las unidades en tiempo real desde cualquier dispositvo con conexión a internet.</p>
							</div>
						</div>

            <div class="row">
							<div class="col-sm-2 icon"><i class="fa fa-users"></i></div>
							<div class="col-sm-10 clearfix">
								<h3 class="title-landing">Selecciona Paradas</h3>
								<p class="main-lead">Selecciona las paradas que más uses y planifica tus viajes a travéz de la ciudad</p>
							</div>
						</div>

            <div class="row">
							<div class="col-sm-2 icon"><i class="fa fa-calendar-check-o" aria-hidden="true"></i></div>
							<div class="col-sm-10 clearfix">
								<h3 class="title-landing">Planea tus viajes a travéz de la ciudad</h3>
								<p class="main-lead">¿No sabes como llegar al sitio donde necesitas estar? te mostramos como transportarte a travéz de la ciudad en el sistema de Buses de Tránsito Rápido*</p>
							</div>
						</div>
          </div>


<!-- Sign up form -->

    <!--  <div class="col-md-5">-->
<div class="col-md-6">
          <div class="form-box">

            <div class="form-top">
              <div class="form-top-left">
                <h3>Regístrate Aquí</h3>
                  <p>Empieza a gestionar tus viajes ahora:</p>
              </div>
              <div class="form-top-right">
                <i class="fa fa-bus"></i>
              </div>
              </div>
              <div class="form-bottom">
            <form role="form" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" id="main-register-form" class="registration-form">

              <div class="form-group">
                <label class="sr-only control-label" for="inputName">Nombre y Apellido</label>
                <span class="input-error"><?php echo $nameError; ?></span>
                  <input type="text" name="name" placeholder="Nombre y Apellido" class="form-first-name form-control form-control-in" id="inputName" required>
              </div>

              <div class="form-group">
                  <label class="sr-only control-label" for="username">Usuario</label>
                  <span class="input-error"><?php echo $usernameError; ?></span>
                  <input type="text" pattern="^[_A-z0-9]{1,}$" maxlength="15" name="username" placeholder="Nombre de Usuario" class="form-last-name form-control form-control-in" required>
                  <span class="glyphicon form-control-feedback" aria-hidden="false"></span>
                 </div>  

                  <div class="form-group">
                    <label class="sr-only" for="password">Contraseña</label>
                    <span class="input-error"><?php echo $passwordError; ?></span>
                    <input type="password" name="password" placeholder="Contraseña" class="form-last-name form-control form-control-in" required>
                  </div>
                  
                  <div class="form-group">
                    <label class="sr-only" for="repassword">Repetir Contraseña</label>
                    <input type="password" name="repassword" placeholder="Repetir Contraseña" class="form-email form-control form-control-in">
                  </div>

                <div class="form-group">
                  <label class="sr-only" for="email">Email</label>
                  <span class="input-error"><?php echo $emailError; ?></span>
                  <input type="text" name="email" placeholder="E-mail" class="form-email form-control">
                </div>

                <button type="submit" class="btn" name="new">Registrame</button>
                <hr>
                <h5 style="color:white;">Si ya tienes una cuenta, haz click <a href="login.php">aquí</a></h5>
            </form>
          </div>
          </div>

        </div>
    </div>
    <!--  end Sign up form -->


  </div>
</section>



<section id="features" class="container">
  <div class="row">
    <div class=" col-md-offset-1 col-md-3 col-xs-12">
        <img src="img/mock.jpg" alt="" class="img-responsive">
    </div>
    <div class="col-md-7 col-xs-12">
        <h1 class="ptitle text-center">Únete a TecnoBus GPS</h1>
        <p class="mainP text-center">Gestiona tus viajes, horarios, tiempos de llegada, entre muchas otras cosas, con tan solo unos clicks podrás gestionar y mejorar por completo la forma en que utilizas el transporte público. Olvidate de las largas colas y esperas, no volverás a perder nunca una unidad de transporte con TecnoBus GPS</p>
    </div>
  
        
          <div class="col-md-4 col-md-offset-3">
            <button type="button" class="btn btn-primary fea-button">Crear una cuenta</button>
          </div>
        
    </div>
    
    <hr>
  
    <div class="row">
      <div class="features-des">
        <div class="col-md-3 col-xs-12 text-center ico"><i class="fa fa-map-marker fa-2x"></i>
        <p class="text-fea">Ubica en tiempo real unidades de transporte público desde cualquier dispositivo con conexión a internet y GPS.</p>
        </div>
        <div class="col-md-3 col-xs-12 text-center ico"><i class="fa fa-street-view fa-2x"></i>
        <p class="text-fea">Conoce los horarios de las paradas establecidas y no pierdas nunca más una unidad de transporte público</p>
        </div>
        <div class="col-md-3 col-xs-12 text-center ico"><i class="fa fa-location-arrow fa-2x"></i>
        <p class="text-fea">Planea, gestiona y organiza tus viajes en unidades transporte público de manera rápida y sencilla con TecnoBus GPS </p>
        </div>
        <div class="col-md-3 col-xs-12 text-center ico last"><i class="fa fa-road fa-2x"></i>
        <p class="text-fea">No te pierdas nunca en la ciudad con nuestro mapa de rutas personalizado, incluye sugerencias y destinos</p>
        </div>
      </div>
    </div>

    <hr>

    <div class="row">
      <div class="col-md-6 col-md-offset-1 col-xs-12 text-box">
        <h1 class="ptitle text-center">TecnoBus GPS también es responsive</h1>
        <p class="mainP text-center">Selecciona unidades y paradas, planea viajes en donde estés, siempre y cuando tengas conexión GPS</p>
        <div class="col-md-4 col-md-offset-5">
            <button type="button" class="btn btn-primary fea-button1">Crear una cuenta</button>
        </div>
      </div>
      <div class="col-md-4-col-xs-12">
        <img src="img/mockk.png" alt="mock2" class="img-responsive" width="450px">
      </div>
    </div>
    
  
  

</section>

<section id="contact" class="container">
  <div class="col-md-10 col-md-offset-1">
          <div class="form-box form-box-in">

            <div class="form-top">
              <div class="form-top-left">
                <h2 class="contact-title">Contacto</h2>
                  <p class="contact-lead">Envianos tu mensaje:</p>
              </div>
              <div class="form-top-right">
                <i class="fa fa-envelope contact-icon"></i>
              </div>
              </div>
              <div class="form-bottom">
            <form role="form" action="" method="post" class="registration-form data-toggle="validator">
              <div class="form-group">
                <label class="sr-only control-label" for="contact-name">Nombre</label>
                  <input type="text" name="contact-name" placeholder="Nombre" class="form-first-name form-control form-contact-in" id="contact-name" required>
                  <label class="sr-only" for="contact-user">Usuario</label>
                  <input type="text" name="contact-user" placeholder="Usuario" class="form-last-name form-control form-contact-in">
                </div>

               <div class="form-group">
                  <label class="sr-only" for="contact-email">Correo</label>
                  <input type="e-mail" name="contact-email" placeholder="Correo Electrónico" class="form-control" required>
                </div>

                <div class="form-group">
                  <textarea name="form-about-yourself" placeholder="Mensaje" class="form-about-yourself form-control" id="form-about-yourself"></textarea>
                </div>

                <button type="submit" class="btn" name="login">Enviar</button>
            </form>
          </div>
          </div>

        </div>
    </div>

</section>

<footer class="credits" class="container-fluid">
  <p class="author text-center">Crafted with &hearts; in Venezuela by <a href="#">Fortunato</a></p>
</footer>
<?php include ('footer.php'); ?>
