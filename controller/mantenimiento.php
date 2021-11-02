<?php
include_once("../models/ClassMantenimiento.php");

if (isset($_GET['id2']))
{
    
    if (isset($_GET['id2']) and isset($_GET['es'])and isset($_GET['id'])) {//valida si es modificar o eliminar
        $id2=$_GET['id2'];
        $au =new mantenimiento();
        $au->Eliminar($id2);
        
    }
    else 
    {
        if(isset($_GET['id']) and isset($_GET['mod'])and isset($_GET['id2'])){
        $id2=$_GET['id2'];
        $descripcion=$_POST['descripcion'];
        if(empty($_FILES['imagenfactura']['name'])){
            $imagenfac=$_POST['ruta_factura'];
        }
        else{
            $nombreimfac=$_FILES['imagenfactura']['name'];//carga el nombre de la imagen
            $archivofact=$_FILES['imagenfactura']['tmp_name'];//carga el archivo
            $imagenfac="../imagen_caat";//es el nbombre de la carpeta
            $imagenfac=$imagenfac."/".$nombreimfact;//la ruta de la imagen
            move_uploaded_file($archivofact, $imagenfac);//mueve la imagen ala ruta*/
        
        }

        $au =new mantenimiento();
        $au->ModificarBitacora($id2,$descripcion);
        }
    }

}
else
{
    if(isset($_POST ['descripcion']) and isset($_GET['id'])){

    $id=$_GET['id'];
    $fecha=$_POST['fecha'];
    $costo=$_POST['costo'];
    $tipo_moneda=$_POST['tipo_moneda'];
    $no_factura=$_POST['no_factura'];

    if(empty($_FILES['imagenfactura']['name'])){
            $imagenfac='N/A';
        }
        else{
            $nombreimgfac=$_FILES['imagenfactura']['name'];//carga el nombre de la imagen
            $archivofact=$_FILES['imagenfactura']['tmp_name'];//carga el archivo
            $imagenfac="../imagen_factura_mantenimiento";//es el nbombre de la carpeta
            $imagenfac=$imagenfac."/".$nombreimgfac;//la ruta de la imagen
            move_uploaded_file($archivofact, $imagenfac);//mueve la imagen ala ruta*/
        
        }
    
    $descripcion=$_POST['descripcion'];

    
        $au =new mantenimiento();
        $au->IngresarMantenimiento($fecha,$descripcion,$costo,$no_factura,$imagenfac,$id,$tipo_moneda);

    }
    else
    {
        $cliente=new encabezado();
        $dt=$cliente->VerEncabezado();
    }

}
?>