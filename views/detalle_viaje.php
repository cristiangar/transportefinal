<?php
include_once('../controller/envio.php');
if(isset($_SESSION['usuario']))
{
    $rol=$_SESSION['rol'];
    $us=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detalle envio</title>
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
            <a class="nav-link" href="../index.php">Cerrar sesión</a>
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
        $vehiculo=$row['tipo_vehiculo'];
        $piloto=$row['npiloto'];
        $placa=$row['no_placa'];
        $fa=$row['fechaA'];
        $renta_caja=$row['renta_caja'];
        $combustible=$row['combustible'];
        if(($vehiculo=="Cabezal") or ($vehiculo=="cabezal") or ($vehiculo=='CABEZAL'))
        {
            $plataforma=$row['tipo'];
             $placa_plataforma=$row['placa'];
        }
        else
        {
            $plataforma="N/A";
            $placa_plataforma="N/A";
        }
        $estado_envio=$row['estado_envio'];
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
      <?php
        if($estado_envio=="Autorizado"){
            while($row=mysqli_fetch_array($dt3)){
                $id_envios=$row['id_envio'];
                $adelanto=$row['adelanto_piloto'];
                $pendiente=$row['pendiente_piloto'];
                $total=$row['total_pago'];
                $id_tbl_pago_piloto=$row['id_pago_piloto'];
                $combustible2=$row['combustible'];
                $rentacaja2=$row['renta_caja'];
                $tipo_moneda=$row['tipo'];
                $total_extras=$total+$combustible2+$rentacaja2;
            }
            ?>
            <h1>Datos extras</h1>
            <div class="form-row">
                <input type="text" name="id_tbl_pago_piloto" value="<?php echo $id_tbl_pago_piloto;?>"hidden>
                <div class="col-sm-3">
                    <label for="">Adelanto de piloto</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <button class="input-group-text btn-btn-primary" id="boton1"><?php echo $tipo_moneda; ?></button>
                        </div>
                        <input type="text" name="adelanto" value="<?php echo $adelanto;?>" class="form-control" readonly>   
                    </div>
                </div>   
                <div class="col-sm-3">
                    <label for="">Pendiente</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <button class="input-group-text btn-btn-primary" id="boton1"><?php echo $tipo_moneda; ?></button>
                        </div>
                        <input type="text" name="pendiente" value="<?php echo $pendiente;?>" class="form-control" readonly>  
                    </div>
                </div> 
                <div class="col-sm-3">
                    <label for="">Total a pagar al piloto</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <button class="input-group-text btn-btn-primary" id="boton1"><?php echo $tipo_moneda; ?></button>
                        </div>
                        <input type="text" name="total" value="<?php echo $total;?>" class="form-control" readonly>
                    </div>
                </div>                
            </div>
            <div class="form-row">
            <div class="col-sm-3">
                    <label for="">Renta de caja</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <button class="input-group-text btn-btn-primary" id="boton1"><?php echo $tipo_moneda; ?></button>
                        </div>
                        <input type="text" name="rentacaja" value="<?php echo $renta_caja;?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-sm-3">
                    <label for="">Combustible</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <button class="input-group-text btn-btn-primary" id="boton1"><?php echo $tipo_moneda; ?></button>
                        </div>
                        <input type="text" name="combustible" value="<?php echo $combustible;?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="col-sm-3">
                    <label for="">Total Asiganados al envio</label>
                    <div class="input-group mb-2">
                        <div class="input-group-append">
                            <button class="input-group-text btn-btn-primary" id="boton1"><?php echo $tipo_moneda; ?></button>
                        </div>
                        <input type="text" name="total_extra" value="<?php echo $total_extras;?>" class="form-control" readonly>
                    </div>
                </div>                
            </div>
            <div class="container">
                <div class="row">
                    <div class="col align-self-end">
                        <h1>Total Asignado al envio: <?php echo $total_extras;?></h1>
                        <br>
                        <form action="">
                            <input type="text" value="<?php echo $id_tbl_pago_piloto;?>" id="id_tbl_piloto" hidden>
                            <input type="text" value="<?php echo $id_envios; ?>" id="id_tbl_envio" hidden>
                            <?php
                                if(($rol=="Administrador") or ($rol=="ADMINISTRADOR") or ($rol=="administrador")){
                                    ?>
                                    <button type="button" class="btn btn-warning" id="btnenviar">Modificar extras</button>
                                    <?php

                                } 
                                else{

                                }
                            ?>
                            <script src="../js/pago_piloto.js"></script> 
                        </form>
                    </div>
                </div>
            </div>
            <?php
            
        }
      ?>
      <div class="container-fluid ">
                <br>
                <br>
            
                <?php
                    if(isset($_GET['aut']))
                    {
                        ?>
                        <h1>Agregar al envio:</h1>
                        <form action="">
                            <div class="form-row">
                                <div class="col-sm-4">
                                    <label for="">Renta de caja</label>
                                    <input type="text" class="form-control"  value="0.00" name="renta">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Combustible</label>
                                    <input type="text" class="form-control"  value="0.00" name="gas">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Adelanto</label>
                                    <input type="text" class="form-control"  value="0.00" name="adelanto">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Pendiente</label>
                                    <input type="text" class="form-control" value="0.00" name="pendiente">
                                </div>
                                <div class="col-sm-4">
                                    <label for="">Tipo Moneda</label>
                                    <?php
                                    ?>
                                </div>
                            </div>
                            <center>
                                <input type="submit" class="btn btn-success" value="Aceptar">
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
                            <a href="../views/detalle_viaje.php?id=<?php echo $_GET['id']?>"><button type="button" class="btn btn-warning" >Modificar Datos del envio</button></a>

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
    /**modificar envio */
    while ($row=mysqli_fetch_array($dt)) {
        $id_envio=$row['id_envio'];
        $codigo=$row['codigo_envio'];
        $fecha=$row['fecha_envio'];

        $id_cliente=$row['id_clientes'];
        $cliente=$row['empresa'];

        $id_receptor=$row['id_receptor'];
        $receptor=$row['nombre'];

        $id_paquete=$row['id_paquete'];
        $referencia1=$row['referencia_1'];
        $referencia2=$row['referencia_2'];
        $id_ruta=$row['id_rutas'];

        $cod_ruta=$row['codigo_ruta'];
        $origen=$row['origen'];
        $destino=$row['destino'];
        $descripcion=$row['descripcion'];
        $id_vehiculo=$row['id_vehiculo'];
        $vehiculo=$row['tipo_vehiculo'];
        $id_piloto=$row['id_piloto'];
        $piloto=$row['npiloto'];
        $placa=$row['no_placa'];
        if(($vehiculo=="Cabezal") or ($vehiculo=="cabezal") or ($vehiculo=='CABEZAL'))
        {

                $id_plataforma=$row['id_caja_seca'];
                $plataforma=$row['tipo'];
                $placa_plataforma=$row['placa'];
     

        }
        else
        {
            $id_plataforma="0";
            $plataforma="N/A";
            $placa_plataforma="N/A";
        }
    }
    ?>
     <form method="POST" action="../controller/envio.php?id=<?php echo $id_envio?>&mod" enctype="multipart/form-data">
        
      <h1>Datos del envio</h1>
      <br>
      <div class="form-row">
        <div class="col-sm-4">
          <label>Codigo envio</label>
          <input value="<?php echo $id_envio;?>" type="text" name="id_envio" class="form-control"hidden>
          <input value="<?php echo $codigo;?>" type="text" name="cod" class="form-control" placeholder="codigo envio"require>
        </div>
      </div>
      <br>

      <h1>Datos del cliente y receptor</h1>
      <br>
       <div class="form-row">
            <div class="col-sm-4">
                <div class="input-group mb-3">
                    <input value="<?php echo $id_cliente;?>" type="text" name="id_cliente" hidden>
                    <input value="<?php echo $cliente;?>" type="text" class="form-control" placeholder="cliente" id="pagina1" return false; name="Cliente">
                    <div class="input-group-append">
                        <button class="input-group-text btn-btn-primary" id="boton1">Cliente</button>
                    </div>
                </div>
            </div>

                <div class="col-sm-4">
                    <div class="input-group mb-3">
                        <input value="<?php echo $id_receptor;?>" type="text" name="id_receptor" hidden>
                        <input value="<?php echo $receptor;?>" type="text" class="form-control" placeholder="Receptor" id="pagina2" name="Receptor">
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
          <input type="text" name="id_paquete" value="<?php echo $id_paquete;?>"hidden>
            <div class="col-sm-4">
            <label>Refecrencia 1</label>
                <input value="<?php echo $referencia1;?>" type="text" name="direccion" class="form-control" placeholder="Referencia" require>
            </div>
            <div class="col-sm-4">
            <label>Referencia 2</label>
                <input value="<?php echo $referencia2;?>" type="text" name="direccionenvio" class="form-control" placeholder="Referencia">
            </div>
            <?php 
            
                $tipo=new envio();
                $dt2=$tipo->VerRuta();
            ?>
            <div class="col-sm-4">
                <label>Ruta</label>
                <select name="id_ruta" id="" class="form-control">
                    <option value="<?php echo $id_ruta?>"><?php echo $origen.'-'.$destino;?></option>
                <?php
                while($row=mysqli_fetch_array($dt2)){
                    $valor=$row['id_rutas'];
                    $texto=$row['ruta'];
                    echo '<option  value="'.$valor.'">'.$texto.'</option>';
                }
                ?>
                </select>
            </div>
            <div class="col-sm-4">
                <label>Descripción</label>
                <br>
                <textarea  calss='form-control' name="descripcion" id="" cols="110" rows="3"><?php echo $descripcion;?></textarea>
            </div>
      </div>
        <br>
      <h1>Datos del vehiculo</h1>
      <br>
      <div class="form-row">
               <div class="col-sm-4">
                  <div class="input-group mb-3">
                      <input type="text" name="id_vehiculo" value="<?php echo $id_vehiculo;?>"hidden>
                      <input type="text" name='tipo_vehiculo' value="<?php echo $vehiculo;?>"hidden>
                    <input value="<?php echo $vehiculo;?>" type="text" class="form-control" placeholder="Vehiculo" id="pagina3" name="Vehiculo">
                    <div class="input-group-append">
                      <button class="input-group-text btn-btn-primary" id="boton3">Vehiculo1</button>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="input-group mb-3">
                    <input type="text" name="id_plataforma" value="<?php echo $id_plataforma;?>"hidden>   
                    <input value="<?php echo $plataforma;?>" type="text" class="form-control" placeholder="Plataforma" id="pagina4" name="Plataforma" value="N/A">
                    <div class="input-group-append">
                      <button id="boton4" class="input-group-text btn-btn-primary">Plataforma</button>
                    </div>
                  </div>
                     <div class="form-check-inline">
                        <label class="form-check-label">
                            <input name="retirar" type="checkbox" class="form-check-input" value="">Retira caja seca
                        </label>
                    </div>
                </div>
                <div class="col-sm-4">
                  <div class="input-group mb-3">
                    <input type="text" name="id_piloto" value="<?php echo $id_piloto;?>"hidden>
                    <input value="<?php echo $piloto;?>" type="text" class="form-control" placeholder="Piloto" id="pagina5" name="Piloto">
                    <div class="input-group-append">
                      <button id="boton5" class="input-group-text btn-btn-primary">Piloto</button>
                    </div>
                  </div>
                </div>
                
      </div>
      <br>
      <div class="container-fluid col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="../views/listaviajes.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                <input type="reset" class="btn btn-danger" value="cancelar">
                
            </center>
        </div>
        <br>
        <br>
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