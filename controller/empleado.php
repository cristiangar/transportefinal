<?php
ob_flush();
include_once("../models/ClassEmpleado.php");
if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new empleado();
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
    if(isset($_POST ['nombre'])){
        $rol=$_POST['rol'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $telefono=$_POST['telefono'];
        $cui=$_POST['cui'];
        $correo=$_POST['correo'];
        $au = new empleado();
        $au->Ingresar($rol,$nombre,$apellido,$telefono,$cui,$correo);

    }
    else
    {
        $tipo=new empleado();
        $dt=$tipo->Ver();
        $dt2=$tipo->VerRol();

    }

}
?>