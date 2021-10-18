<?php
ob_flush();
include_once("../models/ClassReceptor.php");
if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new receptor();
        $au->  Eliminar($id);
        
    }
    else
    {
        if(isset($_GET['id']) and isset($_GET['mod'])){
            $id=$_GET['id'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $telefono1=$_POST['telefono1'];
            $telefono2=$_POST['telefono2'];

            $au =new receptor();
            $au->Modificar($id,$nombre,$apellido,$telefono1,$telefono2);

        }
        else{
            $id = $_GET['id'];
            $ruta=new receptor();
            $dt=$ruta->VerUno($id);
        }

    }

}
else
{
    if(isset($_POST ['nombre'])){
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $telefono1=$_POST['telefono1'];
        $telefono2=$_POST['telefono2'];
        $au = new receptor();
        $au->Ingresar($nombre,$apellido,$telefono1,$telefono2);

    }
    else
    {
        $tipo=new  receptor();
        $dt=$tipo->Ver();
    }

}
?>