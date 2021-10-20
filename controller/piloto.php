<?php
ob_flush();
include_once("../models/ClassPiloto.php");
if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new piloto();
        $au->  Eliminar($id);
        
    }
    else
    {
        if(isset($_GET['id']) and isset($_GET['mod'])){
            $id=$_GET['id'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $cui=$_POST['cui'];
    

            if(empty($_FILES['imgDPI']['name']))
            {
                $ruta=$_POST['ruta_dpi'];
                
            }
            else
            {
                $nombreimg=$_FILES['imgDPI']['name'];//carga el nombre de la imagen
                $archivo=$_FILES['imgDPI']['tmp_name'];//carga el archivo
                $ruta="../imagen_dpi";//es el nbombre de la carpeta
                $ruta=$ruta."/".$nombreimg;//la ruta de la imagen
                move_uploaded_file($archivo, $ruta);//mueve la imagen ala ruta    
            }
    
            $telefono=$_POST['telefono'];
            $whatsapp=$_POST['wp'];
            $contacto_emergencia=$_POST['contacto_emergencia'];
            $numero_emergencia=$_POST['numero_emergencia'];
            $correo=$_POST['correo'];
            $licencia=$_POST['licencia'];
            $tipo_licencia=$_POST['tlicencia'];
            $fecha=$_POST['fecha'];
    
            if(empty($_FILES['imglicencia']['name'])){/**licencia */
                $ruta_licencia=$_POST['ruta_licencia'];
                
            }
            else{
                $nombreimgl=$_FILES['imglicencia']['name'];//carga el nombre de la imagen
                $archivo=$_FILES['imglicencia']['tmp_name'];//carga el archivo
                $ruta_licencia="../imagen_licencia";//es el nbombre de la carpeta
                $ruta_licencia=$ruta_licencia."/".$nombreimgl;//la ruta de la imagen
                move_uploaded_file($archivo, $ruta_licencia);//mueve la imagen ala ruta*/
            }
    
            $pasaporte=$_POST['pasaporte'];
    
            if(empty($_FILES['imgPasaporte']['name'])){
                $ruta_pasaporte=$_POST['ruta_pasaporte'];
                
            }
            else{
                $nombreimgp=$_FILES['imgPasaporte']['name'];//carga el nombre de la imagen
                $archivo=$_FILES['imgPasaporte']['tmp_name'];//carga el archivo
                $ruta_pasaporte="../imagen_pasaporte";//es el nbombre de la carpeta
                $ruta_pasaporte=$ruta_pasaporte."/".$nombreimgp;//la ruta de la imagen
                move_uploaded_file($archivo, $ruta_pasaporte);//mueve la imagen ala ruta*/
            }
    
            $banco=$_POST['banco'];
            $nombre_cuenta=$_POST['Ncuenta'];
            $numero_cuenta=$_POST['cuenta_banco'];
            $tipo_cuenta=$_POST['tipo_cuenta'];
            $tipo_piloto=$_POST['id_tipo_empleado'];
            echo $tipo_piloto;

            $au =new piloto();
            $au->Modificar($id,$nombre, $apellido, $cui, $ruta, $telefono, $whatsapp, $contacto_emergencia, $numero_emergencia, $correo, $licencia, $tipo_licencia, $fecha, $ruta_licencia, $pasaporte, $ruta_pasaporte, $banco, $nombre_cuenta, $numero_cuenta, $tipo_cuenta, $tipo_piloto);
            
        }
        else{
            $id = $_GET['id'];
            $ruta=new piloto();
            $dt=$ruta->VerUno($id);
            $dt3=$ruta->VerDetalle($id);
            $dt2=$ruta->VerTipoEmpleado();
        }

    }

}
else
{
    if(isset($_POST ['nombre'])){
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $cui=$_POST['cui'];

        if(empty($_FILES['imgDPI']['name'])){/*valido si hay imagen de dpi*/
            $ruta='N/A';  
        }
        else{
            $nombreimg=$_FILES['imgDPI']['name'];//carga el nombre de la imagen
            $archivo=$_FILES['imgDPI']['tmp_name'];//carga el archivo
            $ruta="../imagen_dpi";//es el nbombre de la carpeta
            $ruta=$ruta."/".$nombreimg;//la ruta de la imagen
            move_uploaded_file($archivo, $ruta);//mueve la imagen ala ruta
        }

        $telefono=$_POST['telefono'];
        $whatsapp=$_POST['wp'];
        $contacto_emergencia=$_POST['contacto_emergencia'];
        $numero_emergencia=$_POST['numero_emergencia'];
        $correo=$_POST['correo'];
        $licencia=$_POST['licencia'];
        $tipo_licencia=$_POST['tlicencia'];
        $fecha=$_POST['fecha'];

        if(empty($_FILES['imglicencia']['name'])){/**licencia */
            $ruta_licencia='N/A';
        }
        else{
            $nombreimgl=$_FILES['imglicencia']['name'];//carga el nombre de la imagen
            $archivo=$_FILES['imglicencia']['tmp_name'];//carga el archivo
            $ruta_licencia="../imagen_licencia";//es el nbombre de la carpeta
            $ruta_licencia=$ruta_licencia."/".$nombreimgl;//la ruta de la imagen
            move_uploaded_file($archivo, $ruta_licencia);//mueve la imagen ala ruta*/
        }

        $pasaporte=$_POST['pasaporte'];

        if(empty($_FILES['imgPasaporte']['name'])){
            $ruta_pasaporte='N/A';
        }
        else{
            $nombreimgp=$_FILES['imgPasaporte']['name'];//carga el nombre de la imagen
            $archivo=$_FILES['imgPasaporte']['tmp_name'];//carga el archivo
            $ruta_pasaporte="../imagen_pasaporte";//es el nbombre de la carpeta
            $ruta_pasaporte=$ruta_pasaporte."/".$nombreimgp;//la ruta de la imagen
            move_uploaded_file($archivo, $ruta_pasaporte);//mueve la imagen ala ruta*/
        }

        $banco=$_POST['banco'];
        $nombre_cuenta=$_POST['Ncuenta'];
        $numero_cuenta=$_POST['cuenta_banco'];
        $tipo_cuenta=$_POST['tipo_cuenta'];
        $tipo_piloto=$_POST['id_tipo_empleado'];
 
        $au = new piloto();
        $au->Ingresar($nombre, $apellido, $cui, $ruta, $telefono, $whatsapp, $contacto_emergencia, $numero_emergencia, $correo, $licencia, $tipo_licencia, $fecha, $ruta_licencia, $pasaporte, $ruta_pasaporte, $banco, $nombre_cuenta, $numero_cuenta, $tipo_cuenta, $tipo_piloto);

    }
    else
    {
        $tipo=new piloto();
        $dt=$tipo->Ver();
        $dt2=$tipo->VerTipoEmpleado();

    }

}
?>