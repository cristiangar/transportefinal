<?php
ob_flush();
include_once("../models/ClassAutorizar.php");
if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new envio();
        $au->  Eliminar($id);
        
    }
    else
    {
        if(isset($_GET['id']) and isset($_GET['mod'])){
           // $au =new envio();
            //$au->Modificar($id, $id_paquete, $codigo_envio, $cliente, $receptor, $referencia1, $referencia2,$descripcion, $ruta, $vehiculo, $caja, $retiro_caja, $piloto);
        }
        else{
            $id = $_GET['id'];
            $ruta=new Autorizar ();
            $dt=$ruta->VerUno($id);
            $dt2=$ruta->VerMoneda();

        }

    }

}
else
{
    if(isset($_POST ['idPiloto'])){
        $idenvio=$_POST['idEnvio'];
        $renta_caja=$_POST['renta'];
        $combustible=$_POST['gas'];
        $adelanto=$_POST['adelanto'];
        $pendiente=$_POST['pendiente'];
        $total=$_POST['total_pagar'];
        $id_moneda=$_POST['id_moneda'];
        $id_piloto=$_POST['idPiloto'];
        $id_vehiculo=$_POST['idVehiculo'];
        $id_caja=$_POST['idCaja'];
 

       $au = new Autorizar();
       $au->Ingresar($idenvio, $renta_caja, $combustible, $adelanto, $pendiente, $total, $id_moneda, $id_piloto, $id_vehiculo, $id_caja);

    }
    else
    {
        $tipo=new Autorizar();
        $dt=$tipo->Ver();
        $dt2=$tipo->VerMoneda();
    }

}
?>