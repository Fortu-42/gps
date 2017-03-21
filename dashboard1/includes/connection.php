<?php

$sever ="localhost";
$username= "root";
$password="root";
$db="tecnobus";

$conn = mysqli_connect($server, $username, $password, $db);

if (!$conn) {
    die("connection failed: ". mysqli_connect_error());
}

?>

<?php

/*function conn(){
    $db=mysql_connect("localhost","root","root") or die("No se conecto al servidor");
            mysql_select_db("tecnobus",$db) or die ("No se conecto a la base de datos");
            return $db;
}
$conn=conn();*/
?>