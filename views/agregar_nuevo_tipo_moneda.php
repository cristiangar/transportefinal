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
    <title>Nuevo</title>
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
    <a href="ViewAdministrador.php">
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
<div class="container-fluid col-sm-5">
<?php
if(isset($_GET['id'])){
     $id= $_GET['id'];
    
    //busco los datos para acatualizar
    include_once("../models/ClassTipoMoneda.php");
    $cliente=new tipo_moneda();
    $dt=$cliente->VerUno($id);

    while ($row=mysqli_fetch_array($dt)) {
            $id=$row['id_tipo_moneda'];
            $tipo=$row['tipo'];
            $valor=$row['valor'];
        }

    ?>
            <form method="POST" action="../controller/tipo_moneda.php?id=<?php echo $id?>">
    <br>
    <br>
        <h1>Datos a modificar</h1>
        <br>
        
        <div class="form-row">
            <div class="col-sm-10">

            <label>Tipo de moneda</label>
            <input type="text" name="tipo" class="form-control" placeholder="Nombre" value="<?php echo $tipo?>" require>
            <label>Valor</label>
            <input type="number" name="valor" class="form-control" placeholder="Valor en Quetzales" step="0.01" value="<?php echo $valor?>" require>
            </div>
                          
        </div>  

        <br>
        
        </div>
            <div class="container-fluid col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="lista_tipo_moneda.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                <input type="reset" class="btn btn-danger" value="cancelar">
                
            </center>
        </div>
    </form>
    
        <?php


}
else
{
    ?>
    <form method="POST" action="../controller/tipo_moneda.php">
    <br>
    <br>
        <center>
        <h1>Tipo de moneda</h1>
        <br>
        </center>
        <div class="form-row">
            <div class="col-sm-10">
                <label>Tipo</label>
                <input type="text" name="tipo" class="form-control" placeholder="tipo moneda" require>
                <br>
                <label>Valor</label>
                <input type="number" name="valor" class="form-control" placeholder="Valor en Quetzales" step="0.01" require>
            </div>   
                
        </div>  
        <br>
        
        </div>
            <div class="container-fluid col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="lista_tipo_moneda.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                <input type="reset" class="btn btn-danger" value="cancelar">
                
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