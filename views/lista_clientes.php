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
    <title>Clientes</title>
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
        <img src="../imagenes/logo.png" alt="Transporte" style="width:52px;height:52px;">
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
  include_once("../controller/cliente.php");
  $resultado=$dt2->num_rows;
  if($resultado>0){
    ?>
      <h1>Lista de Clientes</h1>
      <br>
      <div class="container mt-3">
      <input class="form-control" id="myInput" type="text" placeholder="buscar..">
      <br>
      <table class="table table-dark table-striped table-hover table-responsive-sm border="1" id="tabla_paginada">
            <thead>
              <td>Empresa</td>
              <td>Telefono 1</td>
              <td>Teléfono 2</td>
              <td>Contacto 1</td>
              <td>Contacto 2</td>
              <td>Correo</td>
              <td>Nit</td>
              <td> Modificar</td>
              <td>Eliminar</td>
            </thead>
      <?php
          while ($row=mysqli_fetch_array($dt2)) {
            $id=$row['id_clientes'];
            $nombre=$row['empresa'];
            $telefono=$row['telefono_1'];
            $telefono2=$row['telefono_2'];
            $contacto1=$row['contacto_1'];
            $contacto2=$row['contacto_2'];
            $correo=$row['correo'];
            $nit=$row['nit'];
            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $nombre?></td>
                    <td><?php echo $telefono?></td>
                    <td><?php echo $telefono2?></td>
                    <td><?php echo $contacto1?></td>
                    <td><?php echo $contacto2?></td>
                    <td><?php echo $correo?></td>
                    <td><?php echo $nit?></td>
                    <td><center><a href="nuevo_cliente.php?id=<?php echo $id?>"><button type="button" class="btn btn-warning">Modificar</button></a></center></td>
                    <td><center><a href="../controller/cliente.php?id=<?php echo $id?>&es=E"><button type="button" class="btn btn-danger">Eliminar</button></a></center></td>
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
                 <a href="nuevo_cliente.php"><button type="button" class="btn btn-success" >Agregar Nuevo</button></a>
                
                <a href="secritaria.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                
                
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
      <br>
      <a href="nuevo_cliente.php"><button type="button" class="btn btn-success btn-lg" >Agregar Nuevo</button></a>
      <a href="secritaria.php"><button type="button" class="btn btn-warning btn-lg" >Regresar</button></a>
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