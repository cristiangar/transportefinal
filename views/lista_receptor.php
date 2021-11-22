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
    <title>Receptor</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
            <a class="nav-link" ><?php echo $us;?></a>
        </li>
        <li class="navbar-item">
        <a class="nav-link" href="../controller/login/login.php?log">Cerrar sesión</a>
        </li>
    </ul>

</nav>
<div class="container-fluid">
<?php
  include_once("../controller/receptor.php");
  $resultado=$dt->num_rows;
  if($resultado>0){
    ?>
      <h1>Lista de Receptores</h1>
      <br>
      <div class="container mt-3">
      <input class="form-control" id="myInput" type="text" placeholder="buscar..">
      <br>
      <table class="table table-dark table-striped table-hover table-responsive-sm" border="1" id="tabla_paginada">
            <thead>
              <td>Nombre</td>
              <td>telefono 1</td>
              <td>telefono 2</td>
              <td>Modificar</td>
              <td>Eliminar</td>
            </thead>
      <?php
          while ($row=mysqli_fetch_array($dt)) {
            $id=$row['id_receptor'];
            $nombre=$row['nombre'];
            $telefono1=$row['telefono_1'];
            $telefono2=$row['telefono_2'];

            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $nombre?></td>
                    <td><?php echo $telefono1?></td>
                    <td><?php echo $telefono2?></td>
                    <td><center><a href="agregar_receptor.php?id=<?php echo $id?>"><button type="button" class="btn btn-warning">Modificar</button></a></center></td>
                    <td><center><button type="button" class="btn btn-danger"  onclick="alerta()">Eliminar</button></center></td>
                  </tr>
                 </tbody>
                 <script>
                            function alerta()
                            {
                                var opcion = window.confirm("Esta seguro que desea eliminar los datos");
                                if (opcion == true) {
                                    self.location="../controller/receptor.php?id=<?php echo $id?>&es=E"
                                   } 
                            }
                  </script>
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
                 <a href="agregar_receptor.php"><button type="button" class="btn btn-success" >Agregar Nuevo</button></a>
                
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
      <a href="agregar_receptor.php"><button type="button" class="btn btn-success btn-lg" >Agregar Nuevo</button></a>
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