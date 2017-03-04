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



<style>
    #map{
        height:500px;
    }
</style>
</head>

<div id="map"></div>
<script type="text/javascript">

var pubnub = new PubNub({
  publishKey: 'pub-c-ffef9f39-c598-4bfa-a4aa-65874150cd42',
  subscribeKey: 'sub-c-a3e9dcca-eafc-11e6-889b-02ee2ddab7fe'
});

var channel = 'BTR';

eon.map({
  pubnub: pubnub,
  id: 'map',
  mbToken: 'pk.eyJ1IjoiZm9ydHVuYXRvaGVycmVyYSIsImEiOiJjaXpkMGhqbXQwaXd1MzJvZXRuMWZob3k3In0.062NwRpCxTr4xvTNNuvbsg',
  mbId: 'fortunatoherrera.117c4521',
  channels: [channel],
    });
</script>

 </body>

</html>
 
