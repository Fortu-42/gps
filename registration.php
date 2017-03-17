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

<form id="contactForm" method="post" class="form-horizontal">
    <div class="form-group">
        <label class="col-md-3 control-label">Full name</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="fullName" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Email</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="email" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Title</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="title" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Content</label>
        <div class="col-md-6">
            <textarea class="form-control" name="content" rows="5"></textarea>
        </div>
    </div>
  
    
        <div class="col-md-9 col-md-offset-3">
            <button type="submit" class="btn btn-default">Validate</button>
        </div>
    </div>
</form>

  </body>
</html>
<?php  include ('includes/footer.php'); ?>