<?php 
include_once("plantilla.php");
include_once("../controller/reportes.php");
$id=$_GET['id'];
 while($row=mysqli_fetch_array($dt)){
    $codigo=$row['codigo_envio'];
    $fecha=$row['fecha_envio'];
    $cliente=$row['empresa'];
    $receptor=$row['nombre'];
    $referencia1=$row['referencia_1'];
    $referencia2=$row['referencia_2'];
    $cod_ruta=$row['codigo_ruta'];
    $origen=$row['origen'];
    $destino=$row['destino'];
    $descripcion=$row['descripcion'];
    $vehiculo=$row['tipo_vehiculo'];
    $piloto=$row['npiloto'];
    $placa=$row['no_placa'];
    $fa=$row['fechaA'];
    $renta_caja=$row['renta_caja'];
    $combustible=$row['combustible'];
    $adelanto=$row['adelanto_piloto'];
    $pendiente=$row['pendiente_piloto'];
    $total=$row['total_pago'];
    if(($vehiculo=="Cabezal") or ($vehiculo=="cabezal") or ($vehiculo=='CABEZAL'))
    {
        $plataforma=$row['tipo'];
         $placa_plataforma=$row['placa'];
    }
    else
    {
        $plataforma="N/A";
        $placa_plataforma="N/A";
    }
    $estado_envio=$row['estado_envio'];
 }

?>