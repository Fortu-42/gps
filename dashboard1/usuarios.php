
<?php

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

      <a class="navbar-brand" href="#"><i class="fa fa-bus fa-2" aria-hidden="true"></i> TecnoBus GPS</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


    
      <ul class="nav navbar-nav navbar-right">

        <li><a href="#"><i class="fa fa-binoculars" aria-hidden="true"></i>Encontrar Parada</a></li>
        <li><a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i> Planear Viaje</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i>Menú<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i> Gestionar Usuario</a></li>
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

<div class="col-md-8 col-md-offset-2" style="margin-top:100px;">
    <h1>Usuarios
        <!--<a href="registrousuario.php" class="btn btn-primary pull-right menu"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Nuevo usuario</a>-->
    </h1>  
</div>
<div class="col-md-8 col-md-offset-2">  

    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Nombre de Usuario</th>
            <th>Correo</th>          
            <th>Opción</th>     
        </tr>
        </thead>
        <tbody>
        
        </tbody>
        <tfoot>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Nombre de Usuario</th>
            <th>Correo</th>
            <th>Opción</th>            
        </tr>
        </tfoot>
    </table>        

</div>

<div class="modal fade" id="confirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

    <div class="modal-dialog modal-lg" role="document">

      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">Eliminar usuario ID: </h4>
        </div>

      <div class="modal-body">
        <form action='eliminarUsuario.php' method='post'>

          <h1><p>Seguro desea borrar?</p></h1>

          <div>
            <p><span name="uid" id="uid"></span></p>
          </div>


      
          <div class="modal-footer">
            
              <?php echo $confirm; ?>
              <?php echo $cancel; ?>
            
          </div>
          </form>

    </div>
</div>

<?php include('includes/footer.php'); ?>


<script>
$(document).ready(function () {
  
    $('[data-toggle="tooltip"]').tooltip(); 

    var dataTable = $('#example').DataTable( {		
		  "ajax": {
        "type": "POST",
			  "url": "userdata.php",
        dataSrc: ''
		  },					
		"columns": [
			{  data: "id" },
			{  data: "nombre" },
			{  data: "nombreUsuario" },
			{  data: "correo" },
      {  data: "opt" }
			]
	});

});

</script>
</body>
</html>