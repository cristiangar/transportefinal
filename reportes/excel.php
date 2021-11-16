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
              
            </thead>
      <?php
          while ($row=mysqli_fetch_array($dt)) {
            $id=$row['id_envio'];
            $codigo=$row['codigo_envio'];
            $fecha=$row['fecha_envio'];
            $cliente=$row['empresa'];
            $telefono=$row['tel'];
            $estado=$row['estado_envio'];
            ?>
                  <tbody id="myTable">
                  <tr>
                    <td><?php echo $codigo?></td>
                    <td><?php echo $fecha?></td>
                    <td><?php echo $cliente?></td>
                    <td><?php echo $telefono?></td>
                    <td><?php echo $estado?></td>
                    
                  </tr>
                 </tbody>
            <?php

          }
               
                echo '</table>';

                ?>