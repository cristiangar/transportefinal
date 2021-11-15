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
    <title>Abono</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/imagen.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
<div class="container-fluid">
<?php
if(isset($_GET['error']) or isset($_GET['error2'])){
    $id=$_GET['id'];/**id pago del piloto */
    $id_moneda=$_GET['moneda'];
    $total=$_GET['t'];
    $pendiente=$_GET['p'];
    ?>
    <?php
        if(isset($_GET['error'])){
            ?>
            <script src="../js/ErrorAbono.js"></script>
            <?php
        }
        else{
            ?>
            <script src="../js/ErrorAbono2.js"></script>
            <?php
        }
    ?>
    <form method="POST" action="../controller/abonos.php">
    <h1>ABONOS</h1>
    <h2>Pendinte a abonar: <?php echo $pendiente;?></h2>
    <br>
        <div class="form-row">
            <div class="col-sm-4">
            <label>Abono</label>
                <input type="text" name='total' class="form-control" value="<?php echo $total;?>" hidden>
                <input type="text" name='pendiente' class="form-control" value="<?php echo $pendiente;?>" hidden>
                <input type="text" name='id_pago_piloto' class="form-control" value="<?php echo $id;?>" hidden>
                <input type="number" name='abono' class="form-control" placeholder="abono" step="0.01" require >
                <input type="text" name='moneda' class="form-control" value="<?php echo $id_moneda;?>" hidden>
            </div>
            <div class="col-sm-4">
            <label>Descripción</label>
                <TEXTarea class="form-control" name="descripcion"></TEXTarea>
            </div> 
        </div>

        </div>
            <div class="container-fluid wrapper fadeInDown col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="detalle_abonos.php?id=<?php echo $id;?>&moneda=<?php echo $id_moneda;?>"><button type="button" class="btn btn-warning" >Regresar</button></a>
                <input type="submit" class="btn btn-danger" value="cancelar">
                
            </center>
            </div>
    </form>
    
    <?php
}
else{
    $id=$_GET['id'];/**id pago del piloto */
    $id_moneda=$_GET['moneda'];
    $total=$_GET['t'];
    $pendiente=$_GET['p'];
    ?>
    <form method="POST" action="../controller/abonos.php">
    <h1>ABONOS</h1>
    <h2>Pendinte a abonar: <?php echo $pendiente;?></h2>
    <br>
        <div class="form-row">
            <div class="col-sm-4">
            <label>Abono</label>
                <input type="text" name='total' class="form-control" value="<?php echo $total;?>" hidden>
                <input type="text" name='pendiente' class="form-control" value="<?php echo $pendiente;?>" hidden>
                <input type="text" name='id_pago_piloto' class="form-control" value="<?php echo $id;?>" hidden>
                <input type="number" name='abono' class="form-control" placeholder="abono" step="0.01" require >
                <input type="text" name='moneda' class="form-control" value="<?php echo $id_moneda;?>" hidden>
            </div>
            <div class="col-sm-4">
            <label>Descripción</label>
                <TEXTarea class="form-control" name="descripcion"></TEXTarea>
            </div> 
        </div>

        </div>
            <div class="container-fluid wrapper fadeInDown col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="detalle_abonos.php?id=<?php echo $id;?>&moneda=<?php echo $id_moneda;?>"><button type="button" class="btn btn-warning" >Regresar</button></a>
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