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
    <title>Encabezado</title>
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
        <a class="nav-link" href="../controller/login/login.php?log">Cerrar sesión</a>
        </li>
    </ul>

</nav>
<div class="container-fluid">
<?php
  include_once("../controller/encabezado.php");
  $resultado=$dt->num_rows;
  if($resultado>0){
    ?>
      <h1>Encabezado</h1>
      <center>
        <h2>Cuentas por Cobrar</h2>
      </center>
      <br>
      <div class="container mt-3">
      <input class="form-control" id="myInput" type="text" placeholder="buscar..">
      <br>
      <table class="table table-dark table-striped table-hover table-responsive-sm border="1" id="tabla_paginada">
            <thead>
              <td>Codigo Envio</td>
              <td>Cliente</td>
              <td>Moneda</td>
              <td>Total</td>
              <td>Saldo</td>
              <td>Fecha</td>
              <td>Estado de la Cuenta</td>
              <td>Lista de Detalles</td>
              <td>Agregar Detalle</td>
              <td>Eliminar Detalle</td>
            </thead>
      <?php
          while ($row=mysqli_fetch_array($dt)) {
            $id=$row['id_encabezado'];
            $envio=$row['codigo_envio'];
            $cliente=$row['cliente'];
            $total=$row['total'];
            $id_moneda=$row['id_tipo_moneda'];
            $tipo_moneda=$row['tipo'];
            $saldo=$row['pendiente'];
            $fecha=$row['fecha'];
            $estado_factura=$row['estado_factura'];
            
            $datos=array("cliente"=>$cliente,"total"=>$total,"estadof"=>$estado_factura,"saldo"=>$saldo,"envio"=>$envio,"id_moneda"=>$id_moneda,"tipo_moneda"=>$tipo_moneda);
            $comprimida=serialize($datos);
            $comprimida=urlencode($comprimida);
            
            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $envio?></td>
                    <td><?php echo $cliente?></td>
                    <td><?php echo $tipo_moneda?></td>
                    <td><?php echo $total?></td>
                    <td><?php echo $saldo?></td>
                    <td><?php echo $fecha?></td>
                    
                    <?php
                      if($estado_factura == 1){
                        ?>
                        <td><span class="badge badge-success">Cancelado</span></td>
                        <?php
                      }
                      else{
                        ?>
                        <td><span class="badge badge-danger">Pendiente de Pago</span></td>
                        <?php
                      }
                    ?>
                    
                    <td><center><a href="lista_detalle.php?id=<?php echo $id?>&envio=<?php echo $envio;?>&datos=<?php echo $comprimida;?>"><button type="button" class="btn btn-info">Detalles</button></a></center></td>
                    <td><center><a href="nuevo_detalle.php?id=<?php echo $id?>&tipo_moneda=<?php echo $tipo_moneda?>&id_moneda=<?php echo $id_moneda?>"><button type="button" class="btn btn-primary">Agregar Detalle</button></a></center></td>
                    <td><a href="../controller/nuevo_encabezado.php?id=<?php echo $id?>&es=E"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
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
                <a href="../envio/nuevo_encabezado.php"><button type="button" class="btn btn-success" >Nuevo Encabezado</button></a> 
                <a href="ViewAdministrador.php"><button type="button" class="btn btn-warning" >Regresar</button></a>                
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