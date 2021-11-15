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
    <title>Detalle caja seca</title>
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
        <a class="nav-link" href="../controller/login/login.php?log">Cerrar sesión</a>
        </li>
        
    </ul>

</nav>
<div class="container-fluid">
    <?php
        $id=$_GET['id'];
        include_once("../controller/caja.php");
        $piloto=new CajaSeca();
        $dt3=$piloto->VerUno($id);

        while ($row=mysqli_fetch_array($dt3)) {
            $id=$row['id_caja_seca'];
            $placa=$row['no_placa'];
            $marca=$row['marca'];
            $modelo=$row['modelo'];
            $ejes=$row['ejes'];
            $tamanio=$row['tamaño'];
            $color=$row['color'];
            $numero_economico=$row['numero_economico'];
            $numero_caat=$row['numero_caat'];
            $documento_caat=$row['documento_caat'];
            $tipo=$row['tipo_remolque'];
            $imagen_tarjeta=$row['imagen_targeta_circulacion'];
            $id_flotilla=$row['id_flotilla'];
            $florilla=$row['tipo'];
            $estado=$row['estado'];



        }
    ?>
                    <h1>Detalle caja seca</h1>
                    <br>
                    <div class='form-row'>
                            <div class="col-sm-4">
                                <label>No.Placa</label>
                                <input value="<?php echo $placa?>" name='placa' type="text" class="form-control" placeholder="Número de placa" onkeyup="Card(event, this)" maxlength="9" readonly>
                            </div>
                            <div class="col-sm-4">
                                <label>Marca</label>
                                <input value="<?php echo $marca?>" name='marca' type="text" class="form-control" placeholder="Marca" readonly>
                            </div>
                            
                            <div class="col-sm-4">
                                <label>Modelo</label>
                                <input value="<?php echo $modelo?>" name='modelo' type="text" class="form-control" placeholder="Modelo"readonly>
                            </div>

                            <div class="col-sm-4">
                                <label>ejes</label>
                                <input value="<?php echo $ejes?>" name='ejes' type="number" class="form-control" placeholder="ejes" value='0' readonly>
                            </div>
                            <div class="col-sm-4">
                                <label>Tamaño</label>
                                <input value="<?php echo $tamanio?>" name='tamanio' type="text" class="form-control" placeholder="Tamaño en pies"readonly>
                            </div>

                            <div class="col-sm-4">
                                    <label>color</label>
                                    <input value="<?php echo $color?>" value="Sin Color" name='color' type="text" class="form-control" placeholder="color" readonly>
                             </div>

                             <div class="col-sm-4">
                                <label>Numero economico</label>
                                <input value="<?php echo $numero_economico?>" name='economico' type="number" class="form-control" placeholder="Modelo"readonly>
                            </div>

                            <div class="col-sm-4">
                            <label>Número CAAT</label>
                            <input value="<?php echo $numero_caat?>" name='pcaat' type="number" class="form-control" placeholder="Numero CAAT" readonly>
                            </div>

                            <div class="col-sm-4">
                            <label>Tipo Caja</label>
                            <input value="<?php echo $tipo?>" name='pcaat' type="text" class="form-control" placeholder="Numero CAAT" readonly>
                            </div>

                            <div class="col-sm-4">
                            <label>Flotilla</label>
                            <input value="<?php echo $florilla?>" name='pcaat' type="text" class="form-control" placeholder="Numero CAAT" readonly>
                            </div>
                            
                     </div>
                     <br>
                     <?php
                
                        if($imagen_tarjeta=="N/A"){
                            ?>
                            <h1>No hay imagen de tajeta de circulacion</h1>
                            <?php
                        }
                        else{
                            ?>
                            <div class="text-center">
                                <img src="<?php echo $imagen_tarjeta?>" class="img-fluid" width="500" height="500">   
                            </div>
                            <br>
                            <?php
                        }

                        if($documento_caat=="N/A"){
                            ?>
                            <h1>No hay documento caat</h1>
                            <?php
                        }
                        else{
                            ?>
                            <br>
                            <center>
                                <a href="<?php echo  $documento_caat;?>" download="Codigo CAAT">
                                <button type="button" class="btn btn-primary">Descargar CAAT</button>
                                </a>
                            </center>   
                            <?php
                        }
                     ?>
                     <div class="container-fluid wrapper fadeInDown col-sm-5">
                            <br>
                            <center>
                                <a href="lista_caja.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                            </center>
                            <br>
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