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
      <h1>Lista de Viajes a terminar</h1>
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
              <td>Terminar</td>
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
                    <td><center><a href="../controller/lista_viajes_piloto.php?id=<?php echo $id_envio;?>&ter"><button type="button" class="btn btn-info">Terminar</button></a></center></td>
                  </tr>
                 </tbody>
            <?php

          }
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



</html>
<?php
}

else{/**else de la session */
    header("location: ../Index.php");
}/**ses */
?>