<?
include('includes/connection.php');

$query = "SELECT * FROM unidades";

$result = mysqli_query( $conn, $query );  

 $array = array();

 $i = 0;

 if( mysqli_num_rows($result) > 0 ){

while($row= mysqli_fetch_assoc($result)){  

  
    $editar = '<a class="btn btn-primary" data-toggle="modal" onclick="javascript:modUnd(\''.$row['idUnidad'].'\',\''.$row['cantPuestos'].'\',\''.$row['ipDispGPS'].'\',\''.$row['identificacion'].'\'); return false;" data-target="#modUnd"><i class="fa fa-edit"></i></a>';
   $eliminar = '<a  class="btn btn-danger "  data-toggle="modal" onclick=javascript:delUnd('.$row['idUnidad'].');return false;  data-target="#delUnd"  data-toggle="tooltip"><i class="fa fa-remove"></i></a>';

       $arr = array(
        "idUnidad"       => $row['idUnidad'] ,
        "cantPuestos"    => $row['cantPuestos'],
        "ipDispGPS"      => $row['ipDispGPS'],
        "identificacion" => $row['identificacion'],
         "opt"           => $editar." ".$eliminar,
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


mysqli_close($conn);

?>
