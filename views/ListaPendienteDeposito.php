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
    <title>Lista de deposito</title>
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
        <a href="ViewAdministrador.php">
        <img src="../imagenes/logo.png" alt="HTML tutorial" style="width:52px;height:52px;">
        </a>
    <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
            <a class="nav-link" > <?php echo $us;?></a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" href="../index.php">Cerrar sesión</a>
        </li>
    </ul>

</nav>
<div class="container-fluid">
<?php
  include_once("../controller/pago_piloto.php");
  $resultado=$dt->num_rows;
  if($resultado>0){
    ?>
      <h1>Viajes listos para depositar</h1>
      <br>
      <div class="container-fluid">
      <input class="form-control" id="myInput" type="text" placeholder="buscar..">
      <br>
      <table class="table table-dark table-bordered table-responsive"  id="tabla_paginada">
            <thead>
              <td>No. de Viaje</td> 
              <td>Nombre de Operador</td>
              <td>Cliente</td>
              <td>País</td>
              <td>Adelanto</td>
              <td>Pendiente Complemento</td>
              <td>Total</td>
              <td>Renta de Caja</td>
              <td>Combustible</td>
              <td>Tipo de Cuenta</td>
              <td>Banco</td>
              <td>Cuenta Numero</td>
              <td>Cuentahabiente</td>
              <td>Telefono</td>
              <td>depositar</td>  
            </thead>
      <?php
          while ($row=mysqli_fetch_array($dt)) {
                $id_pago_piloto=$row['id_pago_piloto'];
                $id_envio=$row['id_envio'];
                $codigo_envio=$row['codigo_envio'];
                $id_piloto=$row['id_piloto'];
                $piloto=$row['piloto'];
                $id_clientes=$row['id_clientes'];
                $empresa=$row['empresa'];
                $origen=$row['origen'];
                $adelanto_piloto=$row['adelanto_piloto'];
                $pendiente_piloto=$row['pendiente_piloto'];
                $total_pago=$row['total_pago'];
                $renta_caja=$row['renta_caja'];
                $combustible=$row['combustible'];
                $tipo_cuenta=$row['tipo_cuenta'];
                $banco=$row['banco'];
                $no_cuenta=$row['no_cuenta'];
                $nombre_cuenta=$row['nombre_cuenta'];
                $tel_piloto=$row['tel_piloto'];


            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $codigo_envio?></td>
                    <td><?php echo $piloto?></td>
                    <td><?php echo $empresa?></td>
                    <td><?php echo $origen?></td>
                    <td><?php echo $adelanto_piloto?></td>
                    <td><?php echo $pendiente_piloto?></td>
                    <td><?php echo $total_pago?></td>
                    <td><?php echo $renta_caja?></td>
                    <td><?php echo $combustible?></td>
                    <td><?php echo $tipo_cuenta?></td>
                    <td><?php echo $banco?></td>
                    <td><?php echo $no_cuenta?></td>
                    <td><?php echo $nombre_cuenta?></td>
                    <td><?php echo $tel_piloto?></td>
                    <td><center><a href="detalle_caja.php?id=<?php ?>"><button type="button" class="btn btn-info">Seleccionar</button></a></center></td>
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