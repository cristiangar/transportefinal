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
    <title>Detalle Vehiculo</title>
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
        $id=$_GET['id'];
        include_once("../controller/vehiculo.php");
        $piloto=new vehiculo();
        $dt3=$piloto->VerUno($id);

        while ($row=mysqli_fetch_array($dt3)) {
            $id=$row['id_vehiculo'];
            $placa=$row['no_placa'];
            $marca=$row['marca'];
            $modelo=$row['modelo'];
            $tonelaje=$row['tonelaje'];
            $ejes=$row['ejes'];
            $color=$row['color'];
            $tipo=$row['tipo_vehiculo'];
            $imagen_tarjeta=$row['imagen_targeta_circulacion'];
            $cod_aduanero=$row['codigo_aduanero'];
            $cod_transporte=$row['codigo_transporte'];
            $caat=$row['numero_caat'];
            $documento_caat=$row['documento_caat'];
            $descripcion=$row['decripcion'];

        }
    ?>
                    <h1>Detalle del Vehiculo</h1>
                    <br>
                    <div class='form-row'>
                            <div class="col-sm-4">
                                <label>No.Placa</label>
                                <input value=<?php echo $placa?> name='placa' type="text" class="form-control" placeholder="Número de placa" onkeyup="Card(event, this)" maxlength="9" readonly>
                            </div>
                            <div class="col-sm-4">
                                <label>Marca</label>
                                <input value=<?php echo $marca?> name='marca' type="text" class="form-control" placeholder="Marca" readonly>
                            </div>
                            
                            <div class="col-sm-4">
                                <label>Modelo</label>
                                <input value=<?php echo $modelo?> name='modelo' type="text" class="form-control" placeholder="Modelo"readonly>
                            </div>
                            <div class="col-sm-4">
                                <label>Tonelaje</label>
                                <input value=<?php echo $tonelaje?> name='tonelaje' type="text" class="form-control" placeholder="Tonelaje" readonly>
                            </div>
                            <div class="col-sm-4">
                                <label>ejes</label>
                                <input value=<?php echo $ejes?> name='ejes' type="number" class="form-control" placeholder="ejes" value='0' readonly>
                            </div>
                            <div class="col-sm-4">
                                    <label>color</label>
                                        <input value=<?php echo $color?> name='color' type="text" class="form-control" placeholder="color" readonly>
                                </div>
                            <div class="col-sm-4">
                            <label>Tipo Vehiculo</label>
                            <input value=<?php echo $tipo?> name='codaduanero' type="text" class="form-control" placeholder="codigo aduanero" readonly>
                            </div>

                            <div class="col-sm-4">
                            <label>Número CAAT</label>
                            <input value=<?php echo $caat?> name='pcaat' type="number" class="form-control" placeholder="Numero CAAT" readonly>
                            </div>


                            <div class="col-sm-4">
                            <label>Código Aduanero</label>
                                <input value=<?php echo $cod_aduanero?> name='codaduanero' type="text" class="form-control" placeholder="codigo aduanero" readonly>
                            </div>

                            <div class="col-sm-4">
                            <label>Código de Transporte</label>
                                <input value=<?php echo $cod_transporte?> name='codtransporte' type="text" class="form-control" placeholder="Codigo de Transporte" readonly>
                            </div>
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-4">
                            </div>
                            <br><br>
                            <div class="col-sm-4">
                                <label>Descripcion</label>
                                <br>
                                <textarea readonly calss='form-control' name="descripcion" id="" cols="72" rows="5"><?php echo $descripcion?></textarea>
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
                                <a href="lista_vehiculo.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
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