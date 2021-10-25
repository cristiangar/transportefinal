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
    <title>Gastos Mantenimiento</title>
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
            <a class="nav-link" >Nuevo Mantenimiento</a>
        </li>
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
if(isset($_GET['id']) and isset($_GET['mod'])and isset($_GET['id2'])){
     
     /*$idenvio=$_GET['idenvio'];*/
 
   //busco los datos para acatualizar
    $id2= $_GET['id2'];
    include_once("../models/ClassMantenimiento.php");
    $cliente=new bitacora();
    $dt=$cliente->VerUnabitacora($id2);

    while ($row=mysqli_fetch_array($dt)) {
            $id2=$row['id_mantenimiento'];
            $fecha=$row['fecha'];
            $descripcion=$row['descripcion'];
            $costo=$row['costo'];
            $no_factura=$row['no_factura'];
            $imagen_factura=$row['imagen_factura'];
            $tipo_moneda=$row['tipo_moneda'];
            $id=$row['id_vehiculos_2'];
        }

        ?>
            <form method="POST" action="../controller/mantenimiento.php?id2=<?php echo $id2?>&mod&id=<?php echo $id?>" enctype="multipart/form-data">
    <br>
    <br>
        <center><h1>Modificar Registro</h1></center>
        <br>
        <div class="form-row">
           

            <div class="col-sm-10">
            <label>Fecha del mantenimiento</label>
                <input type="date" value='<?php echo date('Y-m-d',strtotime($fecha_licencia));?>' name="fecha" class="form-control" id="fecha" placeholder="Introduce una fecha" required> />
                
            </div>
            <div class="col-sm-10">
            <label>Costo</label>
                <input type="text" name="costo" class="form-control" placeholder="Costo del mantenimiento" value="<?php echo $costo?>" require>
            </div>
            
            <?php
                            if($ruta_imagen_targeta=="N/A"){/**valida si hay imagen o no */
                                ?>
                                <div class="col-sm-4">
                                <br>
                                <label>Imagen de Tarjeta de Cirtuclación</label>
                                <input type="file" name="imagen">
                                </div>
                                <?php
                            }
                            else
                            {
                                ?>
                            <div class="col-sm-4">
                            <label>Imagen actual</label><br>
                                <div class="container-fluid">
                                <img src="<?php echo $ruta_imagen_targeta;?>" width="400" height="200" alt="">
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <br>
                                <label>Imagen de Tarjeta de Cirtuclación</label>
                                <input type="file" name="imagen">
                            </div>
                            <input value='<?php echo $ruta_imagen_targeta;?>' name="ruta_targeta" type="hidden">

                                <?php
                            }
                            ?>
  
                 
            <div class="col-sm-4">
                <label>Tipo de Moneda</label>
                <select name="tipo_moneda" id="" class="form-control">
                    <option value="<?php echo $tipo_moneda ?>"><?php echo $tipo_moneda?></option>
                    <option value='1'>Quetzales</option>
                    <option value='2'>Dolares</option>
                </select>
            </div>          
            <div class="col-sm-10">
            <label>No. Factura</label>
                <input type="text" name="no_factura" class="form-control" placeholder="Numero de  factura" value="<?php echo $no_factura?>" require>
            </div> 
        </div>  
        <br>
        <br>
    </div>
</div>
            <div class="container-fluid col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="lista_mantenimiento.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                <input type="reset" class="btn btn-danger" value="cancelar">
                
            </center>
        </div>
    </form>

        <?php


}
else
{
    $id=$_GET['id'];

    ?>
    <form method="POST" action="../controller/bitacora.php?id=<?php echo $id?>" enctype="multipart/form-data">
    <br>
    <br>
        <h1>Nuevo Mantenimiento</h1>
        
            <br>
                <div class="form-row">

                        <div class="col-sm-4">
                            <label>Fecha del mantenimiento</label>
                <input type="date" name="fecha" class="form-control" id="fecha" placeholder="Introduce una fecha" required> />
                        </div>

                        <div class="col-sm-4">
                            <label>Costo</label>
                            <input name='pmarca' type="text" class="form-control" placeholder="Marca" require>
                        </div>
                                    <div class="col-sm-4">
                <label>Tipo de Moneda</label>
                <select name="tipo_moneda" id="" class="form-control">
                    <option value='1'>Quetzales</option>
                    <option value='2'>Dolares</option>
                </select>
            </div>       
            <br>
                        <div class="col-sm-4">
                            <label>No. Factura</label>
                                <input value="N/A" name='pmodelo' type="text" class="form-control" placeholder="Modelo" require>
                        </div>

                    <br><br>

                    <div class="col-sm-4">
                    <br>
                    <label>Imagen de factura</label>
                    <input type="file" name="imagen">
                    </div>
                    <br><br>
            <div class="form-row">
                <br><br>
                    <div class="col-sm-4">
                        <br>
                    <label>Descripción</label>
                    <br>
                    <textarea name='descripcion' value='N/A' cols="170" rows="2"></textarea> 
                    </div>
                </div>
                </div>

                    
            <div class="container-fluid col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="lista_mantenimiento.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
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