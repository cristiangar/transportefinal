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
    <title>Nueva caja seca</title>
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
        $flotilla=$row['tipo'];
        $estado=$row['estado'];
    }
?>
                    <form method="POST" action="../controller/caja.php?id=<?php echo $id;?>&mod" enctype="multipart/form-data">
                    <h1>Datos a modificar</h1>
                    <br>
                    <div class='form-row'>
                            <div class="col-sm-4">
                                <label>No.Placa</label>
                                <input value="<?php echo $placa?>" name='placa' type="text" class="form-control" placeholder="Número de placa" onkeyup="Card(event, this)" maxlength="9" require>
                            </div>
                            <div class="col-sm-4">
                                <label>Marca</label>
                                <input value="<?php echo $marca?>" name='marca' type="text" class="form-control" placeholder="Marca" require>
                            </div>
                            
                            <div class="col-sm-4">
                                <label>Modelo</label>
                                <input value="<?php echo $modelo?>" name='modelo' type="text" class="form-control" placeholder="Modelo"require>
                            </div>

                            <div class="col-sm-4">
                                <label>ejes</label>
                                <input value="<?php echo $ejes?>" name='ejes' type="number" class="form-control" placeholder="ejes" value='0' require>
                            </div>
                            <div class="col-sm-4">
                                <label>Tamaño</label>
                                <input value="<?php echo $tamanio?>" name='tamanio' type="text" class="form-control" placeholder="Tamaño en pies"require>
                            </div>

                            <div class="col-sm-4">
                                    <label>color</label>
                                    <input value="<?php echo $color?>" value="Sin Color" name='color' type="text" class="form-control" placeholder="color" require>
                             </div>

                             <div class="col-sm-4">
                                <label>Numero economico</label>
                                <input value="<?php echo $numero_economico?>" name='economico' type="number" class="form-control" placeholder="Modelo"require>
                            </div>

                            <div class="col-sm-4">
                            <label>Número CAAT</label>
                            <input value="<?php echo $numero_caat?>" name='pcaat' type="number" class="form-control" placeholder="Numero CAAT" require>
                            </div>
                             
                            <div class="col-sm-4">
                            <label>Tipo Caja</label>
                            <select name='tipo_vehiculo' class="form-control">
                                <option value="<?php echo $tipo?>"><?php echo $tipo ?></option>
                                <option value="Plataforma">Plataforma</option>
                                <option value="Cisterna">Cisterna</option>
                                <option value="Caja refrigerada">Caja refrigerada</option>
                                <option value="Caja seca">Caja seca</option>
                                <option value="Low Body">Low Body</option>
                                <option value="Cama baja">Cama baja</option>
                            </select>
                            </div>

                            <div class="col-sm-4">
                                <label>Flotilla</label>
                                <select name="id_flotilla" id="" class="form-control">
                                <option value="<?php echo $id_flotilla; ?>"><?php echo $flotilla; ?></option>
                                <?php
                                include_once("../controller/caja.php");
                                while($row=mysqli_fetch_array($dt2)){
                                    $valor=$row['id_flotilla'];
                                    $texto=$row['tipo'];
                                    echo '<option  value="'.$valor.'">'.$texto.'</option>';
                                }
                                ?>
                                </select>
                            </div>


                            <br><br>
                            <div class="col-sm-4">

                            </div>
                            <br>

                            <div class="col-sm-4">

                            </div>
                            <div class="col-sm-4">

                            </div>
                            <?php
                            if($imagen_tarjeta=="N/A"){
                                ?>
                                <div class="col-sm-4">
                                    <br>
                                    <label>Imagen Targeta Circulacion</label>
                                    <div class="container-fluid">
                                    <input type="file" name="imgTargetaVeiculo">
                                </div>
                                <br>
                            </div>
                                <?php
                            } 
                            else{
                                ?>
                                <div class="col-sm-4">
                                <label>Imagen actual</label><br>
                                    <div class="container-fluid">
                                    <img src="<?php echo $imagen_tarjeta;?>" width="400" height="200" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <br>
                                    <label>Si decea cambiar la imagen actual escoja una</label>
                                    <div class="container-fluid">
                                    <input type="file" name="imgTargetaVeiculo">
                                </div>
                                <?php
                            }
                            ?>
                            <input value='<?php echo $imagen_tarjeta;?>' name="ruta" type="hidden">
                            <br>
                            <br>
                            <br>

                    
                            <?php
                            if($documento_caat=="N/A"){
                                ?>
                                <div class="col-sm-4">
                                <br>
                                    <label>Documento CAAT</label>
                                    <input type="file" name="imagencaat">
                                </div>
                                <?php

                            }
                            else{
                                ?>
                                <div class="col-sm-4">
                                <br>
                                    <label>si decea cambiar el Documento CAAT porfavor escoja uno</label>
                                    <input type="file" name="imagencaat">
                                </div>                                
                                <?php
                            }
                            ?>
                             <input value='<?php echo $documento_caat;?>' name="ruta_caat" type="hidden">
                    <br>
                    <br>
                    <br>
                    <br>
                    </div>
                        <br>
                        <div class="container-fluid wrapper fadeInDown col-sm-5">
                                <br>
                                <br>
                                <center>
                                    <input type="submit" class="btn btn-success" value="Aceptar">
                                    <a href="lista_caja.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                                    <input type="reset" class="btn btn-danger" value="cancelar">
                                </center>
                            </div>
                    </form>
<?php
}
else{
    ?>
                    <form method="POST" action="../controller/caja.php" enctype="multipart/form-data">
                    <h1>Datos de caja</h1>
                    <br>
                    <div class='form-row'>
                            <div class="col-sm-4">
                                <label>No.Placa</label>
                                <input name='placa' type="text" class="form-control" placeholder="Número de placa" onkeyup="Card(event, this)" maxlength="9" require>
                            </div>
                            <div class="col-sm-4">
                                <label>Marca</label>
                                <input name='marca' type="text" class="form-control" placeholder="Marca" require>
                            </div>
                            
                            <div class="col-sm-4">
                                <label>Modelo</label>
                                <input name='modelo' type="text" class="form-control" placeholder="Modelo"require>
                            </div>

                            <div class="col-sm-4">
                                <label>ejes</label>
                                <input name='ejes' type="number" class="form-control" placeholder="ejes" value='0' require>
                            </div>
                            <div class="col-sm-4">
                                <label>Tamaño</label>
                                <input name='tamanio' type="text" class="form-control" placeholder="Tamaño en pies"require>
                            </div>

                            <div class="col-sm-4">
                                    <label>color</label>
                                    <input value="Sin Color" name='color' type="text" class="form-control" placeholder="color" require>
                             </div>

                             <div class="col-sm-4">
                                <label>Numero economico</label>
                                <input name='economico' type="number" class="form-control" placeholder="Modelo"require>
                            </div>

                            <div class="col-sm-4">
                            <label>Número CAAT</label>
                            <input value="0" name='pcaat' type="number" class="form-control" placeholder="Numero CAAT" require>
                            </div>
                             
                            <div class="col-sm-4">
                            <label>Tipo Caja</label>
                            <select name='tipo_vehiculo' class="form-control">
                                <option value="Plataforma">Plataforma</option>
                                <option value="Cisterna">Cisterna</option>
                                <option value="Caja refrigerada">Caja refrigerada</option>
                                <option value="Caja seca">Caja seca</option>
                                <option value="Low Body">Low Body</option>
                                <option value="Cama baja">Cama baja</option>
                            </select>
                            </div>


                            <div class="col-sm-4">
                                <label>Flotilla</label>
                                <select name="id_flotilla" id="" class="form-control">
                                <!--<option value="<?php //echo $id_tipo_piloto; ?>"><?php echo $tipo_piloto; ?></option>!-->
                                <?php
                                include_once("../controller/caja.php");
                                while($row=mysqli_fetch_array($dt2)){
                                    $valor=$row['id_flotilla'];
                                    $texto=$row['tipo'];
                                    echo '<option  value="'.$valor.'">'.$texto.'</option>';
                                }
                                ?>
                                </select>
                            </div>

                            <div class="col-sm-4">

                            </div>
                            <div class="col-sm-4">

                            </div>
                            <div class="col-sm-4">
                                <br>
                                <label>Imagen Targeta Circulacion</label>
                                <div class="container-fluid">
                                <input type="file" name="imgTargetaVeiculo">
                                </div>
                                <br>
                            </div>
                            <br>
                            <br>
                            <br>



                        <div class="col-sm-4">
                    <br>
                    <label>Documento CAAT</label>
                    <input type="file" name="imagencaat">
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    </div>
                        <br>
                        <div class="container-fluid wrapper fadeInDown col-sm-5">
                                <br>
                                <br>
                                <center>
                                    <input type="submit" class="btn btn-success" value="Aceptar">
                                    <a href="lista_caja.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
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