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
    <title>Caja Seca</title>
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
        <a class="nav-link" href="../controller/login/login.php?log">Cerrar sesión</a>
        </li>
    </ul>

</nav>
<div class="container-fluid">
<?php
  include_once("../controller/caja.php");
  $resultado=$dt->num_rows;
  if($resultado>0){
    ?>
      <h1>Lista caja seca</h1>
      <br>
      <div class="container-fluid">
      <input class="form-control" id="myInput" type="text" placeholder="buscar..">
      <br>
      <table class="table table-dark table-striped table-hover table-responsive-sm border="1" id="tabla_paginada">
            <thead>
              <td>No. placa</td>
              <td>Tamaño</td>
              <td>Caat</td>
              <td>Tipo caja</td>
              <td>Estado</td>
              <td>Detalle</td>
              <td>Modificar</td>
              <td>Eliminar</td>
            </thead>
      <?php
          while ($row=mysqli_fetch_array($dt)) {
            $id=$row['id_caja_seca'];
            $placa=$row['no_placa'];
            $tamanio=$row['tamaño'];
            $caat=$row['numero_caat'];
            $tipo=$row['tipo_remolque'];
            $estado=$row['estado'];


            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $placa?></td>
                    <td><?php echo $tamanio?></td>
                    <td><?php echo $caat?></td>
                    <td><?php echo $tipo?></td>
                    <?php
                        if($estado=='0'){
                            ?>
                            <td><span class="badge badge-success">Disponible</span></td>
                            <?php
                        }
                        else
                        {
                            ?>
                            <td><span class="badge badge-danger">Ocupado</span></td>
                            <?php
                        }
                    ?>
                    <td><center><a href="detalle_caja.php?id=<?php echo $id?>"><button type="button" class="btn btn-info">Detalle</button></a></center></td>
                    <td><center><a href="agregar_caja.php?id=<?php echo $id?>"><button type="button" class="btn btn-warning">Modificar</button></a></center></td>
                    <td><center><a href="../controller/caja.php?id=<?php echo $id?>&es=E"><button type="button" class="btn btn-danger">Eliminar</button></a></center></td>
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
                    <a href="agregar_caja.php"><button type="button" class="btn btn-success" >Agregar Nuevo</button></a>
                    <a href="ViewVehiculos.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
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
      <a href="agregar_caja.php"><button type="button" class="btn btn-success btn-lg" >Agregar Nuevo</button></a>
      <a href="ViewVehiculos.php"><button type="button" class="btn btn-warning btn-lg" >Regresar</button></a>
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