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
    <title>Nuevo Encabezado</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/imagen.css">
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
            <a class="nav-link" >Nuevo Recibo</a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" >Usuario: <?php echo $us;?></a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" href="../index.php">Cerrar sesión</a>
        </li>
        
    </ul>

</nav>
<div class="container-fluid">

    <form method="POST" action="../controller/nuevo_encabezado.php" >
      <h1>Datos del encabezado</h1>
      <br>
      <br>
      <h2>Información del Viaje</h2>
      <br>
      <div class="form-row">

            <div class="col-sm-4">
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Seleccione Viaje" id="pagina8" return false; name="Receptor">
                    <div class="input-group-append">
                      <button  class="input-group-text btn-btn-primary" id="boton8">No. de Viaje</button>
                    </div>
                  </div>
                </div>   
            </div>
                
            <br>
            <div class="form-row">
                <div class="col-sm-4">
                    <label>Nombre del Cliente</label>
                    <input type="text" name="Clientes" class="form-control" placeholder="Nombre del Cliente" id="pagina14" return false; require disabled>
                </div>
            </div>
            <br>
            <div class="form-row">
                <div class="col-sm-4">
                    <label>Total</label>
                    <input type="text" name="total" class="form-control" placeholder="Total del recibo" require>
                </div>


                <div class="col-sm-4">
                    <label>Anticipo</label>
                    <input type="text" name="anticipo" class="form-control" placeholder="Anticipo del Viaje" require>
                </div>

                <div class="col-sm-4">
                <label>Tipo de Moneda</label>
                <select name="tipo_moneda" id="" class="form-control">
                    <option value='1'>Quetzales</option>
                    <option value='2'>Dolares</option>
                </select>
            </div>       

            </div>
      </div>
      <br>
      
      </div>
      <div class="container-fluid col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="../views/lista_encabezados.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                <input type="reset" class="btn btn-danger" value="cancelar">
                
            </center>
        </div>

<script src="../js/padreencabezado.js"></script> 
    </form>

</div>
</body>
</html>
<?php
}

else{/**else de la session */
    header("location: ../Index.php");
}/**ses */
?>