<?php
session_start();

if( !$_SESSION['loggedInUser'] ) {

    // send them to the login page
    header("Location: ../login.php");
} 

include('includes/header.php');


 ?>

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
      <a class="navbar-brand" href="#"><i class="fa fa-bus fa-2" aria-hidden="true"></i>TencoBus GPS</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>


<section id="Sparada">

<div class="form-group">
<select class="form-control" id="paradas" style="width:180px;"> 
    <option value="">Seleccionar Parada</option>
    <option value="Terminal de Barcelona">Terminal de Barcelona</option>
    <option value="Puente Bolívar">Puente Bolívar</option>
    <option value="Robert Serra">Robert Serra</option>
    <option value="Puente Monagas">Puente Monagas</option>
    <option value="Boyacá">Boyacá</option>
    <option value="La Rotaria">La Rotaria</option>
    <option value="Crucero">Crucero</option>
    <option value="Vistamar">Vistamar</option>
    <option value="Ministerio">Ministerio</option>
    <option value="Las Garzas">Las Garzas</option>
    <option value="Polideportivo">Polideportivo</option>
    <option value="Molorca Sur">Molorca Sur</option>
    <option value="Molorca Norte">Molorca Norte</option>
    <option value="Pozuelos">Pozuelos</option>
    <option value="Tierra Adentro">Tierra Adentro</option>
    <option value="Sierra Maestra">Sierra Maestra</option>
    <option value="Bella Vista">Bella Vista</option>
    <option value="Chuparín">Chuparín</option>
    <option value="Sotillo">Sotillo</option>
    <option value="El Pensíl">El Pensíl</option>
    <option value="Alberto Lovera">Alberto Lovera</option>
</select>
</div>

</section>

<!--<div id="map"></div>-->

<!-- Inicio modal Terminal de Barcelona -->

<div class="modal fade bs-example-modal-lg" id="Parada1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">

          <div class="row">
            <div class="col-xs-6" id="imgParadaC">
              <img  alt="foto-de-parada" class="img-responsive" id="imgParada">
            </div>
            <div class="col-xs-6" id="imgMapParadaC">
              <img  alt="foto-terminal-mapa" class="img-responsive" id="imgMapParada">
            </div>
          </div>

          <div class="row">
            <h4 class="text-center">Próximas Unidades</h3>
              <div class="col-xs-6 col-xs-offset-3">
                <table class="table table-hover text-center table-condensed table-striped">
                  <tr>
                    <th class="text-center">Unidad</th>
                    <th class="text-center">Tiempo Estimado de Llegada</th>
                  </tr>
                  <tr>
                    <td>021</td>
                    <td>30:06</td>
                  </tr>
                  <tr>
                    <td>022</td>
                    <td>1:20:00</td>
                  </tr>
                  <tr>
                    <td>023</td>
                    <td>2:00:00</td>
                  </tr>
                  <tr>
                    <td>024</td>
                    <td>2:10:00</td>
                  </tr>
                </table>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Planear Viaje en Esta Parada</button>
      </div>
    </div>
  </div>
</div>

<? 
    include('includes/footer.php');

?>

 </body>

</html>
 
