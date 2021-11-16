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
    <title>Abonos</title>
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
  if(isset($_GET['id'])){
     $id= $_GET['id'];

     $detalle=stripslashes($_GET['datos2']);
     $arreglo=unserialize($detalle);
 
   $cliente1=$arreglo['cliente'];
   $codigo=$arreglo['envio'];
   $total=$arreglo['total'];
   $saldo=$arreglo['saldo'];
   $estado_factura=$arreglo['estadof'];
   $id_moneda2=$arreglo['id_moneda'];
   $tipo_moneda2=$arreglo['tipo_moneda'];

    //busco los datos para mostrar
    include_once("../models/ClassCuentasCobrar.php");
    $cliente=new cuenta();
    $dt=$cliente->VerUnCliente($id);

    
            
        /*}*/

        ?>
        <h1>Cliente:       <?php echo $cliente1; ?></h1>
      <h2>codigo envio:  <?php echo $codigo; ?></h2>
      <h2>total a pagar: <?php echo $total; ?></h2>
      <h2>saldo:         <?php echo $saldo ?></h2>

        <form method="POST" action="../controller/cuentas.php?id2=<?php echo $id2?>">
          <center>
            <br>
          <h1>Listado de Abonos</h1>
          </center>
      <br>
      <table class="table table-dark table-striped table-hover table-responsive-sm border="1" id="tabla_paginada">

            <thead> 
              <center><td>Cantidad</td></center>
              <center><td>Fecha</td></center>
              <center><td>Eliminar</td></center>
            </thead>
          
      <?php

            while ($row=mysqli_fetch_array($dt)) {
            $id2=$row['id_abono_cuentas_por_cobrar'];
            $cantidad=$row['cantidad'];
            $fecha=$row['fecha']; 
            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $cantidad?></td>
                    <td><?php echo $fecha?></td>
           
                    <td><a href="../controller/cuentas_por_cobrar.php?id2=<?php echo $id2?>&es=E&id=<?php echo $id?>"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
                  </tr>
                 </tbody>
            <?php

          }
               
                echo '</table>';
            ?>
            <center>
                <a href="nuevo_abono.php?id=<?php echo $id?>&id_moneda=<?php echo $id_moneda2?>&tipo_moneda=<?php echo $tipo_moneda2?>"><button type="button" class="btn btn-primary">Abonar</button></a>
                
                <a href="lista_cuentas_por_cobrar.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                
                
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
      <h1>no hay datos ingresados</h1>
      <a href="nuevo_abono.php"><button type="button" class="btn btn-success" >Agregar Nuevo</button></a>
      <a href="cuentas.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
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