<?php
/*session_start();

if( !$_SESSION['loggedInUser'] ) {

    // send them to the login page
    header("Location: ../login.php");
} */

include('includes/header.php');


 include('includes/connection.php');

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

      <a class="navbar-brand" href="#"><i class="fa fa-bus fa-2" aria-hidden="true"></i> TecnoBus GPS</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


    
      <ul class="nav navbar-nav navbar-right">

        <li><a href="#"><i class="fa fa-binoculars" aria-hidden="true"></i>
 Encontrar Parada</a></li>
        <li><a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i> Planear Viaje</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i>
Menú<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="usuarios.php"><i class="fa fa-user" aria-hidden="true"></i> Gestionar Usuario</a></li>
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

<div id="map1" style="height:700px;"></div>

<!-- Inicio modal Paradas -->

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


<!-- Modal para planear viajes -->

<div class="modal fade bs-example-modal-lg" id="planTrip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">


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

            <form id="contactForm" method="post" class="form-horizontal" role="form" action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>">

                <div class="form-group">
                  <div class="col-xs-12">
                    <input type="text" class="form-control" name="fullName"  placeholder="Nombre y Apellido"/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                      <input type="text" class="form-control" name="username"  placeholder="Nombre de Usuario"/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <input type="text" class="form-control" name="email"  placeholder="E-mail" />
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <input type="password" class="form-control" name="password"  placeholder="Contraseña" />
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <input type="password" class="form-control" name="repassword" placeholder="Repetir Contraseña"/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <div class="errorM" id="messages"></div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-default" name="new">Registrarse</button>
                  </div>
                </div>

            </form>
            
          </div>

              
        </div>
          
      </div>

          <div class="row">
            <div class="col-xs-6" id="imgParadaC">
              <img  alt="foto-de-parada" class="img-responsive" id="imgParada">
            </div>
            <div class="col-xs-6" id="imgMapParadaC">
              <img  alt="foto-terminal-mapa" class="img-responsive" id="imgMapParada">
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
<script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.7.0.js"></script>
<script type="text/javascript" src="https://pubnub.github.io/eon/v/eon/1.0.0/eon.js"></script>
<script type="text/javascript">

  var pubnub = new PubNub({
  publishKey: 'pub-c-ffef9f39-c598-4bfa-a4aa-65874150cd42',
  subscribeKey: 'sub-c-a3e9dcca-eafc-11e6-889b-02ee2ddab7fe',
  ssl: true
});


 function getNonZeroRandomNumber() {
      var random = Math.floor(Math.random() * 199) - 99;
      if (random === 0) return getNonZeroRandomNumber();
      return random;
  }
 

 var channel = 'BTR';

    eon.map({
      ssl: true,
      pubnub: pubnub,
      id: 'map1',
      mbToken: 'pk.eyJ1IjoiZm9ydHVuYXRvaGVycmVyYSIsImEiOiJjaXpkMGhqbXQwaXd1MzJvZXRuMWZob3k3In0.062NwRpCxTr4xvTNNuvbsg',
      mbId: 'fortunatoherrera.117c4521',
      channels: [channel],
        });


/*var points = [
  {"latlng": [10.133553, -64.678958]},
  {"latlng": [10.130128, -64.670508]},
  {"latlng": [10.133699, -64.679803]},
  {"latlng": [10.154759, -64.682624]},
  {"latlng": [10.178221, -64.681173]},
  {"latlng": [10.18168, -64.664518]}
];

var count = -1;


  setInterval(function() {

 count = count +1;
 if(count >= points.length) count = 0;
 console.log("publicando..", points[count]);
 pubnub.publish({
    channel: 'BTR',
    message : [points[count]]
 });

  }, 5000);

 var  m = '';

    pubnub.subscribe({
      withPrecense : true,
      channel: 'eon-map-geolocation-output',
   
  });

  pubnub.publish({
        channel: 'eon-maps-geolocation-input',
        message: { foo: "hola"}
      }, 
      function (status, response){
        if(status.error){
          console.log(status);
        } else{
          console.log("messaege Published w/ timetoken", response.timetoken)
        }
      }
  );*/


var pos = "";

        pubnub.addListener({
            status: function(statusEvent) {
                if (statusEvent.category === "PNConnectedCategory") {
                  setInterval(function(){
                    pubnub.publish(
                        { 
                            message: {foo : "hola"},
                            channel : 'eon-maps-geolocation-input'
                        }, 
                        function (status, response) {
                            if(status.error){
                              console.log(status);
                            } else{
                              console.log("message Published w/ timetoken", response.timetoken)
                            }
                        }
                    ); }, 5000);
                }
            },
            message: function(message) {
               var pos = message.message.latlng;
               pubnub.publish({
                 channel : 'BTR',
                 message: [{"latlng": pos}
                 ]
               });
                
            },
            presence: function(presenceEvent) {
                // handle presence
                alert("hola usuario");
            }
        });
        
        pubnub.subscribe({
            channels: ['eon-map-geolocation-output']
        });







 
     


</script>







 </body>

</html>
 
