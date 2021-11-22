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
    <title>Vehículos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/imagen.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/index.js"></script>
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
            <a class="nav-link" >Lista de Veiculos</a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" ><?php echo $us;?></a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" href="../index.php">Cerrar sesión</a>
        </li>
        
    </ul>
</nav>

<div class="container-fluid">
<br>
<div class="container mt-3">
        
    <?php
      include_once('../controller/vehiculos_mantenimiento.php');
      $resultado=$dt->num_rows;

      if($resultado>0)
      {
        ?>
          <h1>Listas de Vehiculos</h1>
          <input class="form-control" id="myInput" type="text" placeholder="buscar..">
          <br>

          <table class="table table-dark table-striped table-hover table-responsive-sm" border="1" id="tabla_paginada">
                <thead>
                  <td>Placas</td>
                  <td>Tipo</td>
                  <td>Marca</td>
                  <td>Modelo</td> 
                 
                  <td>Modificar</td>
                  <td>Mantenimiento</td>
                  <td>Eliminar</td>
                </thead>
                <tbody id="myTable">
                  <?php
                  while($row=mysqli_fetch_array($dt) )
                  {
                    $id=$row['id_vehiculos_2'];
                    $marca=$row['marca'];
                    $modelo=$row['modelo'];
                    $placa=$row['no_placa'];
                    $tipo=$row['tipo']
                    ?>
                    <tr>
                    <td><?php echo $placa;?></td>
                    <td><?php echo $tipo;?></td>
                    <td><?php echo $marca;?></td>
                    <td><?php echo $modelo;?></td>
                                        
                    <td><center><a href="nuevo_vehiculo_mantenimiento.php?id=<?php echo $id?>"><button type="button" class="btn btn-primary">Modificar</button></a></center></td>
                    <td><center><a href="lista_mantenimiento.php?id=<?php echo $id?>"><button type="button" class="btn btn-info">Ver Mantenimientos</button></a></center></td>
                    <td><center><button type="button" class="btn btn-danger"  onclick="alerta()">Eliminar</button></center></td>
                    </tr>
                    <?php
                  }       
                  ?> 
                </tbody>
                <script>
                            function alerta()
                            {
                                var opcion = window.confirm("Esta seguro que desea eliminar los datos");
                                if (opcion == true) {
                                    self.location="../controller/vehiculos_mantenimiento.php?id=<?php echo $id?>&es"
                                   } 
                            }
                        </script>
                <tfoot>
                  <td><input type="button" id="cargar_primera_pagina" value="<< Primero"/></td>
                  <td><input type="button" id="cargar_anterior_pagina" value="< Anterior"/></td>
                  <td id="indicador_paginas"></td>
                  <td><input type="button" id="cargar_siguiente_pagina" value="Siguiente >"/></td>
                  <td><input type="button" id="cargar_ultima_pagina" value="Ultimo >>"/></td>
                </tfoot>
              </table>
              <div class="container-fluid">
                    <br>
                <center>
                    <a href="nuevo_vehiculo_mantenimiento.php"><button type="button" class="btn btn-success" >Agregar Nuevo</button></a>
                    <a href="../views/ViewAdministrador.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                    
                </center>
                </div>
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
          <a href="nuevo_vehiculo_mantenimiento.php"><button type="button" class="btn btn-success btn-lg" >Agregar Nuevo</button></a>
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

</body>
</html>
<?php
}

else{/**else de la session */
    header("location: ../Index.php");
}/**ses */
?>