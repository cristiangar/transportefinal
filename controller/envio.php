<?php
ob_flush();
include_once("../models/ClassEnvio.php");
if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
        $id=$_GET['id'];
        $au =new envio();
        $au->  Eliminar($id);
        
    }
    else
    {
        if(isset($_GET['id']) and isset($_GET['mod'])){
            $vehiculo_tipo=$_POST['Vehiculo'];
            $id=$_POST['id_envio'];
            $id_paquete=$_POST['id_paquete'];
            $codigo_envio=$_POST['cod'];
            $plataforma=$_POST['Plataforma'];


            if(isset($_SESSION['idcliente'])){
              $cliente=$_SESSION['idcliente'];/**nuevo id cliente */
            }
            else
            {
                $cliente=$_POST['id_cliente'];/**no se cambio el cliente */
            }

            if (isset($_SESSION['idreceptor'])){
                $receptor=$_SESSION['idreceptor'];
            }
            else{
                $receptor=$_POST['id_receptor'];
            }

            $referencia1=$_POST['direccion'];
            $referencia2=$_POST['direccionenvio'];
            $descripcion=$_POST['descripcion'];
            $ruta=$_POST['id_ruta'];
            
            if(isset($_SESSION['idvehiculo'])){
                $vehiculo=$_SESSION['idvehiculo'];

            }
            else{
                $vehiculo=$_POST['id_vehiculo'];
                //echo "no cambio vehiculo";
            }
            if(isset($_SESSION['idpiloto'])){
                $piloto=$_SESSION['idpiloto'];

            }
            else{
                $piloto=$_POST['id_piloto'];
                //echo "no cambio piloto";
            }
            
            if(($vehiculo_tipo=="Camion") or ($vehiculo_tipo=="CAMION")){
                $caja=0;
                $retiro_caja=1;
                $au =new envio();
                $au->Modificar($id, $id_paquete, $codigo_envio, $cliente, $receptor, $referencia1, $referencia2,$descripcion, $ruta, $vehiculo, $caja, $retiro_caja, $piloto);
            }
            else{
                if(isset($_POST['retirar'])){
                    $retiro_caja=0;
                    //se retiro caja 
                    $caja=0;         
                }
                else{
                        $retiro_caja=5;
                        if(isset($_SESSION['idplataforma'])){
                            $caja=$_SESSION['idplataforma'];
                        }
                        else{
                            $caja=$_POST['id_plataforma'];
                        }
                }  
 
                $au =new envio();
                $au->Modificar($id, $id_paquete, $codigo_envio, $cliente, $receptor, $referencia1, $referencia2,$descripcion, $ruta, $vehiculo, $caja, $retiro_caja, $piloto);
           
            }
            
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