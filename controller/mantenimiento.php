<?php
include_once("../models/ClassMantenimiento.php");

if (isset($_GET['id2']))
{
    
    if (isset($_GET['id2']) and isset($_GET['es'])and isset($_GET['id'])) {//valida si es modificar o eliminar
        $id2=$_GET['id2'];
        $au =new bitacora();
        $au->Eliminar($id2);
        
    }
    else 
    {
        if(isset($_GET['id']) and isset($_GET['mod'])and isset($_GET['id2'])){
        $id2=$_GET['id2'];
        $descripcion=$_POST['descripcion'];
        $au =new bitacora();
        $au->ModificarBitacora($id2,$descripcion);
        }
    }

}
else
{
    if(isset($_POST ['descripcion']) and isset($_GET['id'])){

    $id=$_GET['id'];
    $descripcion=$_POST['descripcion'];

    /*echo $cantidad;*/
    
        $au =new bitacora();
        $au->IngresarBitacora($id,$descripcion);

    }
    else
    {
        $cliente=new encabezado();
        $dt=$cliente->VerEncabezado();
    }

}
?>