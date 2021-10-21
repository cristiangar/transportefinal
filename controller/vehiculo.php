<?php
ob_flush();
include_once("../models/ClassVehiculos.php");
if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new vehiculo();
        $au->  Eliminar($id);
        
    }
    else
    {
        if(isset($_GET['id']) and isset($_GET['mod'])){
            $id=$_GET['id'];
            $placa=$_POST['placa'];
            $marca=$_POST['marca'];
            $modelo=$_POST['modelo'];
            $tonelaje=$_POST['tonelaje'];
            $ejes=$_POST['ejes'];
            $color=$_POST['color'];
            $tipo=$_POST['tipo_vehiculo'];
            $caat=$_POST['pcaat'];
            $flotilla=$_POST['id_flotilla'];
            $codigo_aduanero=$_POST['codaduanero'];
            $codigo_transporte=$_POST['codtransporte'];
            $descripcion=$_POST['descripcion'];
            if(empty($_FILES['imgTargetaVeiculo']['name'])){
                $ruta_tarjeta=$_POST['ruta'];
            }
            else{
                $nombreimgc=$_FILES['imgTargetaVeiculo']['name'];//carga el nombre de la imagen
                $archivo=$_FILES['imgTargetaVeiculo']['tmp_name'];//carga el archivo
                $ruta_tarjeta="../imagen_tarjetas";//es el nbombre de la carpeta
                $ruta_tarjeta=$ruta_tarjeta."/".$nombreimgc;//la ruta de la imagen
                move_uploaded_file($archivo, $ruta_tarjeta);//mueve la imagen ala ruta*/
            
            }
            
        if(empty($_FILES['imagencaat']['name'])){
            $pimagencaat=$_POST['ruta_caat'];
        }
        else{
            $nombreimcaat=$_FILES['imagencaat']['name'];//carga el nombre de la imagen
            $archivocaat=$_FILES['imagencaat']['tmp_name'];//carga el archivo
            $pimagencaat="../imagen_caat";//es el nbombre de la carpeta
            $pimagencaat=$pimagencaat."/".$nombreimcaat;//la ruta de la imagen
            move_uploaded_file($archivocaat, $pimagencaat);//mueve la imagen ala ruta*/
        
        }

            $au =new vehiculo();
            $au->Modificar($id,$placa,$marca,$modelo,$tonelaje,$ejes,$color,$tipo,$ruta_tarjeta,$codigo_aduanero,$codigo_transporte,$caat,$pimagencaat,$descripcion,$flotilla);
            
        }
        else{
            $id = $_GET['id'];
            $ruta=new vehiculo();
            $dt3=$ruta->VerUno($id);

        }

    }

}
else
{
    if(isset($_POST ['placa'])){
        $placa=$_POST['placa'];
        $marca=$_POST['marca'];
        $modelo=$_POST['modelo'];
        $tonelaje=$_POST['tonelaje'];
        $ejes=$_POST['ejes'];
        $color=$_POST['color'];
        $tipo=$_POST['tipo_vehiculo'];
        $caat=$_POST['pcaat'];
        $flotilla=$_POST['id_flotilla'];
        $codigo_aduanero=$_POST['codaduanero'];
        $codigo_transporte=$_POST['codtransporte'];
        $descripcion=$_POST['descripcion'];

        if(empty($_FILES['imgTargetaVeiculo']['name'])){
            $ruta_tarjeta='N/A';
        }
        else{
            $nombreimgc=$_FILES['imgTargetaVeiculo']['name'];//carga el nombre de la imagen
            $archivo=$_FILES['imgTargetaVeiculo']['tmp_name'];//carga el archivo
            $ruta_tarjeta="../imagen_tarjetas";//es el nbombre de la carpeta
            $ruta_tarjeta=$ruta_tarjeta."/".$nombreimgc;//la ruta de la imagen
            move_uploaded_file($archivo, $ruta_tarjeta);//mueve la imagen ala ruta*/
        
        }


        if(empty($_FILES['imagencaat']['name'])){
            $pimagencaat='N/A';
        }
        else{
            $nombreimcaat=$_FILES['imagencaat']['name'];//carga el nombre de la imagen
            $archivocaat=$_FILES['imagencaat']['tmp_name'];//carga el archivo
            $pimagencaat="../imagen_caat";//es el nbombre de la carpeta
            $pimagencaat=$pimagencaat."/".$nombreimcaat;//la ruta de la imagen
            move_uploaded_file($archivocaat, $pimagencaat);//mueve la imagen ala ruta*/
        
        }
 
        $au = new vehiculo();
        $au->Ingresar($placa,$marca,$modelo,$tonelaje,$ejes,$color,$tipo,$ruta_tarjeta,$codigo_aduanero,$codigo_transporte,$caat,$pimagencaat,$descripcion,$flotilla);

    }
    else
    {
        $tipo=new vehiculo();
        $dt=$tipo->Ver();
        $dt2=$tipo->VerFlotilla();
    }

}
?>