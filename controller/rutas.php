<?php
ob_flush();
include_once("../models/ClassRutas.php");
if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new rutas();
        $au->  Eliminar($id);
        
    }
    else
    {
        if(isset($_GET['id']) and isset($_GET['mod'])){
            $id=$_GET['id'];
            $origen=$_POST['origen'];
            $destino=$_POST['destino'];
            $cond=$_POST['codigo'];

            $au =new rutas();
            $au->Modificar($id,$origen,$destino,$cond);

        }
        else{
            $id = $_GET['id'];
            $ruta=new rutas();
            $dt=$ruta->VerUno($id);
        }

    }

}
else
{
    if(isset($_POST ['codigo'])){
        $codigo=$_POST['codigo'];
        $origen=$_POST['origen'];
        $destino=$_POST['destino'];
        $au = new rutas();
        $au->Ingresar($origen,$destino,$codigo);

    }
    else
    {
        $tipo=new rutas();
        $dt=$tipo->Ver();
    }

}
?>