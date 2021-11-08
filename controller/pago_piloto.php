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
            $ruta=new empleado();
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