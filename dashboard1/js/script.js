

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



$(document).ready(function () {
  //your code here


$('#paradas1').val('');

 $('#paradas1').on('input', function() {
    var v = this.value;

    switch(v){

        case "Terminal de Barcelona":

        $('#imgParada').removeAttr('src');
        $('#imgMapParada').removeAttr('src');
        $('#myModalLabel').empty();
        $('#imgParada').attr('src','img/terminal.jpg');
        $('#imgMapParada').attr('src','img/terminalMap.png');
        $('#myModalLabel').html('Terminal de Barcelona');
        $('#Parada1').modal('show');
       
        break;

        case "Puente Bolívar":

        $('#imgParada').removeAttr('src');
        $('#imgMapParada').removeAttr('src');
        $('#myModalLabel').empty();
        $('#imgParada').attr('src','img/puente_bolivar.jpg');
        $('#imgMapParada').attr('src','img/terminalMap.png');
        $('#myModalLabel').html('Puente Bolívar');
        $('#Parada1').modal('show');

        break;

        

      }

 
   
    });
});


       