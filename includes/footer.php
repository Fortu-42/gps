
   
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrapValidator.min.js"></script>
    

<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.js"></script>  
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>-->
    
    <script>   
     $(document).ready(function() {





    $('#contactForm').bootstrapValidator({
        container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            fullName: {
                validators: {
                    notEmpty: {
                        message: 'Se Requiere Nombre Completo'
                    },
                    stringLength:{
                        max:30,
                        message: 'Disculpe, nombre muy largo'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Se requiere una dirección de correo electrónico'
                    },
                    emailAddress: {
                        message: 'La dirección de correo electrónico no es válida'
                    },
                     remote:{
                        url:'remote.php',
                        message: 'El email ya está registrado',
                        data:{
                            type:'username'
                        },
                        type: 'POST',
                        delay: 1000
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Debe Ingresar Una Contraseña'
                    }
                }
            },
            repassword: {
                validators: {
                    notEmpty: {
                        message: 'La confimación no puede estar vacía'
                    },
                    identical: {
                        field: 'password',
                        message: 'Las contraseñas no coinciden'
                    },
                    different: {
                        field: 'username',
                        message: 'La contraseña no puede ser la misma al nombre de usuario'
                    }
                }
            },
            username:{
                validators:{
                    notEmpty:{
                        message: 'Ingrese un nombre de Usuario'
                    },
                    remote:{
                        url:'remote.php',
                        message: 'Usuario no disponible',
                        data:{
                            type:'username'
                        },
                        type: 'POST',
                        delay: 1000
                    }
                }
            }
        }
    })
    .on('success.falidator.fv', function(e,data){
        if ((data.field === 'username'|| data.field === "email")
                && data.validator === 'remote'
                && (data.result.available === false || data.result.available === 'false'))
            {
                // The userName field passes the remote validator
                data.element                    // Get the field element
                    .closest('.form-group')     // Get the field parent

                    // Add has-warning class
                    .removeClass('has-success')
                    .addClass('has-warning')

                    // Show message
                    .find('small[data-fv-validator="remote"][data-fv-for="username"]')
                        .show();
            }else{
                data.element.closest('.form-group').removeClass('has-warning').addClass('has-success')
            }
        })
        // This event will be triggered when the field doesn't pass given validator
        .on('err.validator.fv', function(e, data) {
            // We need to remove has-warning class
            // when the field doesn't pass any validator
            if (data.field === 'username') {
                data.element
                    .closest('.form-group')
                    .removeClass('has-warning');
            }
        });

    
});

    </script>
  <!-- <script type="text/javascript" src="../js/scripts.js"></script>-->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
  </body>
</html>
