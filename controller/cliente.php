<?php
include_once("../models/ClassCliente.php");

if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new cliente();
        $au->  Eliminar($id);
        
    }
    else
    {
        
        $id = $_GET['id'];
        $nombre=$_POST['nombre'];
        $telefono=$_POST['telefono'];
        $telefono2=$_POST['telefono2'];
        $correo=$_POST['correo'];
        $nit=$_POST['nit'];
        $cuenta=$_POST['cuenta'];
        $banco=$_POST['banco'];
        $au =new cliente();
        $au->ModificarCliente($id,$nombre,$telefono,$telefono2,$correo,$nit,$cuenta,$banco);


    }

}
else
{
    if(isset($_POST ['nombre'])){

    $nombre=$_POST['nombre'];
    $telefono=$_POST['telefono'];
    $telefono2=$_POST['telefono2'];
    $correo=$_POST['correo'];
    $nit=$_POST['nit'];
    $cuenta=$_POST['cuenta'];
    $banco=$_POST['banco'];

        $au =new cliente();
        $au->Ingresarcliente($nombre,$telefono,$telefono2,$correo,$nit,$cuenta,$banco);  

    }
    else
    {
        $cliente=new cliente();
        $dt2=$cliente->Verclientes();
    }

}
?>