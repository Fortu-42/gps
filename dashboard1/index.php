<?php
session_start();

if( !$_SESSION['loggedInUser'] ) {

    // send them to the login page
    header("Location: ../login.php");
} 

include('includes/header.php');


 ?>


<script type="text/javascript" src="https://pubnub.github.io/eon/v/eon/1.0.0/eon.js"></script>
<link type="text/css" rel="stylesheet" href="https://pubnub.github.io/eon/v/eon/1.0.0/eon.css"/>
<script type="text/javascript" src="https://cdn.pubnub.com/sdk/javascript/pubnub.4.4.4.js"></script>



<style>
    #html-id{
        height:300px;
        background-color: red;
    }
</style>
</head>

<div id='map'></div>
<script type="text/javascript">

var pubnub = new PubNub({
  publishKey: 'pub-c-ffef9f39-c598-4bfa-a4aa-65874150cd42',
  subscribeKey: 'sub-c-a3e9dcca-eafc-11e6-889b-02ee2ddab7fe'
});

eon.map({
  pubnub: pubnub,
  id: 'map',
  mbId: 'cizd2vll41wpx2wmn13csmd47',
  mbToken: 'pk.eyJ1IjoiZm9ydHVuYXRvaGVycmVyYSIsImEiOiJjaXpkMGhqbXQwaXd1MzJvZXRuMWZob3k3In0.062NwRpCxTr4xvTNNuvbsg',
  channel: 'south-coast-bus-data',
  rotate: true,
  history: true,
  marker: function (latlng, data) {

    var marker = new L.RotatedMarker(latlng, {
      icon: L.icon({
        iconUrl: 'https://i.imgur.com/2fmFQfN.png',
        iconSize: [9, 32]
      })
    });

    marker.bindPopup('Route ' + data.routeTag.toUpperCase());

    return marker;

  }
});
</script>



  </body>
