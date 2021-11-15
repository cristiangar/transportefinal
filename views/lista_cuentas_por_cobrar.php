<?php
session_start();
if(isset($_SESSION['usuario']))
{
    $rol=$_SESSION['rol'];
    $us=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cuentas por Cobrar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="../css/index.css" rel="stylesheet"/>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <a href="secritaria.php">
        <img src="../imagenes/logo.png" alt="HTML tutorial" style="width:52px;height:52px;">
        </a>
    <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
            <a class="nav-link" >Usuario: <?php echo $us;?></a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" href="../index.php">Cerrar sesión</a>
        </li>
    </ul>

</nav>
<div class="container-fluid">
<?php
  include_once("../controller/cuentas_por_cobrar.php");
  $resultado=$dt2->num_rows;
  if($resultado>0){
    ?>
      <h1>Cuentas por Cobrar</h1>
      <br>
      <div class="container mt-3">
      <input class="form-control" id="myInput" type="text" placeholder="buscar..">
      <br>
      <table class="table table-dark table-striped table-hover table-responsive-sm border="1" id="tabla_paginada">
            <thead>
              <td>No. de Viaje</td>
              <td>Cliente</td>
              <td>Total</td>
              <td>Saldo</td>
              <td>Fecha Inicial</td>
              <td>Estado de la Cuenta</td>
              <td>Lista de Abonos</td>
              <td>Nuevo Abono</td>
            </thead>
      <?php
          while ($row=mysqli_fetch_array($dt2)) {
            $id=$row['id_cuentas_por_cobrar'];
            $cliente=$row['empresa'];
            $id_moneda=$row['id_tipo_moneda'];
            $tipo_moneda=$row['tipo'];
            $total=$row['total'];
            $saldo=$row['pendiente'];
            $fecha_inicio=$row['fecha'];
            $estado_factura=$row['estado_factura'];
            $noviaje=$row['codigo_envio'];
            
            $datos2=array("cliente"=>$cliente,"total"=>$total,"estadof"=>$estado_factura,"saldo"=>$saldo,"envio"=>$noviaje,"id_moneda"=>$id_moneda,"tipo_moneda"=>$tipo_moneda);
            $comprimida=serialize($datos2);
            $comprimida=urlencode($comprimida);

            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $noviaje?></td>
                    <td><?php echo $cliente?></td>
                    <td><?php echo $tipo_moneda?></td>
                    <td><?php echo $total?></td>
                    <td><?php echo $saldo?></td>
                    <td><?php echo $fecha_inicio?></td>
                    
                    <?php
                      if($estado_factura == 1){
                        ?>
                        <td><span class="badge badge-success">Cancelado</span></td>
                        <?php
                      }
                      else{
                        ?>
                        <td><span class="badge badge-danger">Pendiente de pago</span></td>
                        <?php
                      }
                    ?>
                    
                    <td><center><a href="lista_abonos_cxc.php?id=<?php echo $id?>&datos2=<?php echo $comprimida;?>"><button type="button" class="btn btn-info">Detalle de Abonos</button></a></center></td>
                    <td><center><a href="nuevo_abono.php?id=<?php echo $id?>&id_moneda=<?php echo $id_moneda?>&tipo_moneda=<?php echo $tipo_moneda?>"><button type="button" class="btn btn-primary">Nuevo Abono</button></a></center></td>
                  </tr>
                 </tbody>
            <?php

          }
               echo '<tfoot>';
                echo  '<td><input type="button" id="cargar_primera_pagina" value="<< Primero"/></td>';
                echo  '<td><input type="button" id="cargar_anterior_pagina" value="< Anterior"/></td>';
                echo  '<td id="indicador_paginas"></td>';
                echo  '<td><input type="button" id="cargar_siguiente_pagina" value="Siguiente >"/></td>';
                echo  '<td><input type="button" id="cargar_ultima_pagina" value="Ultimo >>"/></td>';
                echo'</tfoot>';
                echo '</table>';
                ?>
            <center>
                <a href="../envio/nuevo_encabezado.php"><button type="button" class="btn btn-success btn-lg" >Agregar Nuevo</button></a> 
                <a href="ViewAdministrador.php"><button type="button" class="btn btn-warning btn-lg" >Regresar</button></a>
                
                
            </center>
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
      <br>
      <br>
      <a href="../envio/nuevo_encabezado.php"><button type="button" class="btn btn-success btn-lg" >Agregar Nuevo</button></a>
      <a href="secritaria.php"><button type="button" class="btn btn-warning btn-lg" >Regresar</button></a>
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