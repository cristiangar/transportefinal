<?php
ob_flush();
include_once("../models/ClassEnvio.php");
if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new CajaSeca();
        $au->  Eliminar($id);
        
    }
    else
    {
        if(isset($_GET['id']) and isset($_GET['mod'])){


            $au =new CajaSeca();
            $au->Modificar($id,$placa,$marca,$modelo,$ejes,$tamanio,$color,$economico,$caat,$pimagencaat,$tipo,$ruta_tarjeta,$flotilla);
            
        }
        else{
            $id = $_GET['id'];
            $ruta=new CajaSeca();
            $dt3=$ruta->VerUno($id);

        }

    }

}
else
{
    if(isset($_POST ['placa'])){

 
        $au = new CajaSeca();
        $au->Ingresar($placa,$marca,$modelo,$ejes,$tamanio,$color,$economico,$caat,$pimagencaat,$tipo,$ruta_tarjeta,$flotilla);

    }
    else
    {
        $tipo=new envio();
        $dt=$tipo->Ver();
        $dt2=$tipo->VerRuta();
    }

}
?>