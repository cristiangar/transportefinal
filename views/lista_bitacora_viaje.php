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
    <title>Bitácora</title>
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
  if(isset($_GET['id'])){/*este id es mi id_encabezado*/
     $id= $_GET['id'];
    //busco los datos para mostrar
    include_once("../models/ClassBitacora.php");
    $cliente=new bitacora();
    $dt=$cliente->VerBitacorasViaje($id);

        ?>
        
          <center>
            <br>
          <h1>Bitacora de viaje </h1>
          
          </center>
      <br>
      <table class="table table-dark table-striped table-hover table-responsive-sm border="1" id="tabla_paginada">

            <thead> 
              <center><td>Código Viaje</td></center>  
              <center><td>Fecha</td></center>
              <center><td>Hora</td></center>
              <center><td>Descripción</td></center>
              
            </thead>
          <?php

            while ($row=mysqli_fetch_array($dt)) {
            $id2=$row['id_bitacora'];
            $descripcion=$row['descripcion'];
            $fecha=$row['fecha']; 
            $hora=$row['hora'];
            $id=$row['id_envio'];
            $codigoenvio=$row['codigo_envio'];
            ?>
      
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $codigoenvio?></td>
                    <td><?php echo $fecha?></td>
                    <td><?php echo $hora?></td>
                    <td><?php echo $descripcion?></td>
                    
                    <td><center><a href="nueva_bitacora.php?id=<?php echo $id?>&mod=M&id2=<?php echo $id2?>"><button type="button" class="btn btn-warning">Modificar</button></a></center></td>
                    <td><a href="../controller/bitacora.php?id2=<?php echo $id2?>&es=E&id=<?php echo $id?>"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
                  </tr>
                 </tbody>
            <?php

          }
               
                echo '</table>';
            ?>
            <center>
                <a href="nueva_bitacora.php?id=<?php echo $id?>"><button type="button" class="btn btn-primary">Nuevo Registro</button></a>
                
                <a href="lista_bitacora.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                
                
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
      <h1>No hay datos en la bitácora</h1>
      <a href="nueva_bitacora.php"><button type="button" class="btn btn-success" >Agregar Nuevo</button></a>
      <a href="bitacora.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
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