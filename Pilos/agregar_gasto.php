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
?>
 <form method="POST" action="../controller/piloto.php?id=<?php echo $id?>&mod" enctype="multipart/form-data">
    <h1>Datos del piloto a modificar</h1>
     <br>
        <div class="form-row">
            <div class="col-sm-4">
                <label>Nombre</label>
                <input value='<?php echo $nombre;?>' name="nombre" type="text" class="form-control" placeholder="Nombre" onkeypress="return (event.charCode==241 || event.charCode==32 || event.charCode >= 97 && event.charCode <= 122)" require>
            </div>
            <div class="col-sm-4">
                <label>Apellido</label>
                <input value='<?php echo $apellido;?>' name="apellido" type="text" class="form-control" placeholder="Apellido" onkeypress="return (event.charCode==241 || event.charCode==32 || event.charCode >= 97 && event.charCode <= 122)" require>
            </div>
            <div class="col-sm-4">
                <label>No.DPI</label>
                <input value='<?php echo $dpi;?>' name="cui" type="text" class="form-control" placeholder="DPI" require>
            </div>
            <div class="col-sm-4">
                <label>Telefono</label>
                <input type="text" name="telefono" class="form-control" placeholder="solo números"   onkeyup="Card(event, this)" maxlength="13" value="<?php echo  $telefono?>" require>
            </div>
            <div class="col-sm-4">
                <label>WhatsApp</label>
                <input value='<?php echo $whatsapp;?>' type="text" value='N/A' name="wp" class="form-control" placeholder="solo números"   onkeyup="Card(event, this)" maxlength="13"  require>
            </div>
            <div class="col-sm-4">
                <label>contacto de emergencia</label>
                <input name="contacto_emergencia" value='<?php echo $contacto_emergencia;?>' type="text" class="form-control" onkeypress="return (event.charCode==241 || event.charCode >= 97 && event.charCode <= 122)" placeholder="Correo" require>
            </div>
            <div class="col-sm-4">
                <label>Numero de energencia</label>
                <input name="numero_emergencia" value='<?php echo $numero_emergencia;?>' type="text" class="form-control" placeholder="Correo" require>
            </div>
            <div class="col-sm-4">
                <label>Correo</label>
                <input value='<?php echo $correo;?>' name="correo" value='N/A' type="text" class="form-control" placeholder="Correo" require>
            </div>
            <?php 
                $tipo_empleado=new piloto();
                $dt=$tipo_empleado->VerTipoEmpleado();
            ?>
            <div class="col-sm-4">
                <label>Tipo de Piloto</label>
                <select name="id_tipo_empleado" id="" class="form-control">
                <option value="<?php echo $id_tipo_piloto; ?>"><?php echo $tipo_piloto; ?></option>
                <?php
                while($row=mysqli_fetch_array($dt2)){
                    $valor=$row['id_tipo_piloto'];
                    $texto=$row['tipo'];
                    echo '<option  value="'.$valor.'">'.$texto.'</option>';
                }
                ?>
                </select>
            </div>
            <?php
            if($ruta_imagen_dpi=="N/A")//verifico si hay imagen que mostrar S
            {
                ?>
                            
                <div class="col-sm-4">
                    <br>
                    <label>Imagen de DPI</label>
                    <div class="container-fluid">
                        <input type="file" name="imgDPI">
                    </div>
                </div> 
                <input value='<?php echo $ruta_imagen_dpi;?>' name="ruta_dpi" type="hidden">
                <?php
            }
            else
            {
                 ?>
                <div class="col-sm-4">
                <label>Imagen actual</label><br>
                <img src="<?php echo $ruta_imagen_dpi;?>"width="400" height="200" alt="">
                </div>

                <div class="col-sm-4">
                <br>
                    <label>Seleccione una imagen si quiere cambiar la actual</label>
                    <div class="container-fluid">
                        <input type="file" name="imgDPI">
                    </div>
                </div>
                <input value='<?php echo $ruta_imagen_dpi;?>' name="ruta_dpi" type="hidden">
                 <?php   
            }
?>
        

        </div>
        <br>

        <h1>Datos de licencia</h1>
        <br>
        <div class="form-row">
            <div class="col-sm-4">
                <label>No. licencia</label>
                <input value='<?php echo $licencia;?>' name="licencia" type="text" class="form-control" placeholder="No.licencia" require>
            </div>
            <div class="col-sm-4">
                <label>Tipo Licencia</label>
                <select name="tlicencia" id="" class="form-control">
                    <option value='A'>A</option>
                    <option value='B'>B</option>
                    <option value='C'>C</option>
                </select>
            </div>
            <div class="col-sm-4">
                <label>Fecha de vencimiento</label>
                <input type="date" value='<?php echo date('Y-m-d',strtotime($fecha_licencia));?>' name="fecha" class="form-control" id="fecha" placeholder="Introduce una fecha" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?> />
            </div>

<?php
            if($ruta_imagen_licencia=="N/A")
            {
                ?>
            <div class="col-sm-4">
                <label>Imagen Licencia</label>
                <div class="container-fluid">
                    <input type="file" name="imglicencia">
                </div>
            </div>    
            <input value='<?php echo $ruta_imagen_licencia;?>' name="ruta_licencia" type="hidden">            
                <?php
            }
            else{
                ?>
                <div class="col-sm-4">
                <label>Imagen actual</label><br>
                    <div class="container-fluid">
                    <img src="<?php echo $ruta_imagen_licencia;?>" width="400" height="200" alt="">
                    </div>
                </div>

                <div class="col-sm-4">
                    <label>Seleccione una imagen si quiere cambiar la actual</label>
                    <div class="container-fluid">
                        <input type="file" name="imglicencia">
                    </div>
                </div>
                <input value='<?php echo $ruta_imagen_licencia;?>' name="ruta_licencia" type="hidden">
                <?php
            }
?>   

        </div>
        <br>

        <h1>Datos del Pasaporte</h1>
        <br>
        <div class="form-row">
            <div class="col-sm-4">
                <label>No.Pasaporte</label>
                <input value='<?php echo $pasaporte;?>' name="pasaporte" type="number" class="form-control" value="N/A">
            </div>
<?php
            if($ruta_imagen_pasaporte=='N/A'){
                ?>
                <div class="col-sm-4">
                    <label>Imagen Pasaporte</label>
                    <div class="container-fluid">
                        <input type="file" name="imgPasaporte">
                    </div>
                </div>
                <input value='<?php echo $ruta_imagen_pasaporte;?>' name="ruta_pasaporte" type="hidden">
                <?php
            }
            else{
                ?>
            <div class="col-sm-4">
            <label>Imagen actual</label><br>
            <img src="<?php echo $ruta_imagen_pasaporte;?>"width="400" height="200" alt="">
            </div>

            <div class="col-sm-4">
                <label>Seleccione una imagen si quiere cambiar la actual</label>
                <div class="container-fluid">
                    <input type="file" name="imgPasaporte">
                </div>
            </div>
            <input value='<?php echo $ruta_imagen_pasaporte;?>' name="ruta_pasaporte" type="hidden">
                <?php

            }
?>      

        

        </div>
        <br>
        <br>
        <h1>Datos bancarios</h1>
        <br>
        <div class="form-row">
            <div class="col-sm-4">
                <label>Banco</label>
                <input value="<?php echo $banco;?>" name="banco"  type="text" class="form-control" placeholder="Banco" require>
            </div>
            <div class="col-sm-4">
                <label>Nombre de la cuenta</label>
                <input value="<?php echo $nombre_cuenta;?>" name="Ncuenta"  type="text" class="form-control" placeholder="Nombre de la cuenta" require>
            </div>
            <div class="col-sm-4">
                <label>No.cuenta de banco</label>
                <input value="<?php echo $numero_cuenta;?>" name="cuenta_banco"  type="text" class="form-control" placeholder="No.cuenta" require>
            </div>
            <div class="col-sm-4">
                <label>Tipo de cuenta</label>
                <input value="<?php echo $tipo_cuenta;?>" name="tipo_cuenta"  type="text" class="form-control" placeholder="tipo cuenta" require>
            </div>
        </div>
        <div class="container-fluid wrapper fadeInDown col-sm-5">
                <br>
                <center>
                    <input type="submit" class="btn btn-success" value="Aceptar">
                    <a href="lista_piloto.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                    <input type="reset" class="btn btn-danger" value="cancelar">
                    <br>
                    <br>
                    <br>
                    
                </center>
            </div>

    </form>
<?php
    

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
            include_once('../controller/gastos_piloto.php');

            ?>
            <div class="col-sm-4">
                <label>Tipo de Piloto</label>
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