<?php
include_once('../controller/autorizar.php');
if(isset($_SESSION['usuario']))
{
    $rol=$_SESSION['rol'];
    $us=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Generar envio</title>
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
            <a class="nav-link" ><?php echo $us;?></a>
        </li>
        <li class="navbar-item">
        <a class="nav-link" href="../controller/login/login.php?log">Cerrar sesión</a>
        </li>
        
    </ul>

</nav>
<div class="container-fluid">
<?php
if(isset($_GET['id']) and isset($_GET['detalle']) ){
    /**detalle envio */
    while ($row=mysqli_fetch_array($dt)) {
        $codigo=$row['codigo_envio'];
        $fecha=$row['fecha_envio'];
        $cliente=$row['empresa'];
        $receptor=$row['nombre'];
        $referencia1=$row['referencia_1'];
        $referencia2=$row['referencia_2'];
        $cod_ruta=$row['codigo_ruta'];
        $origen=$row['origen'];
        $destino=$row['destino'];
        $descripcion=$row['descripcion'];
        $id_vehiculo=$row['id_vehiculo'];
        $vehiculo=$row['tipo_vehiculo'];
        $id_pilotos=$row['id_piloto'];
        $piloto=$row['npiloto'];
        $placa=$row['no_placa'];
        if(($vehiculo=="Cabezal") or ($vehiculo=="cabezal") or ($vehiculo=='CABEZAL'))
        {
            $id_caja=$row['id_caja_seca'];
            $plataforma=$row['tipo'];
             $placa_plataforma=$row['placa'];
        }
        else
        {
            $id_caja=0;
            $plataforma="N/A";
            $placa_plataforma="N/A";
        }
    }
    ?>
    <h1>Datos del envio</h1>
      <br>
      <div class="form-row">
        <div class="input-group mb-3">
            <h3>Fecha de Creación: <?php echo $fecha;?></h3>
        </div>
        <div class="col-sm-4">
          <label>Codigo envio</label>
          <input value="<?php echo $codigo;?>" type="text" name="cod" class="form-control" placeholder="codigo envio"readonly>
        </div>

      </div>
      <br>           
      <h1>Datos del cliente y receptor</h1>
      <br>
       <div class="form-row">
                <div class="col-sm-4">
                    <div class="input-group mb-3">
                        <input value="<?php echo $cliente;?>" type="text" class="form-control" placeholder="Cliente" id="pagina1" return false; name="Cliente"readonly>
                        <div class="input-group-append">
                            <button class="input-group-text btn-btn-primary" id="boton1">Cliente</button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="input-group mb-3">
                        <input value="<?php echo $receptor;?>" type="text" class="form-control" placeholder="Receptor" id="pagina2" name="Receptor"readonly>
                            <div class="input-group-append">
                                <button  class="input-group-text btn-btn-primary" id="boton2" return false;>Receptor</button>
                            </div>
                    </div>
                </div>           
      </div>
       <br>
       <h1>Datos del paquete</h1>
      <br>
      <div class="form-row">
            <div class="col-sm-4">
            <label>Refecrencia 1</label>
                <input value="<?php echo $referencia1;?>" type="text" name="direccion" class="form-control" placeholder="Referencia" readonly>
            </div>
            <div class="col-sm-4">
            <label>Referencia 2</label>
                <input value="<?php echo $referencia2;?>" type="text" name="direccionenvio" class="form-control" placeholder="Referencia"readonly>
            </div>

            <div class="col-sm-4">
                <label>Ruta</label>
                <input value=<?php echo $cod_ruta;?> type="text" name="" class="form-control" placeholder="codigo ruta"readonly>
            </div>
            <div class="col-sm-4">
                <label>origen</label>
                <input value="<?php echo $origen;?>" type="text" name="" class="form-control" placeholder="codigo ruta"readonly>
            </div>
            <div class="col-sm-4">
                <label>Destino</label>
                <input value="<?php echo $destino;?>" type="text" name="" class="form-control" placeholder="codigo ruta"readonly>
            </div>
            <div class="col-sm-4">

            </div>
            <div class="col-sm-4">
                <label>Descripción</label>
                <br>
                <textarea  calss='form-control' name="descripcion" id="" cols="110" rows="3"readonly><?php echo $descripcion;?></textarea>
            </div>
      </div>
        <br>
        <h1>Datos del vehiculo</h1>
      <br>
      <div class="form-row">
               <div class="col-sm-4">
                    <label>Vehiculo</label> 
                    <input value="<?php echo $vehiculo;?>"  type="text" class="form-control" placeholder="Vehiculo" id="pagina3" name="Vehiculo"readonly>
                </div>
                <div class="col-sm-4">
                    <label>No. placa</label>
                    <input value="<?php echo $placa;?>" type="text" name="" class="form-control" placeholder="codigo ruta"readonly>
                </div>
                <div class="col-sm-4">
                    <label for="">Piloto</label>
                    <input type="text" class="form-control"   name="Piloto" value="<?php echo $piloto;?>" readonly>
                </div>   

                <div class="col-sm-4">
                    <label for="">Plataforma</label>
                    <input type="text" class="form-control" placeholder="Plataforma" id="pagina4" name="Plataforma" value="<?php echo $plataforma;?>" readonly>
                </div>
                <div class="col-sm-4">
                    <label for="">No. placa de la plataforma</label>
                    <input type="text" class="form-control" placeholder="Plataforma" id="pagina4" name="Plataforma" value="<?php echo $placa_plataforma;?>" readonly>
                </div>

          
      </div>
      <br>
      <div class="container-fluid ">
                <br>
                <br>
            
                <?php
                    if(isset($_GET['aut']))
                    {
                        ?>
                        <h1>Agregar al envio:</h1>
                        <form method="POST" action="../controller/autorizar.php" >
                            <div class="form-row">
                            <input type="text"  name="idEnvio" value="<?php echo $_GET['id']?>" hidden>
                            <input type="text"  name="idPiloto" value="<?php echo $id_pilotos;?>" hidden>
                            <input type="text"  name="idVehiculo" value="<?php echo $id_vehiculo; ?>" hidden>
                            <input type="text"  name="idCaja" value="<?php echo   $id_caja; ?>" hidden>
                                <div class="col-sm-4">
                                    <label for="">Tipo Moneda</label>
                                    <select name="id_moneda" id="" class="form-control">        
                                    <?php
                                        while($row=mysqli_fetch_array($dt2)){
                                            $valor=$row['id_tipo_moneda'];
                                            $texto=$row['tipo'];
                                            echo '<option  value="'.$valor.'">'.$texto.'</option>';
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Renta de caja</label>
                                    <input type="number" step="0.01" class="form-control" value="0.00"  name="renta">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Combustible</label>
                                    <input type="number" step="0.01" class="form-control" value="0.00"  name="gas">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Adelanto</label>
                                    <input type="number" step="0.01" class="form-control" value="0.00"  name="adelanto">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Pendiente</label>
                                    <input type="number" step="0.01" class="form-control" value="0.00" name="pendiente">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Total A Pagar</label>
                                    <input type="number" step="0.01" class="form-control" value="0.00"  name="total_pagar">
                                </div>
                            </div>
                            <br>
                            <center>
                                <input type="submit" class="btn btn-success" value="Actualizar">
                                <a href="listaviajesnoautorizados.php"><button type="button" class="btn btn-warning" >Regresar</button></a> 
                                <input type="reset" class="btn btn-danger" value="cancelar">
                            </center>
                        </form>
                        <?php
                    }
                    else{
                        ?>
                            <center>
                            <a href="../views/listaviajes.php"><button type="button" class="btn btn-success" >Regresar</button></a>
                            <a href="../views/detalle_viaje.php?id=<?php echo $_GET['id']?>"><button type="button" class="btn btn-warning" >Modificar</button></a>

                            </center>

                        <?php
                    }
                ?>
            
        </div>
        <br>
        <br>
    <?php
}
else{
   
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