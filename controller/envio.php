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

            echo "modificar envio";
            $id=$_POST['id_envio'];
            $codigo_envio=$_POST['cod'];
            $referencia1=$_POST['direccion'];
            $referencia2=$_POST['direccionenvio'];
            $descripcion=$_POST['descripcion'];
            $ruta=$_POST['id_ruta'];
            $cliente=$_SESSION['idcliente'];
            $vehiculo=$_SESSION['idvehiculo'];
            $plataforma=$_POST['Plataforma'];
            $piloto=$_SESSION['idpiloto'];
            $usuario=$_SESSION['idusuario'];
            $receptor=$_SESSION['idreceptor'];
            if($plataforma=='N/A'){
                $caja=0;
            }
            else
            {
                $caja=$_SESSION['idplataforma'];
            }
            /*$au =new envio();
            $au->Modificar();*/
            
        }
        else{
            $id = $_GET['id'];
            $ruta=new envio();
            $dt=$ruta->VerUno($id);

        }

    }

}
else
{
    if(isset($_POST ['cod'])){
        $codigo_envio=$_POST['cod'];
        $referencia1=$_POST['direccion'];
        $referencia2=$_POST['direccionenvio'];
        $descripcion=$_POST['descripcion'];
        $ruta=$_POST['id_ruta'];
        $cliente=$_SESSION['idcliente'];
        $vehiculo=$_SESSION['idvehiculo'];
        $plataforma=$_POST['Plataforma'];
        $piloto=$_SESSION['idpiloto'];
        $usuario=$_SESSION['idusuario'];
        $receptor=$_SESSION['idreceptor'];
        if($plataforma=='N/A'){
            $caja=0;
        }
        else
        {
            $caja=$_SESSION['idplataforma'];
        }
        $au = new envio();
        $au->Ingresar($referencia1,$referencia2,$descripcion,$codigo_envio,$ruta,$cliente,$vehiculo,$caja,$piloto,$usuario,$receptor);

    }
    else
    {
        $tipo=new envio();
        $dt=$tipo->Ver();
        $dt2=$tipo->VerRuta();
    }

}
?>