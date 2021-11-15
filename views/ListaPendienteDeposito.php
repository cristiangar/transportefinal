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
    <title>Lista de deposito</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="../css/index.css" rel="stylesheet"/>
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
  include_once("../controller/pago_piloto.php");
  $resultado=$dt->num_rows;
  if($resultado>0){
    if(isset($_POST['idenvio']))
    {
      $idEnvio =$_POST['idenvio'];
      $idPago=$_POST['idpago'];
      $idMonedas=$_POST['idMoneda'];
      $tmonedas=$_POST['tmonedas'];
      $cod_viaje=$_POST['cod_envio'];
      $pilotos=$_POST['piloto'];
      $bancos=$_POST['banco'];
      $nocuenta=$_POST['no_cuenta'];
      $adelantos=$_POST['adelanto'];
      $pendientes=$_POST['pendiente'];
      $totales=$_POST['total'];
      ?>
      <form method="POST" action="../controller/pago_piloto.php">
        <div class="container-fluid">
          <h1>Viaje seleccionado: <?php echo $cod_viaje;?></h1>
          <div class="form-row">
          <input  type="text" name="id_pagos" value="<?php echo $idPago;?>" hidden/>
          <input  type="text" name="id_monedas" value="<?php echo $idMonedas;?>" hidden/>
            <div class="col-sm-4"> 
              <h4>Piloto</h4>
              <input class="form-control" type="text" value="<?php echo $pilotos;?>" readonly />
            </div>
            <div class="col-sm-4"> 
              <h4>Banco</h4>
              <input class="form-control" type="text" value="<?php echo $bancos;?>" readonly />
            </div>
            <div class="col-sm-4"> 
              <h4>No. Cuenta</h4>
              <input class="form-control" type="text" value="<?php echo $nocuenta;?>" readonly />
            </div>
            <div class="col-sm-4"> 
              <h4>Adelanto</h4>
                <div class="input-group mb-3">
                    <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon1"><?php echo $tmonedas;?></span>
                    </div>
                    <input class="form-control" name="abono" type="text" value="<?php echo $adelantos;?>" readonly />
                </div>
            </div>
            <div class="col-sm-4"> 
              <h4>Pendiente</h4>
              <div class="input-group mb-3">
              <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon1"><?php echo $tmonedas;?></span>
              </div>
              <input class="form-control" type="text" value="<?php echo $pendientes;?>" readonly />
              </div>
            </div>
            <div class="col-sm-4"> 
              <h4>Total</h4>
              <div class="input-group mb-3">
                <div class="input-group-append">
                      <span class="input-group-text" id="basic-addon1"><?php echo $tmonedas;?></span>
                </div>
                <input class="form-control" type="text" value="<?php echo $totales;?>" readonly />  
              </div>
            </div>
            <div class="col-sm-4"> 
              <h4>No. boleta deposito</h4>
              <input class="form-control" name="boletas" type="text" plaseholder="NO. Boleta" require/>
            </div>
            <br>
        </div>
          <br>
          <div class="col-sm-4"> 
            <input type="submit" name="Deposito" class="btn btn-success" value="Depositar">
          </div>
        </div>
        <br>
      </form>
      <?php
    }
    ?>
      <h1>Viajes listos para depositar</h1>
      <br>
      <input class="form-control" id="myInput" type="text" placeholder="buscar..">
      <br>
      <div class="table-responsive">
                        <table class="table table-bordered table-dark table-hover" id="tabla_paginada">
                            <thead>
                                <tr>
                                    <th>No. Viaje</th>
                                    <th>Operador</th>
                                    <th>Cliente</th>
                                    <th>Pais</th>
                                    <th>Adelanto</th>
                                    <th>Pendiente Complemento</th>
                                    <th>Total</th>
                                    <th>Renta de caja</th>
                                    <th>Combustible</th>
                                    <th>Tipo de Cuenta</th>
                                    <th>Banco</th>
                                    <th>No. Cuenta</th>
                                    <th>Cuentahabiente</th>
                                    <th>Telefono</th>
                                    <th>Seleccionar</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                              <?php
                                    while ($row=mysqli_fetch_array($dt)) {
                                      $id_pago_piloto=$row['id_pago_piloto'];
                                      $id_envio=$row['id_envio'];
                                      $idMoneda=$row['id_tipo_moneda'];
                                      $tmoneda=$row['moneda'];
                                      $codigo_envio=$row['codigo_envio'];
                                      $id_piloto=$row['id_piloto'];
                                      $piloto=$row['piloto'];
                                      $id_clientes=$row['id_clientes'];
                                      $empresa=$row['empresa'];
                                      $origen=$row['origen'];
                                      $adelanto_piloto=$row['adelanto_piloto'];
                                      $pendiente_piloto=$row['pendiente_piloto'];
                                      $total_pago=$row['total_pago'];
                                      $renta_caja=$row['renta_caja'];
                                      $combustible=$row['combustible'];
                                      $tipo_cuenta=$row['tipo_cuenta'];
                                      $banco=$row['banco'];
                                      $no_cuenta=$row['no_cuenta'];
                                      $nombre_cuenta=$row['nombre_cuenta'];
                                      $tel_piloto=$row['tel_piloto'];
                                      ?>
                                        <tr>
                                            <td><?php echo $codigo_envio;?></td>
                                            <td><?php echo $piloto;?></td>
                                            <td><?php echo $empresa;?></td>
                                            <td><?php echo $origen;?></td>
                                            <td><?php echo $adelanto_piloto;?></td>
                                            <td><?php echo $pendiente_piloto;?></td>
                                            <td><?php echo $total_pago;?></td>
                                            <td><?php echo $renta_caja;?></td>
                                            <td><?php echo $combustible;?></td>
                                            <td><?php echo $tipo_cuenta;?></td>
                                            <td><?php echo $banco;?></td>
                                            <td><?php echo $no_cuenta;?></td>
                                            <td><?php echo $nombre_cuenta;?></td>
                                            <td><?php echo $tel_piloto;?></td>
                                            <form method="POST" action="ListaPendienteDeposito.php">
                                              <input type="text" name="idpago" value="<?php echo $id_pago_piloto;?>" hidden>
                                              <input type="text" name="idenvio" value="<?php echo $id_envio;?>"hidden>
                                              <input type="text" name="idMoneda" value="<?php echo $idMoneda;?>"hidden>
                                              <input type="text" name="tmonedas" value="<?php echo $tmoneda;?>"hidden>
                                              <input type="text" name="cod_envio" value="<?php echo $codigo_envio;?>"hidden>
                                              <input type="text" name="piloto" value="<?php echo $piloto;?>"hidden>
                                              <input type="text" name="banco" value="<?php echo $banco;?>"hidden>
                                              <input type="text" name="no_cuenta" value="<?php echo $no_cuenta;?>"hidden>
                                              <input type="text" name="adelanto" value="<?php echo $adelanto_piloto;?>"hidden>
                                              <input type="text" name="pendiente" value="<?php echo $pendiente_piloto;?>"hidden>
                                              <input type="text" name="total" value="<?php echo $total_pago;?>"hidden>
                                            <td><center><input type="submit" class="btn btn-success" value="Seleccionar"></center></td>
                                            </form>
                                            
                                        </tr>                                        
                                      <?php
                                    }
                              ?>
                            </tbody>
                              <tfoot>
                                <td><input type="button" id="cargar_primera_pagina" value="<< Primero"/></td>
                                <td><input type="button" id="cargar_anterior_pagina" value="< Anterior"/></td>
                                <td></td>
                                <td></td>
                                <td id="indicador_paginas"></td>
                                <td>
                                </td>
                                <td></td>
                                <td><input type="button" id="cargar_siguiente_pagina" value="Siguiente >"/></td>
                                <td><input type="button" id="cargar_ultima_pagina" value="Ultimo >>"/></td>
                              </tfoot>
                        </table>
        </div>
        <div class="container-fluid">
          <center>
          <a href="ViewAdministrador.php"><button type="button" class="btn btn-warning btn-lg" >Regresar</button></a>
          </center>
        </div>

    <?php
  }
  else{
    ?> 
    <center>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br><br><br><br>
      <h1>No hay datos ingresados</h1>
      <a href="ViewAdministrador.php"><button type="button" class="btn btn-warning btn-lg" >Regresar</button></a>
    </center>
    <?php
  }
?>

</div>
</body>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

</html>
<?php
}

else{/**else de la session */
    header("location: ../Index.php");
}/**ses */
?>