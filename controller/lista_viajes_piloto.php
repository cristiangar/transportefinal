<?php
include_once("../models/ClassListaViajesPiloto.php");

if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['ver2'])) {
    
        $id=$_GET['id'];
        $ruta=new envio_piloto();
        $dt=$ruta->Ver2($id);
        
    }
    else
    {
        if(isset($_GET['id']) and isset($_GET['ver'])){
            $id=$_GET['id'];
            $ruta=new envio_piloto();
            $dt=$ruta->Ver($id);
        }
        else{
            $id=$_GET['id'];
            $au =new envio_piloto();
            $au->Ingresar($id);

        }
    
    }

}
else
{
    if(isset($_POST ['nombre'])){

    /*$nombre=$_POST['nombre'];
    $telefono=$_POST['telefono'];
    $telefono2=$_POST['telefono2'];
    $correo=$_POST['correo'];
    $nit=$_POST['nit'];
    $cuenta=$_POST['cuenta'];
    $banco=$_POST['banco'];

        $au =new cliente();
        $au->Ingresarcliente($nombre,$telefono,$telefono2,$correo,$nit,$cuenta,$banco);  */

    }
    else
    {
        /*$cliente=new cliente();
        $dt2=$cliente->Verclientes();*/
    }

}
?>