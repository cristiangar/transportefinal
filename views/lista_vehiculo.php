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
            <a class="nav-link" href="../index.php">Cerrar sesión</a>
        </li>
    </ul>

</nav>
<div class="container-fluid">
<?php
  include_once("../controller/vehiculo.php");
  $resultado=$dt->num_rows;
  if($resultado>0){
    ?>
      <h1>Lista de vehiculos</h1>
      <br>
      <div class="container-fluid">
      <input class="form-control" id="myInput" type="text" placeholder="buscar..">
      <br>
      <table class="table table-dark table-striped table-hover table-responsive-sm border="1" id="tabla_paginada">
            <thead>
              <td>No. placa</td>
              <td>Marca</td>
              <td>Codigo aduanero</td>
              <td>Codigo transporte</td>
              <td>Caat</td>
              <td>Estado</td>
              <td>Detalle</td>
              <td>Modificar</td>
              <td>Eliminar</td>
            </thead>
      <?php
          while ($row=mysqli_fetch_array($dt)) {
            $id=$row['id_vehiculo'];
            $placa=$row['no_placa'];
            $marca=$row['marca'];
            $modelo=$row['modelo'];
            $tonelaje=$row['tonelaje'];
            $ejes=$row['ejes'];
            $color=$row['color'];
            $tipo=$row['tipo_vehiculo'];
            $imagen_tarjeta=$row['imagen_targeta_circulacion'];
            $cod_aduanero=$row['codigo_aduanero'];
            $cod_transporte=$row['codigo_transporte'];
            $caat=$row['numero_caat'];
            $documento_caat=$row['documento_caat'];
            $estado=$row['estado'];
            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $placa?></td>
                    <td><?php echo $marca?></td>
                    <td><?php echo $cod_aduanero?></td>
                    <td><?php echo $cod_transporte?></td>
                    <td><?php echo $caat?></td>
                    <?php
                        if($estado==1){
                            ?>
                            <td><span class="badge badge-success">Disponible</span></td>
                            <?php
                        }
                        else
                        {
                            ?>
                            <td><span class="badge badge-success">Ocupado</span></td>
                            <?php
                        }
                    ?>
                    <td><center><a href="detalle_vehiculo.php?id=<?php echo $id?>"><button type="button" class="btn btn-info">Detalle</button></a></center></td>
                    <td><center><a href="agregar_vehiculo.php?id=<?php echo $id?>"><button type="button" class="btn btn-warning">Modificar</button></a></center></td>
                    <td><center><a href="../controller/vehiculo.php?id=<?php echo $id?>&es=E"><button type="button" class="btn btn-danger">Eliminar</button></a></center></td>
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
                    <a href="agregar_vehiculo.php"><button type="button" class="btn btn-success" >Agregar Nuevo</button></a>
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
      <a href="agregar_vehiculo.php"><button type="button" class="btn btn-success btn-lg" >Agregar Nuevo</button></a>
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