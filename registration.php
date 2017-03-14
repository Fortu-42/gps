<?php


  include('includes/connection.php');

  include('includes/functions.php');

  if(isset($_POST['new'] ) ){

   $name =  $username = $password = $repassword = $email = "";

   if( !$_POST["name"] ) {
       $nameError = "Please enter a name <br>";
   } else {
       $name = validateFormData( $_POST["name"] );
   }

   if( !$_POST["username"] ) {
       $usernameError = "Please enter a username <br>";
   } else {
       $username = validateFormData( $_POST["username"] );
   }

   if( !$_POST["password"] ) {
       $passwordError = "Ingrese una contraseña válida <br>";

   } elseif ($_POST["password"] == $_POST["repassword"]) {
       $password = validateFormData( $_POST["password"] );
       $password = password_hash($password, PASSWORD_DEFAULT);

     }elseif ($_POST["password"] =! $_POST["repassword"]) {
       $passwordError = "Las contraseñas no coinciden <br>";
     }


   if( !$_POST["email"]) {
       $emailError = "Please enter a valid Email <br>";
   } else {
       $email = validateFormData( $_POST["email"] );
       if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
          $emailError = "Please enter a valid Email <br>";
          $email = false;
       }
   }

    if($name && $username && $email && $password){
      $query = "INSERT INTO user (id, name, username, email, password, signup_date)
      VALUES (NULL, '$name', '$username', '$email', '$password', CURRENT_TIMESTAMP)";
    }

    $result = mysqli_query( $conn, $query);
    if ($result) {

      header( "Location: login.php?alert=success" );
    }else{
      echo "Error: ". $query . "<br>" . mysqli_error($conn);
    }
  }


  mysqli_close($conn);

  include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <div class="page-header">
                <h2>Using Ajax to submit data</h2>
            </div>

            <form id="defaultForm" method="post" class="form-horizontal" action="ajaxSubmit.php">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Username</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="username" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Email address</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control" name="email" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-3 control-label">Password</label>
                    <div class="col-lg-5">
                        <input type="password" class="form-control" name="password" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-9 col-lg-offset-3">
                        <button type="submit" class="btn btn-primary">Sign up</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include ('includes/footer.php'); ?>