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
    <title>Bitácoras</title>
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
        <a href="../views/ViewAdministrador.php">
        <img src="../imagenes/logo.png" alt="HTML tutorial" style="width:52px;height:52px;">
        </a>
    <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
            <a class="nav-link" ><?php echo $us;?></a>
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
    include_once("../models/ClassMantenimiento.php");
    $cliente=new mantenimiento();
    $dt=$cliente->VerMantenimientosVehiculo($id);

    
            
        /*}*/

        ?>
        <form method="POST" action="../controller/vehiculos_mantenimiento.php?id2=<?php echo $id2?>&id=<?php echo $id?>">
          <center>
            <br>
          <h1>Listado de Detalles</h1>
          </center>
      <br>
      <table class="table table-dark table-striped table-hover table-responsive-sm border="1" id="tabla_paginada">

            <thead> 
              <center><td>Fecha</td></center>  
              <center><td>Descripción</td></center>
              <center><td>Moneda</td></center>
              <center><td>Costo</td></center>
              <center><td>No. Factura</td></center>
              <center><td>Ver Factura</td></center>
              
            </thead>
          
      <?php

            while ($row=mysqli_fetch_array($dt)) {
            $id2=$row['id_mantenimiento'];
            $fecha=$row['fecha']; 
            $descripcion=$row['descripcion'];
            $costo=$row['costo']; 
            $no_factura=$row['no_factura'];
            $id=$row['id_vehiculos_2'];
            $tipo_moneda=$row['id_tipo_moneda'];
            $tipo_m=$row['tipo'];
            $imagen_factura=$row['imagen_factura'];
            ?>
                  <tbody id="myTable">
                  <tr>

                    <td><?php echo $fecha?></td>
                    <td><?php echo $descripcion?></td>
                    <td><?php echo $tipo_m?></td>
                    <td><?php echo $costo?></td>
                    <td><?php echo $no_factura?></td>
                    <td><a href="<?php echo  $imagen_factura;?>" download="Factura">
                <button type="button" class="btn btn-primary">Descargar Factura</button></td>
                    
                    <!--<td><center><a href="nuevo_mantenimiento.php?id=<?php echo $id?>&mod=M&id2=<?php echo $id2?>"><button type="button" class="btn btn-warning">Modificar</button></a></center></td>-->
                    <td><button type="button" class="btn btn-danger"  onclick="alerta()">Eliminar</button></td>
                  </tr>
                 </tbody>
                 <script>
                            function alerta()
                            {
                                var opcion = window.confirm("Esta seguro que desea eliminar los datos");
                                if (opcion == true) {
                                    self.location="../controller/mantenimiento.php?id2=<?php echo $id2?>&es=E&id=<?php echo $id?>"
                                   } 
                            }
                        </script>
            <?php

          }
               
                echo '</table>';
            ?>
            <center>
                <a href="nuevo_mantenimiento.php?id=<?php echo $id?>"><button type="button" class="btn btn-primary">Nuevo Registro</button></a>
                
                <a href="lista_vehiculos.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                
                
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
      <a href="nuevo_mantenimiento.php"><button type="button" class="btn btn-success" >Agregar Nuevo</button></a>
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