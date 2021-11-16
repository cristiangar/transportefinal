<?php
ob_flush();
include_once("../models/ClassGastosPiloto.php");
if (isset($_GET['id_envio']))
{
    
    if (isset($_GET['id_envio']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id_envio'];
        $idenvio=$_GET['es'];
        $au =new GastoPiloto();
        $au->Eliminar($id,$idenvio);
    }
    else
    {
        if(isset($_GET['id']) and isset($_GET['mod'])){
            /*$id=$_GET['id'];
            $origen=$_POST['origen'];
            $destino=$_POST['destino'];
            $cond=$_POST['codigo'];

            $au =new rutas();
            $au->Modificar($id,$origen,$destino,$cond);*/

        }
        else{
            $id = $_GET['id_envio'];
            $ruta=new GastoPiloto();
            $dt=$ruta->Ver($id);
        }

    }

}
else
{
    if(isset($_POST ['id_envio'])){
        $idn=$_POST['idn'];
        $id_envio=$_POST['id_envio'];
        $precio=$_POST['precio'];
        $descripcion=$_POST['descripcion'];
        $id_moneda=$_POST['id_moneda'];
        if(empty($_FILES['imgGasto']['name'])){
            $ruta_pasaporte='N/A';
        }
        else{
            $nombreimgp=$_FILES['imgGasto']['name'];//carga el nombre de la imagen
            $archivo=$_FILES['imgGasto']['tmp_name'];//carga el archivo
            $ruta_pasaporte="../imagen_factura";//es el nbombre de la carpeta
            $ruta_pasaporte=$ruta_pasaporte."/".$nombreimgp;//la ruta de la imagen
            move_uploaded_file($archivo, $ruta_pasaporte);//mueve la imagen ala ruta*/
        }
        $au = new GastoPiloto();
        $au->Ingresar($descripcion,$ruta_pasaporte,$precio,$id_envio,$id_moneda,$idn);
      

    }
    else
    {
        $gasto=new GastoPiloto();
        $dt=$gasto->VerMoneda();
    }

}
?>