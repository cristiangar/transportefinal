<?php 

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporte_viaje.xls");

 ?>
 <?php  
include_once("../controller/reporte_general_envio.php");
$resultado=$dt->num_rows;
?>
 <table class="table table-dark table-striped table-hover table-responsive-sm border="1" id="tabla_paginada">
            <thead>
              <td>Codigo envio</td>
              <td>Fecha envio</td>
              <td>Cliente</td>
              <td>Telefono cliente</td>
              <td>Estado envio</td>
              <td>Renta de Caja</td>
              <td>Combustible</td>
              <td>Receptor</td>
              <td>Referencia</td>
              <td>Descripcion</td>
              <td>Origen</td>
              <td>Destino</td>
              <td>Vehiculo</td>
              <td>Placas</td>
              <td>Operador</td>
              <td>Tel Operador</td>
              <td>Whatsapp</td>
              <td>Banco</td>
              <td>Nombre Cuenta</td>
              <td>Numero de Cuenta</td>
              <td>Tipo de Cuenta</td>
              
            </thead>
      <?php
          while ($row=mysqli_fetch_array($dt)) {
            $id=$row['id_envio'];
            $codigo=$row['codigo_envio'];
            $fecha=$row['fecha_envio'];
            $cliente=$row['empresa'];
            $telefono=$row['tel'];
            $estado=$row['estado_envio'];
            $renta_caja=$row['renta_caja'];
            $combustible=$row['combustible'];
            $receptor=$row['nombre'];
            $referencia1=$row['referencia_1'];
            $descripcion=$row['descripcion'];
            $origen=$row['origen'];
            $destino=$row['destino'];
            $codigo_ruta=$row['codigo_ruta'];
            $tipo_vehiculo=$row['tipo_vehiculo'];
            $no_placa=$row['no_placa'];
            $nombre_piloto=$row['npiloto'];
            $telpiloto=$row['telpiloto'];
            $whatsapp=$row['whatsapp'];
            $banco=$row['banco'];
            $nombre_cuenta=$row['nombre_cuenta'];
            $numcuenta=$row['numcuenta'];
            $tipo_cuenta=$row['tipo_cuenta'];

            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $codigo?></td>
                    <td><?php echo $fecha?></td>
                    <td><?php echo $cliente?></td>
                    <td><?php echo $telefono?></td>
                    <td><?php echo $estado?></td>
                    <td><?php echo $renta_caja?></td>
                    <td><?php echo $combustible?></td>
                    <td><?php echo $receptor?></td>
                    <td><?php echo $referencia1?></td>
                    <td><?php echo $descripcion?></td>
                    <td><?php echo $origen?></td>
                    <td><?php echo $destino?></td>
                    <td><?php echo $tipo_vehiculo?></td>
                    <td><?php echo $no_placa?></td>
                    <td><?php echo $nombre_piloto?></td>
                    <td><?php echo $telpiloto?></td>
                    <td><?php echo $whatsapp?></td>
                    <td><?php echo $banco?></td>
                    <td><?php echo $nombre_cuenta?></td>
                    <td><?php echo $numcuenta?></td>
                    <td><?php echo $tipo_cuenta?></td>
                    
                  </tr>
                 </tbody>
            <?php

          }
               
                echo '</table>';

                ?>