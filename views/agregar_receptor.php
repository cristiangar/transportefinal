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
    <title>Nuevo Ruta</title>
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
    <a href="secritaria.php">
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
    $id=$_GET['id'];
    include_once('../controller/receptor.php');
    $ruta=new receptor();
    $dt=$ruta->VerUno($id);
    while ($row=mysqli_fetch_array($dt)) {
    $nombre=$row['nombre'];
    $apellido=$row['apellido'];
    $telefono1=$row['telefono_1'];
    $telefono2=$row['telefono_2'];

    }

?>
    <form method="POST" action="../controller/receptor.php?id=<?php echo $id?>&mod">
    <h1>Datos del receptor a modificar</h1>
    <br>
        <div class="form-row">
            <div class="col-sm-4">
            <label>Nombre</label>
                <input type="text"value="<?php echo $nombre?>" name='nombre' class="form-control" placeholder="nombre"require>
            </div> 
            <div class="col-sm-4">
            <label>Apellido</label>
                <input type="text" value="<?php echo $apellido?>" name='apellido' class="form-control" placeholder="apellido" require>
            </div>
            <div class="col-sm-4">
            <label>Telefono 1</label>
                <input type="text"value="<?php echo $telefono1?>" name='telefono1' class="form-control" placeholder="telefono 1"require>
            </div>    
            <div class="col-sm-4">
            <label>Telefono 2</label>
                <input type="text"value="<?php echo $telefono2?>" name='telefono2' class="form-control" placeholder="telefono 2"require>
            </div>  
        </div>

        </div>
            <div class="container-fluid wrapper fadeInDown col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="lista_receptor.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                <input type="submit" class="btn btn-danger" value="cancelar">
                
            </center>
            </div>
    </form>
<?php
}
else{
    ?>
    <form method="POST" action="../controller/receptor.php">
    <h1>Datos del receptor</h1>
    <br>
        <div class="form-row">
        <div class="col-sm-4">
            <label>Nombre</label>
                <input type="text" name='nombre' class="form-control" placeholder="nombre"require value="N/A">
            </div> 
            <div class="col-sm-4">
            <label>Apellido</label>
                <input type="text" name='apellido' class="form-control" placeholder="apellido" require value="N/A">
            </div>
            <div class="col-sm-4">
            <label>telefono 1</label>
                <input type="text" name='telefono1' class="form-control" placeholder="telefono 1"require value="N/A">
            </div>    
            <div class="col-sm-4">
            <label>telefono 2</label>
                <input type="text" name='telefono2' class="form-control" placeholder="telefono 2"require value="N/A">
            </div>    
        </div>

        </div>
            <div class="container-fluid wrapper fadeInDown col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="lista_rutas.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                <input type="submit" class="btn btn-danger" value="cancelar">
                
            </center>
            </div>
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