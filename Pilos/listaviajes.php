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
    <title>Vehiculos</title>
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
  include_once("../controller/lista_viajes_piloto.php");
  $resultado=$dt->num_rows;
  if($resultado>0){
    ?>
      <h1>Lista de Viajes</h1>
      <br>
      <div class="container-fluid">
      <input class="form-control" id="myInput" type="text" placeholder="buscar..">
      <br>
      <table class="table table-dark table-striped table-hover table-responsive-sm border="1" id="tabla_paginada">
            <thead>
              <td>Codigo envio</td>
              <td>Origen</td>
              <td>Destino</td>
              <td>Empresa</td>
              <td>Telefono 1</td>
              <td>Telefono 2</td>
              <td>Estado del viaje</td>
              <td>Ver gastos</td>
              <td>Agregar Gastos</td>
              <td>Iniciar</td>
            </thead>
      <?php
          while ($row=mysqli_fetch_array($dt)) {
                $id_envio=$row['id_envio'];
                $codigo=$row['codigo_envio'];
                $origen=$row['origen'];
                $destino=$row['destino'];
                $empresa=$row['empresa'];
                $tel1=$row['telefono_1'];
                $tel2=$row['telefono_2'];
                $estado=$row['estado_envio'];
                $estadobit=$row['estado_activo'];
            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $codigo;?></td>
                    <td><?php echo $origen;?></td>
                    <td><?php echo $destino;?></td>
                    <td><?php echo $empresa;?></td>
                    <td><?php echo $tel1;?></td>
                    <td><?php echo $tel2;?></td>
                    <td><?php echo $estado;?></td>
                    <?php 
                      if($estado=="Terminado"){
                        ?>
                        <td><a href="lista_gastos.php?id_envio=<?php echo $id_envio;?>"><button type="button" class="btn btn-info">Ver Gastos</button></a></td>
                        <td><a href="agregar_gasto.php?id_envio=<?php echo $id_envio;?>&d=<?php echo $_GET['id'];?>"><button type="button" class="btn btn-success">Gastos</button></a></td>
                        <td><a href="#"><button type="button" class="btn btn-danger" disable>Iniciar</button></a></td>
                        <?php
                      }
                      else{
                        if($estado=="Terminado" or $estado=="En Ruta"){
                          ?>
                          <td><a href="agregar_gasto.php?id_envio=<?php echo $id_envio;?>&d=<?php echo $_GET['id'];?>"><button type="button" class="btn btn-info">Ver Gastos</button></a></td>
                          <td><a href="agregar_gasto.php?id_envio=<?php echo $id_envio;?>&d=<?php echo $_GET['id'];?>"><button type="button" class="btn btn-success">Gastos</button></a></td>
                          <td><center><a href="#"><button type="button" class="btn btn-danger">Iniciar</button></a></center></td>
                          <?php
                        }
                        else{
                          ?>
                          <td><a href="#"><button type="button" class="btn btn-info">Ver Gastos</button></a></td>
                          <td><a href="#"><button type="button" class="btn btn-success">Gastos</button></a></td>
                          <td><center><a href="../controller/lista_viajes_piloto.php?id=<?php echo $id_envio;?>"><button type="button" class="btn btn-danger">Iniciar</button></a></center></td>
                          <?php
                        }
                      }
                    ?>
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
                    <br>
      
                    <a href="../views/ViewAdministrador.php"><button type="button" class="btn btn-warning btn-lg" >Regresar</button></a>
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
      <a href="../views/ViewAdministrador.php"><button type="button" class="btn btn-warning btn-lg" >Regresar</button></a>
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