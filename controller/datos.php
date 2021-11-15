<?php
include_once("../models/ClassDatos.php");

                $cliente=new envio();
                $dt2=$cliente->Verclientes();
                
                $receptor = new envio();
                $dt3 = $receptor->VerReceptor();
        
                $vehiculo = new envio();
                $dt4 = $vehiculo->VerVehiculo();
        
                $pilotointerno = new envio();
                $dt5 = $pilotointerno->Verpilotointerno();
        
                $plataforma = new envio();
                $dt6 = $plataforma->VerPlataforma();

                $codenvio = new envio();
                $dt8 = $codenvio->VerEnvio();
                
                $codenvio = new envio();
                $dt9 = $codenvio->VerListaViajePago();

        if(isset($_GET['id'])and isset($_GET['Autorizar'])){
               $id=$_GET['id'];
               $adelanto=$_POST['adelanto'];
               $pendiente=$_POST['saldo'];
               $renta=$_POST['renta'];
               $combustible=$_POST['combustible'];
                $au=new envio();
                $au->Autorizar($id,$adelanto,$pendiente,$renta,$combustible);
        }
        else{
                
        }

        
?>