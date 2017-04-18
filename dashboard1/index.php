<?php
session_start();

if( !$_SESSION['loggedInUser'] ) {

    // send them to the login page
    header("Location: ../login.php");
} 

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
            <li><a href="unidades.php"><i class="fa fa-bus" aria-hidden="true"></i> Gestionar unidades </a></li>
            <!--<li><a href="#"><i class="fa fa-street-view" aria-hidden="true"></i> Gestionar Paradas </a></li>-->
            <li role="separator" class="divider"></li>
            <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar Sesión </a></li>
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

<div id="map" style="height:500px;"></div>

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




  <form action='crearViaje.php' method='post'>

    <div class="modal-dialog modal-lg" role="document">

      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">Actualizar Unidad ID: <span name="uid" id="uid"></span>  </h4>
        </div>

        <div class="modal-body">
         
          <div class="form-box">

            <div class="form-top">

              <div class="form-top-left">
                <h3>Modificar Unidades</h3>
                <p>Modifica la información de la unidades aquí</p>
              </div>

              <div class="form-top-right">
                  <i class="fa fa-bus"></i>
              </div>
            </div>

            <div class="form-bottom">

              <div class="form-group">
                <div class="col-xs-12">
                 <input type="hidden" class="form-control" name="uid"/>
                 <input type="text" class="form-control" name="cantPuestos"  placeholder="Cantidad de Puestos"/>
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-12">
                  <input type="text" class="form-control" name="ipDispGPS"  placeholder="IP del dispositivo GPS"/>
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-12">
                  <input type="text" class="form-control" name="identificacion"  placeholder="Identificación" />
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-12">
                  <div class="errorM" id="messages"></div>
                </div>
              </div>
              
          </div>

       </div>

   </div>

   <div class="modal-footer">
            
            <button type='submit' class='btn btn-danger btn-sm' name='update'>Actualizar</button>
             <button class='btn btn-default btn-sm' data-dismiss='modal'>Cancelar</button>
            
   </div>
        

    </div>
      </form>
</div>
</div>




<? 
    include('includes/footer.php');

?>
<!--<script src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.7.0.js"></script>-->
<script type="text/javascript" src="https://pubnub.github.io/eon/v/eon/1.0.0/eon.js"></script>
<script type="text/javascript">

  var pubnub = new PubNub({
  publishKey: 'pub-c-ffef9f39-c598-4bfa-a4aa-65874150cd42',
  subscribeKey: 'sub-c-a3e9dcca-eafc-11e6-889b-02ee2ddab7fe',
  ssl: true
});


// function getNonZeroRandomNumber() {
  //    var random = Math.floor(Math.random() * 199) - 99;
    //  if (random === 0) return getNonZeroRandomNumber();
      //return random;
 // }
 

 var channel = 'BTR';

    var map = eon.map({
      ssl: true,
      pubnub: pubnub,
      id: 'map',
      mbToken: 'pk.eyJ1IjoiZm9ydHVuYXRvaGVycmVyYSIsImEiOiJjaXpkMGhqbXQwaXd1MzJvZXRuMWZob3k3In0.062NwRpCxTr4xvTNNuvbsg',
      mbId: 'fortunatoherrera.117c4521',
      channels: [channel],
      message: function (data) {
        console.log(data);
     if(data.user.latlng){
          map.setView(data.user.latlng, 15);
          }/* else {
            console.log(data);
          }*/
        },
      marker: function (dir, dat) {
      
         if(dir){
        
          var marker = new L.Marker(dir, {
            icon: L.icon({
              iconUrl: 'img/user.png',
              iconSize: [24, 24]
            })
          });

         var popup = '';
          if(dat[0]) {
            popup = 'Usted está en: Av Jorge Rodríguez';
          }
          if(!popup.length) {
            var popup = 'Ups!, No hay datos disponibles';
          }

          marker.bindPopup(popup);

          return marker; 
          
          } 
          /*else {
            console.log(info);
          }*/
        }

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


var pos = '';


         pubnub.publish(
                        { 
                            message: {foo : "hola"},
                            channel : ['eon-maps-geolocation-input']
                        }, 
                        function (status, response) {
                            if(status.error){
                              console.log(status);
                            } else{
                              console.log("input publicado", response.timetoken)
                            }
                        }
                    ); 


        pubnub.addListener({
            message: function(message) {
              
              if(message.channel === 'eon-map-geolocation-output'){
              //  console.log(JSON.stringify(message));
              pos = message.message.latlng;
              lat = message.message.data.lat;
              lon = message.message.data.lon;
             
              
               pubnub.publish({
                 channel : 'placeslatlng',
                 message:     
                 { 
                  "query" : [lon, lat]
                  }
                 
               });

               var address = ''; 
                pubnub.addListener({
                  message: function(m){
                 //    console.log(m);
                      if(m.channel === 'placeslatlng'){
                        console.log(m.message.geocode);
                          address = m.message.geocode.features[0].properties.address;
                          pubnub.publish({
                            channel: 'BTR',
                            message: {
                              user:{
                                "latlng": [10.17983594058255, -64.66457921825409],
                                "data": [address]
                              }
                            }
                          }, function (status, response) {
                            if(status.error){
                              console.log(status);
                            } else{
                              console.log("btr publicado con el valor de la direccion", response.timetoken)
                            }
                        });


                        pubnub.publish({
                        channel: ['mapbox-directions'],
                        message: {
                                  user:{
                                "latlng": pos,
                                "data": [address]
                                  },
                                  "lat1": 10.133553,
                                  "lng1": -64.678958,
                                  "lat2": 10.130128,
                                  "lng2": -64.670508,
                                  "lat3": 10.133699,
                                  "lng3": -64.679803,
                                  "lat4": 10.154759,
                                  "lng4": -64.682624,
                                  "lat5": 10.178221,
                                  "lng5": -64.681173,
                                  "lat6": 10.18168,
                                  "lng6": -64.664518,
                                  "profile":"mapbox/driving"
                                  }
                                    },
                                    function (status, response) {
                                        if(status.error){
                                          console.log(status);
                                        } else{
                                          console.log("publicado las direcciones", response.timetoken)
                                        }
                        }
                    );

                 /*   pubnub.addListener({
                      message: function(m){
                        if(channel === 'mapbox-directions'){
                          console.log(m);
                          dir = m.message.directions;
                          pubnub.publish({
                            channel: 'BTR',
                            message: {"directions": dir}
                          }, function (status, response) {
                            if(status.error){
                              console.log(status);
                            } else{
                              console.log("direcciones publicadas", response.timetoken)
                            }
                        });
                        }
                      }
                    });*/

                      
                  }}
                });

               }

                
            },
            presence: function(presenceEvent) {
                // handle presence
              
            }
        });





pubnub.addListener({
  
  message: function(m){
  if(m.channel === 'mapbox-directions'){
    console.log(m);
  var dir = m.message.directions.routes;
    
  //polyline.setLatLngs(dir);

    }
  }
});


            pubnub.subscribe({
            channels: ['eon-map-geolocation-output', 'placeslatlng', 'mapbox-directions']
            });
            
        
            //  pubnub.publish({ 
             // message: {foo : "hola"},
              //channel : 'eon-maps-geolocation-input'
                //         }); 
              
        
       

 


</script>







 </body>

</html>
 
