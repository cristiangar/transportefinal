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
    <title>Nuevo Vehiculo</title>
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
<script>
                   function Card(event, el){//Validar nombre

                        //Obteniendo posicion del cursor 
                        var val = el.value;//Valor de la caja de texto
                        var pos = val.slice(0, el.selectionStart).length;
                        
                        var out = '';//Salida
                        var filtro = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890';
                        var v = 0;//Contador de caracteres validos
                        
                        //Filtar solo los numeros
                        for (var i=0; i<val.length; i++){
                           if (filtro.indexOf(val.charAt(i)) != -1){
                               v++;
                               out += val.charAt(i);
                               
                               //Agregando un espacio cada 4 caracteres
                               if((v==2) || (v==9))
                                   out+='-';
                           }
                        }
                        
                        //Reemplazando el valor
                        el.value = out;
                        
                        //En caso de modificar un numero reposicionar el cursor
                        if(event.keyCode==8){//Tecla borrar precionada
                            el.selectionStart = pos;
                            el.selectionEnd = pos;
                        }
                    } 
            </script>

<div class="container-fluid">
<?php
if(isset($_GET['id'])){
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
        $id_flotilla=$row['id_flotilla'];
        $flotilla=$row['tipo'];
    }
?>
                    <form method="POST" action="../controller/vehiculo.php?id=<?php echo $id;?>&mod" enctype="multipart/form-data">
                    <h1>Datos del Vehiculo</h1>
                    <br>
                    <div class='form-row'>
                            <div class="col-sm-4">
                                <label>No.Placa</label>
                                <input value=<?php echo $placa?> name='placa' type="text" class="form-control" placeholder="Número de placa" onkeyup="Card(event, this)" maxlength="9" require>
                            </div>
                            <div class="col-sm-4">
                                <label>Marca</label>
                                <input value=<?php echo $marca?> name='marca' type="text" class="form-control" placeholder="Marca" require>
                            </div>
                            
                            <div class="col-sm-4">
                                <label>Modelo</label>
                                <input value=<?php echo $modelo?> name='modelo' type="text" class="form-control" placeholder="Modelo"require>
                            </div>
                            <div class="col-sm-4">
                                <label>Tonelaje</label>
                                <input value=<?php echo $tonelaje?> name='tonelaje' type="text" class="form-control" placeholder="Tonelaje" require>
                            </div>
                            <div class="col-sm-4">
                                <label>ejes</label>
                                <input value=<?php echo $ejes?> name='ejes' type="number" class="form-control" placeholder="ejes" value='0' require>
                            </div>
                            <div class="col-sm-4">
                                    <label>color</label>
                                        <input value=<?php echo $color?> name='color' type="text" class="form-control" placeholder="color" require>
                                </div>
                            <div class="col-sm-4">
                            <label>Tipo Vehiculo</label>
                            <select name='tipo_vehiculo' class="form-control">
                                <option value='<?php echo $tipo;?>'><?php echo $tipo;?></option>
                                <option value='Cabezal'>Cabezal</option>
                                <option value='Camion'>Camion</option>
                            </select>
                            </div>

                            <div class="col-sm-4">
                            <label>Número CAAT</label>
                            <input value=<?php echo $caat?> name='pcaat' type="number" class="form-control" placeholder="Numero CAAT" require>
                            </div>

                            <div class="col-sm-4">
                                <label>Flotilla</label>
                                <select name="id_flotilla" id="" class="form-control">
                                <option value="<?php echo $id_flotilla; ?>"><?php echo $flotilla; ?></option>
                                <?php
                                include_once("../controller/vehiculo.php");
                                while($row=mysqli_fetch_array($dt2)){
                                    $valor=$row['id_flotilla'];
                                    $texto=$row['tipo'];
                                    echo '<option  value="'.$valor.'">'.$texto.'</option>';
                                }
                                ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                            <label>Código Aduanero</label>
                                <input value=<?php echo $cod_aduanero?>  name='codaduanero' type="text" class="form-control" placeholder="codigo aduanero" require>
                            </div>

                            <div class="col-sm-4">
                            <label>Código de Transporte</label>
                                <input value=<?php echo $cod_transporte?> name='codtransporte' type="text" class="form-control" placeholder="Codigo de Transporte" require>
                            </div>

                            <br><br>
                            <div class="col-sm-4">

                            </div>
                            <br>
                            <div class="col-sm-4">
                                <label>Descripcion</label>
                                <br>
                                <textarea value='N/A' calss='form-control' name="descripcion" id="" cols="72" rows="5"><?php echo $descripcion?></textarea>
                            </div>
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
                                    <a href="lista_vehiculo.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                                    <input type="reset" class="btn btn-danger" value="cancelar">
                                </center>
                            </div>
                    </form>
<?php
}
else{
    ?>
                    <form method="POST" action="../controller/vehiculo.php" enctype="multipart/form-data">
                    <h1>Datos del Vehiculo</h1>
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
                                <label>Tonelaje</label>
                                <input name='tonelaje' type="text" class="form-control" placeholder="Tonelaje" require>
                            </div>
                            <div class="col-sm-4">
                                <label>ejes</label>
                                <input name='ejes' type="number" class="form-control" placeholder="ejes" value='0' require>
                            </div>
                            <div class="col-sm-4">
                                    <label>color</label>
                                        <input name='color' type="text" class="form-control" placeholder="color" require>
                                </div>
                            <div class="col-sm-4">
                            <label>Tipo Vehiculo</label>
                            <select name='tipo_vehiculo' class="form-control">
                                <option value='Cabezal'>Cabezal</option>
                                <option value='Camion'>Camion</option>
                            </select>
                            </div>

                            <div class="col-sm-4">
                            <label>Número CAAT</label>
                            <input value="0" name='pcaat' type="number" class="form-control" placeholder="Numero CAAT" require>
                            </div>

                            <div class="col-sm-4">
                                <label>Flotilla</label>
                                <select name="id_flotilla" id="" class="form-control">
                                <!--<option value="<?php //echo $id_tipo_piloto; ?>"><?php echo $tipo_piloto; ?></option>!-->
                                <?php
                                include_once("../controller/vehiculo.php");
                                while($row=mysqli_fetch_array($dt2)){
                                    $valor=$row['id_flotilla'];
                                    $texto=$row['tipo'];
                                    echo '<option  value="'.$valor.'">'.$texto.'</option>';
                                }
                                ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                            <label>Código Aduanero</label>
                                <input value="N/A" name='codaduanero' type="text" class="form-control" placeholder="codigo aduanero" require>
                            </div>

                            <div class="col-sm-4">
                            <label>Código de Transporte</label>
                                <input value="N/A" name='codtransporte' type="text" class="form-control" placeholder="Codigo de Transporte" require>
                            </div>

                            <br><br>
                            <div class="col-sm-4">

                            </div>
                            <br>
                            <div class="col-sm-4">
                                <label>Descripcion</label>
                                <br>
                                <textarea value='N/A' calss='form-control' name="descripcion" id="" cols="72" rows="5"></textarea>
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
                                    <a href="lista_vehiculo.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
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