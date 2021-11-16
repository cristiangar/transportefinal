<?php
include_once("../controller/reporte_general_envio.php");
if(isset($_SESSION['usuario']))
{
    $rol=$_SESSION['rol'];
    $us=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Viajes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link href="../css/index.css" rel="stylesheet"/>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <a href="../views/ViewAdministrador.php">
        <img src="../imagenes/logo.png" alt="HTML tutorial" style="width:52px;height:52px;">
        </a>
    <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
            <a class="nav-link" > <?php echo $us;?></a>
        </li>
        <li class="navbar-item">
        <a class="nav-link" href="../controller/login/login.php?log">Cerrar sesión</a>
        </li>
    </ul>

</nav>
<div class="container-fluid">
<?php
  $resultado=$dt2->num_rows;
  if($resultado>0){
    ?>
      <center>
      <h1>Lista de Viajes</h1>
      <br>
      </center>
                  <a href="exceldos.php"><button type="button" class="btn btn-primary" >Descargar Excel</button></a>
                  <br><br>
                
      <input class="form-control" id="myInput" type="text" placeholder="buscar..">
      <br>
      <div class="table-responsive">
      <table class="table table-dark table-striped table-hover table-responsive-sm border="1" id="tabla_paginada">
            <thead>
              <td>Codigo envio</td>
              <td>Fecha envio</td>
              <td>Cliente</td>
              <td>Telefono cliente</td>
              <td>Estado envio</td>
              <td>Renta de Caja</td>
              <td>Combustible</td>
              <td>Receptor</td>
              <td>Referencia</td>
              <td>Descripcion</td>
              <td>Origen</td>
              <td>Destino</td>
              <td>Vehiculo</td>
              <td>Placas</td>
              <td>Tipo Adiciona</td>
              <td>Placa</td>
              <td>Num Economico</td>
              <td>Operador</td>
              <td>Tel Operador</td>
              <td>Whatsapp</td>
              <td>Banco</td>
              <td>Nombre Cuenta</td>
              <td>Numero de Cuenta</td>
              <td>Tipo de Cuenta</td>
              
            </thead>
      <?php
          while ($row=mysqli_fetch_array($dt2)) {
            $id=$row['id_envio'];
            $codigo=$row['codigo_envio'];
            $fecha=$row['fecha_envio'];
            $cliente=$row['empresa'];
            $telefono=$row['tel'];
            $estado=$row['estado_envio'];
            $renta_caja=$row['renta_caja'];
            $combustible=$row['combustible'];
            $receptor=$row['nombre'];
            $referencia1=$row['referencia_1'];
            $descripcion=$row['descripcion'];
            $origen=$row['origen'];
            $destino=$row['destino'];
            $codigo_ruta=$row['codigo_ruta'];
            $tipo_vehiculo=$row['tipo_vehiculo'];
            $no_placa=$row['no_placa'];
            $tipo=$row['tipo'];
            $placa=$row['placa'];
            $nombre_piloto=$row['npiloto'];
            $telpiloto=$row['telpiloto'];
            $whatsapp=$row['whatsapp'];
            $banco=$row['banco'];
            $nombre_cuenta=$row['nombre_cuenta'];
            $numcuenta=$row['numcuenta'];
            $tipo_cuenta=$row['tipo_cuenta'];
            $numero_economico=$row['numero_economico'];
            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $codigo?></td>
                    <td><?php echo $fecha?></td>
                    <td><?php echo $cliente?></td>
                    <td><?php echo $telefono?></td>
                    <td><?php echo $estado?></td>
                    <td><?php echo $renta_caja?></td>
                    <td><?php echo $combustible?></td>
                    <td><?php echo $receptor?></td>
                    <td><?php echo $referencia1?></td>
                    <td><?php echo $descripcion?></td>
                    <td><?php echo $origen?></td>
                    <td><?php echo $destino?></td>
                    <td><?php echo $tipo_vehiculo?></td>
                    <td><?php echo $no_placa?></td>
                    <td><?php echo $tipo?></td>
                    <td><?php echo $placa?></td>
                    <td><?php echo $numero_economico?></td>
                    <td><?php echo $nombre_piloto?></td>
                    <td><?php echo $telpiloto?></td>
                    <td><?php echo $whatsapp?></td>
                    <td><?php echo $banco?></td>
                    <td><?php echo $nombre_cuenta?></td>
                    <td><?php echo $numcuenta?></td>
                    <td><?php echo $tipo_cuenta?></td>
                    
                  </tr>
                 </tbody>
            <?php

          }
               
                echo '</table>';

                ?>
                <div class="table-responsive">
                
                <!--<center>
                    <a href="../envio/agregar_envio.php"><button type="button" class="btn btn-success" >Agregar Nuevo</button></a>
                    <a href="ViewAdministrador.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                </center>-->
                <?php
  }
  else{
    ?> 
    <center>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br><br><br><br>
      <h1>No hay datos ingresados</h1>
      
      <a href="ViewAdministrador.php"><button type="button" class="btn btn-warning btn-lg" >Regresar</button></a>
    </center>
    <?php
  }
?>

</div>
</body>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</html>
<?php
}

else{/**else de la session */
    header("location: ../Index.php");
}/**ses */
?>