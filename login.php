<?php


  include('includes/header.php');

  /*if (isset($_GET['alert'] == success)) {
    # code...
  }*/

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
          <a class="navbar-brand active" href="index1.php"><i class="fa fa-bus"></i> TecnoBus GPS</a>
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

        <div class="row">

          <!-- Main tittle -->




<!-- Sign up form -->

    <!--  <div class="col-md-5">-->
<div class="col-md-4 col-md-offset-4">
          <div class="form-box form-box-in">

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
            <form role="form" action="" method="post" class="registration-form">
              <div class="form-group">
                <label class="sr-only" for="form-first-name">Usuario o Email</label>
                  <input type="text" name="form-first-name" placeholder="Usuario" class="form-first-name form-control ">
                </div>

                <div class="form-group">
                  <label class="sr-only" for="form-password">Contraseña</label>
                  <input type="password" name="form-password" placeholder="Contraseña" class="form-last-name form-control ">
                </div>

                <button type="submit" class="btn">Iniciar Sesión</button>
            </form>
          </div>
          </div>

        </div>
    </div>
    <!--  end Sign up form -->


  </div>
</section>
<?php include ('footer.php'); ?>
