<?php
include_once("../../models/login/classlogin.php");

if (isset($_GET['log']))
{
    
    unset($_SESSION['usuario']);
    unset($_SESSION['rol']);
    unset($_SESSION['idusuario']);
    echo'<script language = javascript>
    self.location="../../index.php" </script>';

}
else
{
    $us=$_POST['usr'];
    $pas=$_POST['pwd'];
    $login = new login();
    $login->Ver($us,$pas);

}
?>