<?php
include_once("../models/ClassAbonos.php");

if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new cliente();
        $au->  Eliminar($id);
        
    }
    else
    {
        if(isset($_GET['id']) and isset($_GET['mod'])){
            $id=$_GET['id'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $telefono=$_POST['telefono'];
            $cui=$_POST['cui'];
            $correo=$_POST['correo'];

            $au =new empleado();
            $au->Modificar($id,$nombre,$apellido,$cui,$telefono,$correo);

        }
        else{
            $id = $_GET['id'];
            $abono=new abonos();
            $dt=$abono->VerUno($id);
        }
    }

}
else
{
    if(isset($_POST ['id_pagos'])){

        $id_pago=$_POST['id_pagos'];
        $boleta=$_POST['boletas'];
        $abono=$_POST['abono'];
        $moneda=$_POST['id_monedas'];
        $au =new PagoPiloto();
        $au->Ingresar($id_pago,$boleta,$abono,$moneda);  

    }
    else
    {
        if(isset($_POST['abono'])){
            $id_pago_piloto=$_POST['id_pago_piloto'];
            $abono=$_POST['abono'];
            $moneda=$_POST['moneda'];
            $total=$_POST['total'];
            $pendiente=$_POST['pendiente'];
            $descripcion=$_POST['descripcion'];
            if($abono>$total){
                ?>
                <script language = javascript>
                self.location="../views/Agregar_Abono.php?id=<?php echo $id_pago_piloto;/*id pago del piloto*/?>&moneda=<?php echo $moneda;?>&t=<?php echo $total;?>&p=<?php echo $pendiente;?>&error" 
                </script>
                <?php
            }
            else{
                if($abono<=$pendiente)
                {
                    $au =new abonos();
                    $au->IngresarAbono($id_pago_piloto,$descripcion,$abono,$moneda); 
                }
                else{
                    ?>
                    <script language = javascript>
                    self.location="../views/Agregar_Abono.php?id=<?php echo $id_pago_piloto;/*id pago del piloto*/?>&moneda=<?php echo $moneda;?>&t=<?php echo $total;?>&p=<?php echo $pendiente;?>&error2" 
                    </script>
                    <?php
                }
            }
        }
        else{
            $abono=new abonos();
            $dt=$abono->Ver();
        }
    }

}
?>