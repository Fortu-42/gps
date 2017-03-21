
<?
include('includes/connection.php');

$query = "SELECT * FROM usuario";

$result = mysqli_query( $conn, $query );  //cambiar si no funciona, poner los parámetros al revés -> mysqli_query( $conn, $query );

 $array = array();

 $i = 0;

 if( mysqli_num_rows($result) > 0 ){

while($row= mysqli_fetch_assoc($result)){  
    $editar = '<a href="#" class="btn btn-primary" ><i class="fa fa-edit"></i></a>';
   $eliminar = '<a href="#" class="btn btn-danger  onclick="return confirm(\'¿Seguro que desea eliminiar este usuario?\')" data-toggle="tooltip"><i class="fa fa-remove"></i></a>';



       $arr = array(
        "id" => $row['id'] ,
        "nombre" => $row['nombre'],
        "nombreUsuario" =>$row['nombreUsuario'],
        "correo" => $row['correo'],
         "nombreUsuario" => $row['nombreUsuario'],
         "opt" => $editar." ".$eliminar,
       );



        $array[$i++] = $arr;

  }
}

  /*  $tabla.='{
      "id":"'.$row['id'].'",
      "nombre":"'.$row['nombre'].'",
      "nombreUsuario":"'.$row['nombreUsuario'].'",
      "correo":"'.$row['correo'].'",
      "nombreUsuario":"'.$row['nombreUsuario'].'" 
      },';

      $tabla = substr($tabla,0,strlen($tabla)- 1);*/

     // echo '{"data":['.$tabla.']}';
      
     echo json_encode($array);
 
//}}




?>