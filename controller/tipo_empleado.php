<?php
ob_flush();
include_once("../models/ClassTipoEmpleado.php");
if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new tipo();
        $au->  Eliminar($id);
        
    }
    else
    {
        
        $id = $_GET['id'];
        $cargo=$_POST['cargo'];  
        $au =new tipo();
        $au->ModificarTipoEmpleado($id,$cargo);


    }

}
else
{
    if(isset($_POST ['cargo'])){
        $cargo=$_POST['cargo'];
        $au =new tipo();
        $au->IngresarTipoEmpleado($cargo);

    }
    else
    {
        $tipo=new tipo();
        $dt=$tipo->VerTipoEmpleado();
    }

}
?>