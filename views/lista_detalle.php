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
    <title>Detalles</title>
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
     $id= $_GET['id'];/**id del encabezado */
     $detalle=stripslashes($_GET['datos']);
     $arreglo=unserialize($detalle);
 
   $cliente1=$arreglo['cliente'];
   $codigo=$arreglo['envio'];
   $total=$arreglo['total'];
   $saldo=$arreglo['saldo'];
   $estado_factura=$arreglo['estadof'];
   $id_moneda2=$arreglo['id_moneda'];
   $tipo_moneda2=$arreglo['tipo_moneda'];


    //busco los datos para mostrar
    include_once("../models/ClassEncabezado.php");
    $cliente=new encabezado();
    $dt=$cliente->VerDetalles($id);
        ?>
      <h1>Cliente:       <?php echo $cliente1; ?></h1>
      <h2>codigo envio:  <?php echo $codigo; ?></h2>
      <h2>total a pagar: <?php echo $total; ?></h2>
      <h2>saldo:         <?php echo $saldo ?></h2>
      <h2>estado de la factura: <?php echo $estado_factura;?></h2>
      <table class="table table-dark table-striped table-hover table-responsive-sm border=1" id="tabla_paginada">
      <h3>Listado de Detalles</h3>
            <thead> 
              <center><td>Descripción</td></center>
              <center><td>Sub-Total</td></center>
            </thead>       
      <?php

            while ($row=mysqli_fetch_array($dt)) {
            $id2=$row['id_detalle'];
            $descripcion=$row['descripcion'];
            $subtotal=$row['sub_total']; 
            $id=$row['id_encabezado'];
            $id_moneda=$row['id_tipo_moneda'];
            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $descripcion?></td>
                    <td><?php echo $subtotal?></td> 
                    <td><center><a href="nuevo_detalle.php?id=<?php echo $id?>&mod=M&id2=<?php echo $id2?>&tipo_moneda=<?php echo $tipo_moneda2?>&id_moneda=<?php echo $id_moneda2?>"><button type="button" class="btn btn-warning">Modificar</button></a></center></td>
                    <td><a href="../controller/encabezado.php?id2=<?php echo $id2?>&es=E&id=<?php echo $id?>"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
                  </tr>
                 </tbody>
            <?php

          }
               
                echo '</table>';
            ?>
            <center>
                <?php
                  if($estado_factura == 1)
                  {
                    ?>
                     <a href="../Reportes/recibo.php?id=<?php echo $id;?>"target='_blank'><button type="button" class="btn btn-info" >Imprimir</button></a> 
                     <a href="nuevo_detalle.php?id=<?php echo $id?>&tipo_moneda=<?php echo $tipo_moneda2?>&id_moneda=<?php echo $id_moneda2?>"><button type="button" class="btn btn-primary">Nuevo Detalle</button></a>
                     <a href="lista_encabezados.php"><button type="button" class="btn btn-warning" >Regresar</button></a> 
                    <?php

                  }
                  else{
                    ?>
                    <a href="nuevo_detalle.php?id=<?php echo $id?>&tipo_moneda=<?php echo $tipo_moneda2?>&id_moneda=<?php echo $id_moneda2?>"><button type="button" class="btn btn-primary">Nuevo Detalle</button></a>
                    <a href="lista_encabezados.php"><button type="button" class="btn btn-warning" >Regresar</button></a> 
                    <?php
                  }
                ?>
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
      <a href="nuevo_abono.php"><button type="button" class="btn btn-success" >Agregar Nuevo</button></a>
      <a href="lista_encabezados.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
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