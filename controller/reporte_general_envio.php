<?php

include_once("../models/ClassReporteViaje.php");
if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        
        
    }
    else
    {
        if(isset($_GET['id']) and isset($_GET['mod'])){
            $vehiculo_tipo=$_POST['Vehiculo'];
            
 
                $au =new envio();
               
           
            }
            
        
        else{
            $id = $_GET['id'];
            $ruta=new envio();
            $dt=$ruta->VerUno($id);
            $dt3=$ruta->VerUno2($id);

        }

    }

}
else
{
    if(isset($_POST ['cod'])){
        $codigo_envio=$_POST['cod'];
        
        if($plataforma=='N/A'){
            $caja=0;
        }
        else
        {
            $caja=$_SESSION['idplataforma'];
        }
        $au = new envio();
       

    }
    else
    {
        $tipo=new envio();
        $dt=$tipo->Ver();
        $dt2=$tipo->VerRuta();
    }

}
?>