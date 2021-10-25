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
    <title>Generar envio</title>
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
            <a class="nav-link" ><?php echo $us;?></a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" href="../index.php">Cerrar sesión</a>
        </li>
        
    </ul>

</nav>
<div class="container-fluid">
<?php
if(isset($_GET['id'])){
    /**modificar */
}
else{
    ?>
     <form method="POST" action="../controller/envio.php" enctype="multipart/form-data">
        
      <h1>Datos del envio</h1>
      <br>
      <div class="form-row">
        <div class="col-sm-4">
          <label>Codigo envio</label>
          <input type="text" name="cod" class="form-control" placeholder="codigo envio"require>
        </div>
      </div>
      <br>

      <h2>Datos del cliente y receptor</h2>
      <br>
       <div class="form-row">
            <div class="col-sm-4">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cliente" id="pagina1" return false; name="Cliente">
                    <div class="input-group-append">
                        <button class="input-group-text btn-btn-primary" id="boton1">Cliente</button>
                    </div>
                </div>
            </div>

                <div class="col-sm-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Receptor" id="pagina2" name="Receptor">
                            <div class="input-group-append">
                                <button  class="input-group-text btn-btn-primary" id="boton2" return false;>Receptor</button>
                            </div>
                    </div>
                </div>           
      </div>
      <br>

      <h2>Datos del paquete</h2>
      <br>

      <div class="form-row">
            <div class="col-sm-4">
            <label>Refecrencia 1</label>
                <input type="text" name="direccion" class="form-control" placeholder="Referencia" require>
            </div>
            <div class="col-sm-4">
            <label>Referencia 2</label>
                <input type="text" name="direccionenvio" class="form-control" placeholder="Referencia">
            </div>
            <?php 
            include_once('../models/ClassEnvio.php');
                $tipo=new envio();
                $dt2=$tipo->VerRuta();
            ?>
            <div class="col-sm-4">
                <label>Ruta</label>
                <select name="id_ruta" id="" class="form-control">
                <?php
                while($row=mysqli_fetch_array($dt2)){
                    $valor=$row['id_rutas'];
                    $texto=$row['ruta'];
                    echo '<option  value="'.$valor.'">'.$texto.'</option>';
                }
                ?>
                </select>
            </div>
            <div class="col-sm-4">
                <label>Descripción</label>
                <br>
                <textarea value='N/A' calss='form-control' name="descripcion" id="" cols="110" rows="3"></textarea>
            </div>
      </div>
      <br>

    </form>

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