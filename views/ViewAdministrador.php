<?php
session_start();
if(isset($_SESSION['usuario']))
{
    $rol=$_SESSION['rol'];
    $us=$_SESSION['usuario'];
    $id_us=$_SESSION['idusuario'];
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
    <a href="ViewAdministrador.php">
        <img src="../imagenes/logo.png" alt="HTML tutorial" style="width:52px;height:52px;">
    </a>
    <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
            <a class="nav-link" ><?php echo $us;?></a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" href="../index.php">Cerrar sesión</a>
        </li>
    </ul>

</nav>
<div class="container-fluid">

    <div class="row">
        
         
        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                        <a href="../envio/datos.php">
                        <img class="conimagen" id="conimg"src="../imagenes/generar.png" id="icon" alt="User Icon" style="max-width:60%;width:auto;height:auto;"/>
                    </a>
                    <h1>Generar Viaje</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="estados.php">
                    <img class="img-fluid" src="../imagenes/estados.jpg" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Estado de Viajes</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="iniciar.php">
                    <img class="img-fluid" src="../imagenes/envio_2.jpg" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Iniciar viajes</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="bitacora.php">
                    <img class="img-fluid" src="../imagenes/bitacora.png" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Bitácora de Viaje</h1>
                </div>
            </div>
        </div>        

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="Clientes.php">
                    <img class="img-fluid" src="../imagenes/clientes.png" id="icon" alt="User Icon" style="max-width:60%;width:auto;height:auto;">
                    </a>
                    <h1>Clientes</h1>
                </div>
            </div>
        </div>


        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="choferes.php">
                        <img class="img-fluid" src="../imagenes/chofer.jpg" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">    
                    </a>
                    <h1>Pilotos</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="lista_receptor.php">
                    <img class="img-fluid" src="../imagenes/receptor.jpg" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Receptor</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="../envio/autorizar.php">
                    <img class="img-fluid" src="../imagenes/autorizar.jpg" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Autorizar Viajes</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="menu_vehiculo.php">
                    <img class="img-fluid" src="../imagenes/trailer.jpg" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Vehiculos</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="lista_rutas.php">
                    <img class="img-fluid" src="../imagenes/rutas.jpg" id="icon" alt="User Icon" style="max-width:60%;width:auto;height:auto;">
                    </a>
                    <h1>Rutas</h1>
                </div>
            </div>
        </div>
        <br>

        
        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="encabezado.php">
                    <img class="img-fluid" src="../imagenes/reporte.png" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Generar recibo</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="cuentas.php">
                    <img class="img-fluid" src="../imagenes/cxc.jpg" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Estado cuenta del cliente</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="../envio/listapilotopago.php">
                    <img class="img-fluid" src="../imagenes/deposito.png" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Viaje pendiente de depositar</h1>
                </div>
            </div>
        </div>        


        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="pagos.php">
                    <img class="img-fluid" src="../imagenes/pagar.png" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Pago Pilotos</h1>
                </div>
            </div>
        </div>

        

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="personal.php">
                    <img class="img-fluid" src="../imagenes/personal.png" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Personal</h1>
                </div>
            </div>
        </div>
        
        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="ViewsOtros.php">
                    <img class="img-fluid" src="../imagenes/Otros.jpg" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Otros</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="usuarios.php">
                    <img class="img-fluid" src="../imagenes/usuario.png" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Usuarios</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="../Reportes/BusquedaReporte.php">
                    <img class="img-fluid" src="../imagenes/Reporte.jpg" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Reportes</h1>
                </div>
            </div>
        </div>

        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="../serviciovehiculos/listavehiculos.php">
                    <img class="img-fluid" src="../imagenes/serviciocarro.jpg" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                    </a>
                    <h1>Servicio de Vehiculos</h1>
                </div>
            </div>
        </div>
        
    </div>
</div>
</body>
</html>


<?php
    }/**Administrador */
    else{/**administrador*/

        if($rol=="EJECUTIVO"){/**ejecutiva */
            /**AREA PARA EL MODULO DE LA EJECUTIVA */
        }/**ejecutiva */
        else{/**ejecutiva */

            if($rol=="CONTADOR")/**contador */
            {
                /** AREA PARA EL MODULO DEL CONTADOR */

            }/**contador */
            else{
                if($rol=='PILOTO')
                {
                    /**area de piloto */
                }
            }

        }/**ejecutiva */

    }/**administrador */

}/**usuario */
else{/**else de la session */
    header("location: ../Index.php");
}/**ses */
?>