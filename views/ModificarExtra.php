<?php
session_start();
include_once("../controller/pago_piloto.php");
if(isset($_SESSION['usuario']))
{
    $rol=$_SESSION['rol'];
    $us=$_SESSION['usuario'];
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <title>Modificar</title>
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
                    if(isset($_GET['id_pago'])){
                        while ($row=mysqli_fetch_array($dt)) {
                            $adelanto=$row['adelanto_piloto'];
                            $pendiente=$row['pendiente_piloto'];
                            $rentacaja=$row['renta_caja'];
                            $combustible=$row['combustible'];
                            }
                        $id_tbl_pago=$_GET['id_pago'];
                        $id_tbl_envio=$_GET['id_envio'];
                        ?>
                            <h1>Datos a modificar</h1>
                            <br>
                            <form method="POST" action="../controller/pago_piloto.php?id&mod">
                                <input type="text" name="id_tbl_pago" value="<?php echo $id_tbl_pago;?>" hidden>
                                <input type="text" name="id_tbl_envio" value="<?php echo $id_tbl_envio;?>" hidden>
                                <div class="form-row">
                                    <div class="col-sm-3">
                                        <label>Adelanto del piloto</label>
                                        <input type="number"value="<?php echo $adelanto;?>" name='adelanto' class="form-control" step="0.01" require>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Pendiente del piloto</label>
                                        <input type="number"value="<?php echo $pendiente;?>" name='pendiente' class="form-control" step="0.01" require>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Renta de caja</label>
                                        <input type="number"value="<?php echo $rentacaja;?>" name='renta_caja' class="form-control" step="0.01" require>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>Gasolina</label>
                                        <input type="number"value="<?php echo $combustible;?>" name='gasolina' class="form-control" step="0.01" require>
                                    </div>
                                </div>
                                <div class="container-fluid wrapper fadeInDown col-sm-5">
                                    <br>
                                    <br>
                                    <center>
                                        <input type="submit" class="btn btn-success" value="Aceptar">
                                        <input type="submit" class="btn btn-danger" onclick="window.close();" value="cancelar">
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