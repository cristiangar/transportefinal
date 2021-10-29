<?php
include_once("../models/ClassListas.php");

                $cliente=new Listas();
                $dt=$cliente->Verclientes();

                $cliente=new Listas();
                $dt2=$cliente->VerReceptor();
                
                $cliente=new Listas();
                $dt3=$cliente->VerVehiculo();
                
                $cliente=new Listas();
                $dt4=$cliente->VerCaja();
                
                $cliente=new Listas();
                $dt5=$cliente->VerPiloto();
                


        /*if(isset($_GET['id'])and isset($_GET['Autorizar'])){
               $id=$_GET['id'];
               $adelanto=$_POST['adelanto'];
               $pendiente=$_POST['saldo'];
               $renta=$_POST['renta'];
               $combustible=$_POST['combustible'];
                $au=new envio();
                $au->Autorizar($id,$adelanto,$pendiente,$renta,$combustible);
        }
        else{
                
        }*/

        
?>