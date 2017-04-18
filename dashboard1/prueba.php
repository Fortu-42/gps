<!DOCTYPE html>
<html>
  <head>
    <meta charset=utf-8 />
    <title>EON Maps</title>
    <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
    <style>
      body {
        margin: 0;
        padding: 0;
      }
      #map {
        position:absolute;
        top:0;
        bottom:0;
        width:100%;
      }
    </style>

    <script type="text/javascript" src="https://pubnub.github.io/eon/v/eon/1.0.0/eon.js"></script>
    <link type="text/css" rel="stylesheet" href="https://pubnub.github.io/eon/v/eon/1.0.0/eon.css"/>

  </head>
  <body>
    <div id='map'></div>
    <script>
      function getNonZeroRandomNumber(){
        var random = Math.floor(Math.random()*199) - 99;
        if(random==0) return getNonZeroRandomNumber();
        return random;
      }
    </script>
    <script>
      
     var pubnub = new PubNub({
    publishKey: 'pub-c-ffef9f39-c598-4bfa-a4aa-65874150cd42',
    subscribeKey: 'sub-c-a3e9dcca-eafc-11e6-889b-02ee2ddab7fe',
    ssl: true
    });



      var channel = 'pubnub-mapbox'

      var polyline = new L.polyline([], {color:'red', fillColor:'red'});

      var points = [
  {"latlng": [10.133553, -64.678958]},
  {"latlng": [10.130128, -64.670508]},
  {"latlng": [10.133699, -64.679803]},
  {"latlng": [10.154759, -64.682624]},
  {"latlng": [10.178221, -64.681173]},
  {"latlng": [10.18168, -64.664518]}
];

      var map = eon.map({
      ssl: true,
      pubnub: pubnub,
      id: 'map',
      mbToken: 'pk.eyJ1IjoiZm9ydHVuYXRvaGVycmVyYSIsImEiOiJjaXpkMGhqbXQwaXd1MzJvZXRuMWZob3k3In0.062NwRpCxTr4xvTNNuvbsg',
      mbId: 'fortunatoherrera.117c4521',
      channels: [channel],
      message: function(m){
        console.log(m);
      //  polyline.setLatLngs(data.iss.latlng);
        
      }
        });


        

        console.log("hola!");
        polyline.setLatLngs(points);
        polyline.addTo(map);
        console.log("ya pase");



                pubnub.addListener({
                    status: function(statusEvent) {
                        if (statusEvent.category === "PNConnectedCategory") {
            
                                   pubnub.publish({
                        channel: ['pubnub-mapbox'],
                        message: {
                                  
                                  "lat1": 10.133553,
                                  "lng1": -64.678958,
                                  "lat2": 10.18168,
                                  "lng2": -64.664518,
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
                        }
                    },
                    message: function(m) {
                       if(m.channel === 'mapbox-directions'){
                      console.log(m);
                       var dir = m.message.directions.routes;
                      console.log(dir);
                   
    }
                    },
                    presence: function(presenceEvent) {
                        // handle presence
                    }
        });


 




            pubnub.subscribe({
            channels: ['mapbox-directions']
            });                 
    </script>
  </body>
</html>