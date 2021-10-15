<?php
include_once("../../models/login/classlogin.php");

if (isset($_GET['id']))
{
    
    if (isset($_GET['id']) and isset($_GET['es'])) {//valida si es modificar o eliminar
      /**elimina */
        
    }
    else
    {
        /**modifica */
    }

}
else
{
    $us=$_POST['usr'];
    $pas=$_POST['pwd'];
    $login = new login();
    $login->Ver($us,$pas);

}
?>