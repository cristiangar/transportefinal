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
    <title>Nuevo Detalle</title>
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
            <a class="nav-link" >Nuevo Detalle</a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" >Usuario: <?php echo $us;?></a>
        </li>
        <li class="navbar-item">
        <a class="nav-link" href="../controller/login/login.php?log">Cerrar sesión</a>
        </li>
        
    </ul>

</nav>

    
<div class="container-fluid col-sm-5">
<?php
if(isset($_GET['id']) and isset($_GET['mod'])and isset($_GET['id2'])){
     
     /*$idenvio=$_GET['idenvio'];*/
    $id=$_GET['id'];
    $id_moneda=$_GET['id_moneda'];
    $tipo_moneda=$_GET['tipo_moneda'];//recibo los id encabezado y tipo moneda
   //busco los datos para acatualizar
    $id2= $_GET['id2'];
    include_once("../models/ClassEncabezado.php");
    $cliente=new encabezado();
    $dt=$cliente->VerUnDetalle($id2);

    while ($row=mysqli_fetch_array($dt)) {
            $id2=$row['id_detalle'];
            $descripcion=$row['descripcion'];
            $subtotal=$row['sub_total'];
            $id=$row['id_encabezado'];
        }

          
    
    include_once("../models/ClassEncabezado.php");
    $cliente=new encabezado();
    $dt=$cliente->VerUnDetalle($id2);

    while ($row=mysqli_fetch_array($dt)) {
            $id2=$row['id_detalle'];
            $descripcion=$row['descripcion'];
            $subtotal=$row['sub_total'];
            $id=$row['id_encabezado'];
        }

        ?>
            <form method="POST" action="../controller/encabezado.php?id2=<?php echo $id2?>&mod&id=<?php echo $id?>&id_moneda=<?php echo $id_moneda?>" enctype="multipart/form-data">
    <br>
    <br>
        <center><h1>Modificar Detalle</h1></center>
        <br>
        <div class="form-row">
           

            
            <div class="col-sm-10">
            <label>Descripción</label>
                <input type="text" name="descripcion" class="form-control" placeholder="descripción del detalle" value="<?php echo $descripcion?>" require>
            </div>
                            
        
        <div class="col-sm-10">
            <label>Sub-total</label>
                <input type="text" name="subtotal" class="form-control" placeholder="Cantidad del Sub-Total" value="<?php echo $subtotal?>" require>
            </div>

            <div class="col-sm-10">
            <label>Tipo de Moneda</label>
                <input type="text" name="tipo_moneda" class="form-control" placeholder="tipo de moneda" value="<?php echo $tipo_moneda ?>" disabled>
            </div>
        <br>
    </div>
</div>
            <div class="container-fluid col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="lista_encabezados.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                <input type="reset" class="btn btn-danger" value="cancelar">
                
            </center>
        </div>
    </form>

        <?php


}
else
{
    $id=$_GET['id'];
    $id_moneda=$_GET['id_moneda'];
    $tipo_moneda=$_GET['tipo_moneda'];

    ?>
    <form method="POST" action="../controller/encabezado.php?id=<?php echo $id?>&id_moneda=<?php echo $id_moneda?>" enctype="multipart/form-data">
    <br>
    <br>
        <h1>Nuevo Datalle</h1>
        <br>
        <div class="form-row">
            <div class="col-sm-10">
            <label>Descripción</label>
                <input type="text" name="descripcion" class="form-control" placeholder="Descripcion del detalle" require>
            </div>
            <div class="col-sm-10">
            <label>Sub-Total</label>
                <input type="text" name="subtotal" class="form-control" placeholder="Cantidad del detalle" require>
            </div>
            <div class="col-sm-10">
            <label>Tipo de Moneda</label>
                <input type="text" name="tipo_moneda" class="form-control" placeholder="tipo de moneda" value="<?php echo $tipo_moneda ?>" disabled>
            </div>
                
        </div>  
        <br>
        
        </div>
            <div class="container-fluid col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="lista_encabezados.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
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