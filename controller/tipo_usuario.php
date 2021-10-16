<?php
include_once("../models/ClassTipoUsuario.php");

if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new rol_usuario();
        $au->  Eliminar($id);
        
    }
    else
    {
        
        $id = $_GET['id'];
        $nombre=$_POST['nombre'];

        $au =new rol_usuario();
        $au->ModificarRolUsuario($id,$nombre);

    }

}
else
{
    if(isset($_POST ['nombre'])){

    $nombre=$_POST['nombre'];

    /*$nombreimg=$_FILES['imagen']['name'];//carga el nombre de la imagen
    $archivo=$_FILES['imagen']['tmp_name'];//carga el archivo
    $ruta="../imagen_dpi";//es el nbombre de la carpeta
    $ruta=$ruta."/".$nombreimg;//la ruta de la imagen
    move_uploaded_file($archivo, $ruta);//mueve la imagen ala ruta*/

        $au =new rol_usuario();
        $au->IngresarRolUsuario($nombre);  

    }
    else
    {
        $rol_usuario=new rol_usuario();
        $dt2=$rol_usuario->VerRolUsuario();
    }

}
?>