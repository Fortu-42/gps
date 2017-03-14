<?php
session_start();

if( !$_SESSION['loggedInUser'] ) {

    // send them to the login page
    header("Location: ../login.php");
} 

include('includes/header.php');


 ?>

<style>
    #map{
        height:500px;
    }
</style>
</head>

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

<div id="map"></div>

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
    include('js/script.php');
?>

 </body>

</html>
 
