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
    include_once('../controller/rutas.php');
    $ruta=new rutas();
    $dt=$ruta->VerUno($id);
    while ($row=mysqli_fetch_array($dt)) {
    $origen=$row['origen'];
    $destino=$row['destino'];
    $codigo=$row['codigo'];

    }

?>
    <form method="POST" action="../controller/rutas.php?id=<?php echo $id?>&mod">
    <h1>Datos de la ruta a modificar</h1>
    <br>
        <div class="form-row">
            <div class="col-sm-4">
            <label>Codigo ruta</label>
                <input type="text"value="<?php echo $codigo?>" name='codigo' class="form-control" placeholder="codigo"require>
            </div> 
            <div class="col-sm-4">
            <label>País origen</label>
                <input type="text" value="<?php echo $origen?>" name='origen' class="form-control" placeholder="Origen" require>
            </div>
            <div class="col-sm-4">
            <label>País destino</label>
                <input type="text"value="<?php echo $destino?>" name='destino' class="form-control" placeholder="Destino"require>
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
else{
    ?>
    <form method="POST" action="../controller/rutas.php">
    <h1>Datos de la ruta</h1>
    <br>
        <div class="form-row">
        <div class="col-sm-4">
            <label>Codigo</label>
                <input type="text" name='codigo' class="form-control" placeholder="codigo"require>
            </div> 
            <div class="col-sm-4">
            <label>País origen</label>
                <input type="text" name='origen' class="form-control" placeholder="Origen" require>
            </div>
            <div class="col-sm-4">
            <label>País destino</label>
                <input type="text" name='destino' class="form-control" placeholder="Destino"require>
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