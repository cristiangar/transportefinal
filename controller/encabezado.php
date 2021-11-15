<?php
include_once("../models/ClassEncabezado.php");

if (isset($_GET['id2']))
{
    
    if (isset($_GET['id2']) and isset($_GET['es'])and isset($_GET['id'])) {//valida si es modificar o eliminar
        $id=$_GET['id2'];
        $ide=$_GET['id'];
        $au =new encabezado();
        $au->Eliminar($id,$ide);
        
    }
    else 
    {
        if(isset($_GET['id']) and isset($_GET['mod'])and isset($_GET['id2'])and isset($_GET['id_moneda'])){
        $id2=$_GET['id2'];
        $id=$_GET['id'];
        $id_moneda=$_GET['id_moneda'];
        $descripcion=$_POST['descripcion'];
        $subtotal=$_POST['subtotal'];
        $au =new encabezado();
        $au->ModificarDetalle($id,$id2,$descripcion,$subtotal,$id_moneda);
        }
    }

}
else
{
    if(isset($_POST ['subtotal']) and isset($_GET['id'])){

    $cantidad=$_POST['subtotal'];
    $id=$_GET['id'];
    $id_moneda=$_GET['id_moneda'];
    $descripcion=$_POST['descripcion'];

    /*echo $cantidad;*/
    
        $au =new encabezado();
        $au->IngresarEncabezado($cantidad,$id,$descripcion,$id_moneda);

    }
    else
    {
        $cliente=new encabezado();
        $dt=$cliente->VerEncabezado();
    }

}
?>