$('#paradas1').val('');


function delUser(asd) {

    $("#confirm span#uid").html(asd);
    $("#confirm input[name=uid]").val(asd);
    return false;

}

function modUser(uid, nombre, usuario, correo) {


    $("#mod_user span#uid").html(uid);

    $("#mod_user input[name=uid]").val(uid);

    $("#mod_user input[name=nombre]").val(nombre);

    $("#mod_user input[name=usuario]").val(usuario);

    $("#mod_user input[name=correo]").val(correo);
    return false;
}


function delUnd(asd) {
    $('#delUnd span#uid').html(asd);
    $('#delUnd input[name=uid]').val(asd);
    return false;
}


function modUnd(uid, cantPuestos, ipDispGPS, identificacion) {

    $("#modUnd span#uid").html(uid);

    $("#modUnd input[name=uid]").val(uid);

    $("#modUnd input[name=cantPuestos]").val(cantPuestos);

    $("#modUnd input[name=ipDispGPS]").val(ipDispGPS);

    $("#modUnd input[name=identificacion]").val(identificacion);
    return false;

}






$('#paradas').on('input', function() {
    var v = this.value;

    switch (v) {

        case "Terminal de Barcelona":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/terminal.jpg');
            $('#imgMapParada').attr('src', 'img/terminalMap.png');
            $('#myModalLabel').html('Terminal de Barcelona');
            $('#Parada1').modal('show');

            break;

        case "Puente Bolívar":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/puente_bolivar.jpg');
            $('#imgMapParada').attr('src', 'img/puenteBMap.png');
            $('#myModalLabel').html('Puente Bolívar');
            $('#Parada1').modal('show');

            break;

        case "Robert Serra":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/robert_serra.jpg');
            $('#imgMapParada').attr('src', 'img/robertMap.png');
            $('#myModalLabel').html('Robert Serra');
            $('#Parada1').modal('show');

            break;

        case "Puente Monagas":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/puente_monagas.jpg');
            $('#imgMapParada').attr('src', 'img/puenteMmap.png');
            $('#myModalLabel').html('Puente Monagas');
            $('#Parada1').modal('show');

            break;

        case "Boyacá":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/boyaca.jpg');
            $('#imgMapParada').attr('src', 'img/boyacaMap.png');
            $('#myModalLabel').html('Boyacá');
            $('#Parada1').modal('show');

            break;

        case "La Rotaria":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/rotaria.jpg');
            $('#imgMapParada').attr('src', 'img/rotariaMap.png');
            $('#myModalLabel').html('La Rotaria');
            $('#Parada1').modal('show');

            break;

        case "Crucero":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            // $('#imgParada').attr('src','img/puente_bolivar.jpg');
            $('#imgMapParada').attr('src', 'img/cruceroMap.png');
            $('#myModalLabel').html('Crucero de Lechería');
            $('#Parada1').modal('show');

            break;

        case "Vistamar":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            //$('#imgParada').attr('src','img/puente_bolivar.jpg');
            $('#imgMapParada').attr('src', 'img/vistamarMap.png');
            $('#myModalLabel').html('Vistamar');
            $('#Parada1').modal('show');

            break;

        case "Ministerio":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/ministerio.jpg');
            $('#imgMapParada').attr('src', 'img/ministerioMap.png');
            $('#myModalLabel').html('Ministerio');
            $('#Parada1').modal('show');

            break;

        case "Las Garzas":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/las_garzas.jpg');
            $('#imgMapParada').attr('src', 'img/lasGarzasMap.png');
            $('#myModalLabel').html('Las Garzas');
            $('#Parada1').modal('show');

            break;

        case "Polideportivo":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            // $('#imgParada').attr('src','img/ministerio.jpg');
            $('#imgMapParada').attr('src', 'img/polideportivoMap.png');
            $('#myModalLabel').html('Polideportivo');
            $('#Parada1').modal('show');

            break;

        case "Molorca Sur":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/molorca.jpg');
            $('#imgMapParada').attr('src', 'img/molorcaSurMap.png');
            $('#myModalLabel').html('Molorca Sur');
            $('#Parada1').modal('show');

            break;

        case "Molorca Norte":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/molorca-r.jpg');
            $('#imgMapParada').attr('src', 'img/molorcaNorteMap.png');
            $('#myModalLabel').html('Molorca Norte');
            $('#Parada1').modal('show');

            break;

        case "Pozuelos":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/pozuelos.jpg');
            $('#imgMapParada').attr('src', 'img/pozuelosMap.png');
            $('#myModalLabel').html('Pozuelos');
            $('#Parada1').modal('show');

            break;

        case "Tierra Adentro":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/tierra_adentro.jpg');
            $('#imgMapParada').attr('src', 'img/sierraMaestraTieA.png');
            $('#myModalLabel').html('Tierra Adentro');
            $('#Parada1').modal('show');

            break;

        case "Sierra Maestra":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            //$('#imgParada').attr('src','img/pozuelos.jpg');
            $('#imgMapParada').attr('src', 'img/sierraMaestraTieA.png');
            $('#myModalLabel').html('Sierra Maestra');
            $('#Parada1').modal('show');

            break;

        case "Bella Vista":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/bella_vista.jpg');
            $('#imgMapParada').attr('src', 'img/bellaVistaMap.png');
            $('#myModalLabel').html('Bella Vista');
            $('#Parada1').modal('show');

            break;

        case "Chuparín":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            //$('#imgParada').attr('src','img/sotillo.jpg');
            $('#imgMapParada').attr('src', 'img/chuparinMap.png');
            $('#myModalLabel').html('Chuparín');
            $('#Parada1').modal('show');

            break;

        case "Sotillo":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/sotillo.jpg');
            $('#imgMapParada').attr('src', 'img/sotillo.png');
            $('#myModalLabel').html('Sotillo');
            $('#Parada1').modal('show');

            break;

        case "El Pensíl":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/el_pensil.jpg');
            $('#imgMapParada').attr('src', 'img/elPensilMap.png');
            $('#myModalLabel').html('El Pensíl');
            $('#Parada1').modal('show');

            break;

        case "Alberto Lovera":

            $('#imgParada').removeAttr('src');
            $('#imgMapParada').removeAttr('src');
            $('#myModalLabel').empty();
            $('#imgParada').attr('src', 'img/alberto_lovera.jpg');
            $('#imgMapParada').attr('src', 'img/albertoLoveraMap.png');
            $('#myModalLabel').html('Alberto Lovera');
            $('#Parada1').modal('show');

            break;




    }



});