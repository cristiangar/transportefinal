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
    <title>Nuevo Piloto</title>
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
            <a class="nav-link" > <?php echo $us;?></a>
        </li>
        <li class="navbar-item">
        <a class="nav-link" href="../controller/login/login.php?log">Cerrar sesión</a>
        </li>
        
    </ul>
</nav>
<div class="container-fluid">
<?php
if(isset($_GET['id']) and isset($_GET['m']))
{
   /* include_once('../controller/piloto.php');
    $id= $_GET['id'];
    while($row=mysqli_fetch_array($dt)){
    }*/
    
}
else/**ingresar */
{
    $id_envio=$_GET['id_envio'];
    $idn=$_GET['d'];
    ?>
    <form method="POST" action="../controller/gastos_piloto.php" enctype="multipart/form-data">
    <h1>Gastos</h1>
     <br>
        <div class="form-row">
            <div class="col-sm-4">
                <label>Precio</label>
                <input type="text" name="id_envio" value="<?php echo $id_envio;?>"hidden>
                <input type="text" name="idn" value="<?php echo $idn;?>"hidden>
                <input name="precio" type="number" class="form-control" placeholder="Precio" value="0.00" step="0.01" require>
            </div>
            <?php 
            include('../controller/gastos_piloto.php');
            $gasto=new GastoPiloto();
            $dt=$gasto->VerMoneda();
            ?>
            <div class="col-sm-4">
                <label>Tipo de Moneda</label>
                <select name="id_moneda" id="" class="form-control">
                <?php
                while($row=mysqli_fetch_array($dt)){
                    $valor=$row['id_tipo_moneda'];
                    $texto=$row['tipo'];
                    echo '<option  value="'.$valor.'">'.$texto.'</option>';
                }
                ?>
                </select>
            </div>
            <div class="col-sm-4">
                <br>
                <label>Factura</label>
                <div class="container-fluid">
                    <input type="file" name="imgGasto">
                </div>
            </div> 
        </div>
        <br>
        <div class="form-row">
            <div class="col-sm-4">
                <label for="">Descripción</label>
                <textarea name="descripcion" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <br>


        <div class="container-fluid wrapper fadeInDown col-sm-5">
                <br>
                <center>
                    <input type="submit" class="btn btn-success" value="Aceptar">
                    <a href="listaviajes.php?id=<?php echo $idn;?>&ver"><button type="button" class="btn btn-warning" >Regresar</button></a>
                    <input type="reset" class="btn btn-danger" value="cancelar">
                    <br>
                    
                </center>
                <br>
            </div>
            <br>
            <div></div>

    </form>
    <?php
}
?>
</div>
</div>
</body>
</html>
<?php
}

else{/**else de la session */
    header("location: ../Index.php");
}/**ses */
?>