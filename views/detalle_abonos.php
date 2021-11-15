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
    <title>Personal</title>
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
  include_once("../controller/abonos.php");
  $id=$_GET['id'];/**id del pago de pilotos */
  $id_moneda=$_GET['moneda'];
  $abono=new abonos();
  $dt=$abono->VerUno($id);
  $resultado=$dt->num_rows;
  if($resultado>0){
   /* while($row2=mysqli_fetch_array($dt)){
      $pendite=$row2['pendiente_piloto'];
      $total=$row2['total_pago'];
    }*/
    ?>
      <h1>abonos</h1>
      <br>
      <div class="container-fluid">
      <input class="form-control" id="myInput" type="text" placeholder="buscar..">
      <br>
      <table class="table table-dark table-striped table-hover table-responsive-sm" border="1" id="tabla_paginada">
            <thead>
              <td>Fecha abono</td>
              <td>Descripción</td>
              <td>Abono</td>
              
              <td>Eliminar</td>
            </thead>
      <?php
          while ($row=mysqli_fetch_array($dt)) {
                $id_abono=$row['id_abono_piloto'];
                $fecha=$row['fecha_abono'];
                $descripcion=$row['descripcion'];
                $abono=$row['abono'];
                $total=$row['total_pago'];
                $pendite=$row['pendiente_piloto'];
            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $fecha;?></td>
                    <td><?php echo $descripcion;?></td>
                    <td><?php echo $abono;?></td>
                    <td><center><a href="../controller/abonos.php?id=<?php echo $id_abono;?>&es=<?php echo $id;?>"><button type="button" class="btn btn-danger">Eliminar</button></a></center></td>     
                  </tr>
                 </tbody>
            <?php

          }

                echo '</table>';
                ?>
                      <br>
                      <h1>Tolal: <?php echo $total;?></h1>
                      <br>
                      <h2>Pendiente: <?php echo $pendite;?></h2>
                      <br>
                <center>
                    <a href="Agregar_abono.php?id=<?php echo $id;/*id pago del piloto*/?>&moneda=<?php echo $id_moneda;?>&t=<?php echo $total;?>&p=<?php echo $pendite;?>"><button type="button" class="btn btn-success" >Agregar abono</button></a>
                    <a href="ListaPagoPilotos.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
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
       <a href="Agregar_abono.php?id=<?php echo $id;?>&moneda=<?php echo $id_moneda;?>"><button type="button" class="btn btn-warning btn-lg" >Agregar abono</button></a>
       <a href="ListaPagoPilotos.php"><button type="button" class="btn btn-warning btn-lg" >Regresar</button></a>
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