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



      var channel = 'pubnub-mapbox' + getNonZeroRandomNumber();

      eon.map({
        pubnub: pubnub,
        id: 'map',
        mbToken: 'pk.eyJ1IjoiZm9ydHVuYXRvaGVycmVyYSIsImEiOiJjaXpkMGhqbXQwaXd1MzJvZXRuMWZob3k3In0.062NwRpCxTr4xvTNNuvbsg',
        mbId: 'fortunatoherrera.117c4521',
        channels: [channel],
        connect: connect,
        options: {
          zoomAnimation: false,
        },
      });
      function connect() {
        var point = {
          latlng: [37.370375, -97.756138]
        };
        setInterval(function(){
          var new_point = JSON.parse(JSON.stringify(point));
          new_point.latlng = [
            new_point.latlng[0] + (getNonZeroRandomNumber() * 0.1),
            new_point.latlng[1] + (getNonZeroRandomNumber() * 0.2)
          ];
          pubnub.publish({
            channel: channel,
            message: [new_point]
          });
        }, 1000);
      };
    </script>
  </body>
</html>