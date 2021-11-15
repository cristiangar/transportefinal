<?php
include_once("../models/ClassCuentasCobrar.php");

if (isset($_GET['id2']))
{
    
    if (isset($_GET['id2']) and isset($_GET['es'])and isset($_GET['id'])) {//valida si es modificar o eliminar
        $id=$_GET['id2'];
        $cxc=$_GET['id'];
        $au =new cuenta();
        $au->Eliminar($id,$cxc);
        
    }
    else 
    {
        if(isset($_GET['id']) and isset($_GET['mod'])){
        /*$id = $_GET['id'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $telefono=$_POST['telefono'];
        $telefono2=$_POST['telefono2'];
        $correo=$_POST['correo'];
        $nit=$_POST['nit'];
        $cuenta=$_POST['cuenta'];
        $banco=$_POST['banco'];
        $au =new cuenta();
        $au->ModificarCuenta($id,$nombre,$apellido,$telefono,$telefono2,$correo,$nit,$cuenta,$banco);*/
        echo "cantidad";
        }
    }

}
else
{
    if(isset($_POST ['cantidad']) and isset($_GET['id'])){

    $cantidad=$_POST['cantidad'];
    $id=$_GET['id'];

    /*echo $cantidad;*/
    
        $au =new cuenta();
        $au->IngresarAbono($cantidad,$id);

    }
    else
    {
        $cliente=new cuenta();
        $dt2=$cliente->VerCuentas();
    }

}
?>