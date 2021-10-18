<?php
include_once("../models/ClassVehiculoMantenimiento.php");

if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new vehiculomantenimiento();
        $au->  Eliminar($id);
        
    }
    else
    {
        if(isset($_GET['id']) and isset($_GET['mod'])){
            $id=$_GET['id'];
            $marca=$_POST['pmarca'];
            $modelo=$_POST['pmodelo'];
            $placa=$_POST['pplaca'];
            //$color=$_POST['color'];
            $tipo_vehiculo=$_POST['ptipo'];

            $cabezal=new vehiculomantenimiento();
            $cabezal->Modificar($id,$marca,$modelo,$placa,$tipo_vehiculo);

        }
        else{
            $id = $_GET['id'];
            $cabezal=new vehiculomantenimiento();
            $detalle=$cabezal->VerUno($id);
        }

    }

}
else
{
    if(isset($_POST ['pmarca'])){

        $marca=$_POST['pmarca'];
        $modelo=$_POST['pmodelo'];
        //$tonelaje=$_POST['tonelaje'];
        $placa=$_POST['pplaca'];
        //$color=$_POST['pcolor'];
        $tipo_vehiculo=$_POST['ptipo'];
        
        $cabezal=new vehiculomantenimiento();
        $cabezal->Ingresar($marca,$modelo,$placa,$tipo_vehiculo);

    }
    else
    {
        $vehiculo=new vehiculomantenimiento();
        $dt=$vehiculo->Ver();
    }

}
?>