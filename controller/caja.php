<?php
ob_flush();
include_once("../models/ClassCajaSeca.php");
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
            $id=$_GET['id'];
            $placa=$_POST['placa'];
            $marca=$_POST['marca'];
            $modelo=$_POST['modelo'];
            $ejes=$_POST['ejes'];
            $tamanio=$_POST['tamanio'];
            $color=$_POST['color'];
            $economico=$_POST['economico'];
            $caat=$_POST['pcaat'];
            $tipo=$_POST['tipo_vehiculo'];
            $flotilla=$_POST['id_flotilla'];
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

            $au =new CajaSeca();
            $au->Modificar($id,$placa,$marca,$modelo,$ejes,$tamanio,$color,$economico,$caat,$pimagencaat,$tipo,$ruta_tarjeta,$flotilla);
            
        }
        else{
            $id = $_GET['id'];
            $ruta=new CajaSeca();
            $dt3=$ruta->VerUno($id);
            $dt2=$ruta->VerFlotilla();

        }

    }

}
else
{
    if(isset($_POST ['placa'])){
        $placa=$_POST['placa'];
        $marca=$_POST['marca'];
        $modelo=$_POST['modelo'];
        $ejes=$_POST['ejes'];
        $tamanio=$_POST['tamanio'];
        $color=$_POST['color'];
        $economico=$_POST['economico'];
        $caat=$_POST['pcaat'];
        $tipo=$_POST['tipo_vehiculo'];
        $flotilla=$_POST['id_flotilla'];


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
 
        $au = new CajaSeca();
        $au->Ingresar($placa,$marca,$modelo,$ejes,$tamanio,$color,$economico,$caat,$pimagencaat,$tipo,$ruta_tarjeta,$flotilla);

    }
    else
    {
        $tipo=new CajaSeca();
        $dt=$tipo->Ver();
        $dt2=$tipo->VerFlotilla();
    }

}
?>