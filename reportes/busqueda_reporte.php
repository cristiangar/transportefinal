<?php
session_start();
if(isset($_SESSION['usuario']))
{
    $rol=$_SESSION['rol'];
    $us=$_SESSION['usuario'];
    if($rol=="ADMINISTRADOR")/**if rol de usuario */
    {
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/imagen.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body >
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a href="../views/ViewAdministrador.php">
        <img src="../imagenes/logo.png" alt="HTML tutorial" style="width:52px;height:52px;">
    </a>
    <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
            <a class="nav-link" >Usuario: <?php echo $us;?></a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" href="../index.php">Cerrar sesión</a>
        </li>
    </ul>

</nav>
<div class="container-fluid">
    <h1>REPORTES</h1>
    <div class="row">
        
         
        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                     
                        <a href="lista_general.php">
                        <!--<a href="excel.php"><button type="button" class="btn btn-primary" >Descargar Excel</button></a>
                        <a href="../envio/datos.php">-->
                        <img class="conimagen" id="conimg"src="../imagenes/reporteviajes.jpg" id="icon" alt="User Icon" style="max-width:60%;width:auto;height:auto;"/>
                    </a>
                    <h1>Reporte de Viaje  -Solo Vehiculo- </h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="lista_general_cajaseca.php">
                    <img class="img-fluid" src="../imagenes/reportevehiculos.png" id="icon" alt="User Icon" style="max-width:60%;width:auto;height:auto;">
                    </a>
                    <h1>Reporte de Viaje Vehiculo/Caja Seca</h1>
                </div>
            </div>
        </div>

        <!--<div class="wrapper fadeInDown col-sm-4">efecto de caida
            <div id="formContent">contenedor
                <div class="fadeIn first">
                    <a href="Reportes.php?cliente">
                    <img class="img-fluid" src="../imagenes/reporteclientes.png" id="icon" alt="User Icon" style="max-width:60%;width:auto;height:auto;">
                    </a>
                    <h1>Reporte de Clientes</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4">efecto de caida
            <div id="formContent">contenedor
                <div class="fadeIn first">
                    <a href="estados.php">
                    <img class="img-fluid" src="../imagenes/reporteejecutiva.png" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Reporte de Ejecutivos</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4">efecto de caida
            <div id="formContent">contenedor
                <div class="fadeIn first">
                    <a href="bitacora.php">
                    <img class="img-fluid" src="../imagenes/reportepiloto.png" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Reporte de Pilotos</h1>
                </div>
            </div>
        </div>    -->    
    

        
    </div>
</div>
</body>
</html>

<?php
           
    }/**administrador */

}/**usuario */
else{/**else de la session */
    header("location: ../Index.php");
}/**ses */
?>