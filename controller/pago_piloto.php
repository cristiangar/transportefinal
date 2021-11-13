<?php
include_once("../models/ClassPagoPiloto.php");

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
            $id_pago_piloto=$_POST['id_tbl_pago'];
            $id_envio=$_POST['id_tbl_envio'];
            $adelanto=$_POST['adelanto'];
            $pendiente=$_POST['pendiente'];
            $renta_caja=$_POST['renta_caja'];
            $combustible=$_POST['gasolina'];
            $au =new PagoPiloto();
            $au->Modificar($id_pago_piloto,$id_envio,$adelanto,$pendiente,$renta_caja,$combustible);
        }
        else{
            $id = $_GET['id_pago'];
            $ruta=new PagoPiloto();
            $dt=$ruta->VerUno($id);
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
        $ruta=new PagoPiloto();
        $dt=$ruta->Ver();
    }

}
?>