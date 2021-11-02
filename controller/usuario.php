<?php
include_once("../models/ClassUsuario.php");

if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new Personal();
        $au->  Eliminar($id);
        
    }
    else
    {
        if(isset($_GET['id']) and isset($_GET['mod'])){
            $id=$_GET['id'];
            $us=$_POST['us'];
            $pwd=$_POST['pwd'];
            $rol=$_POST['id_rol'];


            $au =new Usuario();
            $au->ModificarUsuario($id,$us,$pwd,$rol);

        }
        else{
            $id = $_GET['id'];
            $usuario=new Usuario();
            $dt=$usuario->VerUnUsuario($id);
            $dtr=$usuario->VerRol();
        }

    }

}
else
{
    if(isset($_POST ['nombre'])){

    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $telefono=$_POST['telefono'];
    $telefono2=$_POST['telefono2'];
    $dpi=$_POST['dpi'];
    $correo=$_POST['correo'];
    $id_tipo_empleado=$_POST['id_tipo_empleado'];
        $au =new Personal();
        $au->IngresarPersonal($id_tipo_empleado,$nombre,$apellido,$dpi,$telefono,$telefono2,$correo);

    }
    else
    {
        $personal=new Usuario();
        $dt=$personal->VerUsuario();
    }

}
?>