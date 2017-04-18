
<?php

 include('includes/header.php');
      $confirm2 = " <button type='submit' class='btn btn-danger btn-sm' name='update'>Actualizar</button>";
      
    $confirm = " <button type='submit' class='btn btn-danger btn-sm' name='confirm-delete'>Eliminar</button>";
                        
   $cancel =  "  <button class='btn btn-default btn-sm' data-dismiss='modal'>Cancelar</button>";
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

      <a class="navbar-brand" href="index.php"><i class="fa fa-bus fa-2" aria-hidden="true"></i> TecnoBus GPS</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


    
      <ul class="nav navbar-nav navbar-right">

        <li><a href="#"><i class="fa fa-binoculars" aria-hidden="true"></i>Encontrar Parada</a></li>
        <li><a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i> Planear Viaje</a></li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i>Menú<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="usuarios.php"><i class="fa fa-user" aria-hidden="true"></i> Gestionar Usuario</a></li>
            <li><a href="unidades.php"><i class="fa fa-bus" aria-hidden="true"></i> Gestionar unidades </a></li>
          <!--  <li><a href="#"><i class="fa fa-street-view" aria-hidden="true"></i> Gestionar Paradas </a></li>-->
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
 <form action='eliminarUsuario.php' method='post'>
    <div class="modal-dialog modal-lg" role="document">

      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">Eliminar usuario ID: <span name="uid" id="uid"></span>  </h4>
        </div>


  
      <div class="modal-body">
     

          <h1><p>Seguro desea borrar?</p></h1>
          <input name="uid" value="" type="hidden">
          </div>
            


            
          

      
          <div class="modal-footer">
            
              <?php echo $confirm; ?>
              <?php echo $cancel; ?>
            
          </div>
         

    </div>
     </form>
</div>

</div>




<div class="modal fade" id="mod_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <form action='modificarUsuario.php' method='post'>
    <div class="modal-dialog modal-lg" role="document">

      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center" id="myModalLabel">Actualizar usuario ID: <span name="uid" id="uid"></span>  </h4>
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

        

                <div class="form-group">
                  <div class="col-xs-12">
                   <input type="hidden" class="form-control" name="uid"/>
                    <input type="text" class="form-control" name="nombre"  placeholder="Nombre y Apellido"/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                      <input type="text" class="form-control" name="usuario"  placeholder="Nombre de Usuario"/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-xs-12">
                    <input type="text" class="form-control" name="correo"  placeholder="E-mail" />
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
            
              <?php echo $confirm2; ?>
              <?php echo $cancel; ?>
            
          </div>
        

    </div>
      </form>
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