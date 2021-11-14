<?php
ob_flush();
include_once("../models/ClassReportes.php");
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $reporte=new Reporte ();
    $dt=$reporte->VerEnvio($id);
}
else
{
    if(isset($_POST ['cod'])){
        /**ingresar */
    }
    else
    {
        /**ver todo */
    }
}
?>