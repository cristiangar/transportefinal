<?php
ob_flush();
include_once("../models/ClassTipoMoneda.php");
if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new tipo_moneda();
        $au->  Eliminar($id);
        
    }
    else
    {
        
        $id = $_GET['id'];
        $tipo=$_POST['tipo'];
        $valor=$_POST['valor'];  
        $au =new tipo_moneda();
        $au->Modificar($id,$tipo,$valor);


    }

}
else
{
    if(isset($_POST ['tipo'])){
        $tipo=$_POST['tipo'];
        $valor=$_POST['valor'];
        $au = new tipo_moneda();
        $au->Ingresar($tipo,$valor);

    }
    else
    {
        $tipo=new tipo_moneda();
        $dt=$tipo->Ver();
    }

}
?>