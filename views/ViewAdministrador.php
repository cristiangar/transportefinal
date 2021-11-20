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
                    <a class="nav-link" href="../controller/login/login.php?log">Cerrar sesión</a>
                </li>
            </ul>

        </nav>
        <div class="container-fluid">

            <div class="row">
                
                
                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                                <a href="../envio/agregar_envio.php">
                                <img class="conimagen" id="conimg"src="../imagenes/generar.png" id="icon" alt="User Icon" style="max-width:60%;width:auto;height:auto;"/>
                            </a>
                            <h1>Generar Viaje</h1>
                        </div>
                    </div>
                </div>

                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                            <a href="listaviajes.php">
                            <img class="img-fluid" src="../imagenes/estados.jpg" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                            </a>
                            <h1>Estado de Viajes</h1>
                        </div>
                    </div>
                </div>

                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                            <a href="../Pilos/Iniciar_terminar.php?id&ver">
                            <img class="img-fluid" src="../imagenes/envio_2.jpg" id="icon" alt="User Icon" style="max-width:100%;width:auto;height:auto;">
                            </a>
                            <h1>Iniciar y terminar viajes</h1>
                        </div>
                    </div>
                </div>

                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                                <a href="../Pilos/listaviajes.php?id&ver">
                                <img class="conimagen" id="conimg"src="../imagenes/img_gastos.png" id="icon" alt="User Icon" style="max-width:70%;width:auto;height:auto;"/>
                            </a>
                            <h1>Gastos de pilotos por viaje</h1>
                        </div>
                    </div>
                </div>

                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                            <a href="lista_bitacora.php">
                            <img class="img-fluid" src="../imagenes/bitacora.png" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                            </a>
                            <h1>Bitácora de Viaje</h1>
                        </div>
                    </div>
                </div>        

                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                            <a href="lista_clientes.php">
                            <img class="img-fluid" src="../imagenes/clientes.png" id="icon" alt="User Icon" style="max-width:48%;width:auto;height:auto;">
                            </a>
                            <h1>Clientes</h1>
                        </div>
                    </div>
                </div>


                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                            <a href="lista_piloto.php">
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
                            <img class="img-fluid" src="../imagenes/receptor.jpg" id="icon" alt="User Icon" style="max-width:65%;width:auto;height:auto;">
                            </a>
                            <h1>Receptor</h1>
                        </div>
                    </div>
                </div>

                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                            <a href="listaviajesnoautorizados.php">
                            <img class="img-fluid" src="../imagenes/autorizar.jpg" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                            </a>
                            <h1>Autorizar Viajes</h1>
                        </div>
                    </div>
                </div>

                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                            <a href="ViewVehiculos.php">
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
                            <a href="lista_encabezados.php">
                            <img class="img-fluid" src="../imagenes/reporte.png" id="icon" alt="User Icon" style="max-width:68%;width:auto;height:auto;">
                            </a>
                            <h1>Generar Cuenta Por Cobrar</h1>
                        </div>
                    </div>
                </div>

            <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                <div id="formContent"><!--contenedor-->
                    <div class="fadeIn first">
                        <a href="lista_cuentas_por_cobrar.php">
                        <img class="img-fluid" src="../imagenes/cxc.jpg" id="icon" alt="User Icon" style="max-width:60%;width:auto;height:auto;">
                        </a>
                        <h1>Estado cuenta del cliente</h1>
                    </div>
                </div>
            </div>

                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                            <a href="ListaPendienteDeposito.php">
                            <img class="img-fluid" src="../imagenes/deposito.png" id="icon" alt="User Icon" style="max-width:70%;width:auto;height:auto;">
                            </a>
                            <h1>Viaje pendiente de depositar</h1>
                        </div>
                    </div>
                </div>        


                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                            <a href="ListaPagoPilotos.php">
                            <img class="img-fluid" src="../imagenes/pagar.png" id="icon" alt="User Icon" style="max-width:80%;width:auto;height:auto;">
                            </a>
                            <h1>Pago Pilotos</h1>
                        </div>
                    </div>
                </div>

                

                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                            <a href="lista_empleados.php">
                            <img class="img-fluid" src="../imagenes/personal.png" id="icon" alt="User Icon" style="max-width:75%;width:auto;height:auto;">
                            </a>
                            <h1>Personal</h1>
                        </div>
                    </div>
                </div>
                
                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                            <a href="ViewsOtros.php">
                            <img class="img-fluid" src="../imagenes/Otros.jpg" id="icon" alt="User Icon" style="max-width:95%;width:auto;height:auto;">
                            </a>
                            <h1>Otros</h1>
                        </div>
                    </div>
                </div>

                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                            <a href="ViewUsuarios.php">
                            <img class="img-fluid" src="../imagenes/usuario.png" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                            </a>
                            <h1>Usuarios</h1>
                        </div>
                    </div>
                </div>


        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
                    <a href="../reportes/busqueda_reporte.php">
                    <img class="img-fluid" src="../imagenes/Reporte.jpg" id="icon" alt="User Icon" style="max-width:85%;width:auto;height:auto;">
                    </a>
                    <h1>Reportes</h1>
                </div>
            </div>
        </div>

                <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                    <div id="formContent"><!--contenedor-->
                        <div class="fadeIn first">
                            <a href="../mantenimientovehiculos/lista_vehiculos.php">
                            <img class="img-fluid" src="../imagenes/serviciocarro.jpg" id="icon" alt="User Icon" style="max-width:65%;width:auto;height:auto;">
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
                    ?>
                    <!DOCTYPE html>
                    <html>
                    <head>
                        <title>Piloto</title>
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
                                        <a class="nav-link" href="../controller/login/login.php?log">Cerrar sesión</a>
                                    </li>
                                </ul>

                            </nav>
                                <div class="container-fluid">
                                    <br>
                                    <br>
                                    <br>
                                    <br><br><br>
                                    <div class="row">
                                        <br>    
                                        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                                            <div id="formContent"><!--contenedor-->
                                                <div class="fadeIn first">
                                                    <a href="../Pilos/listaviajes.php?id=<?php echo $id_us;?>&ver">
                                                    <img class="img-fluid" src="../imagenes/envio_2.jpg" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                                                    </a>
                                                    <h1>Iniciar viajes y gastos</h1>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="wrapper fadeInDown col-sm-4"><!--efecto de caida-->
                                            <div id="formContent"><!--contenedor-->
                                                <div class="fadeIn first">
                                                    <a href="../Pilos/listaviajesterminar.php?id=<?php echo $id_us;?>&ver2">
                                                    <img class="img-fluid" src="../imagenes/terminar2.png" id="icon" alt="User Icon" style="max-width:50%;width:auto;height:auto;">
                                                    </a>
                                                    <h1>Terminar Entrega</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </body>    
                    </html>
                    <?php
                }
            }

        }/**ejecutiva */

    }/**administrador */

}/**usuario */
else{/**else de la session */
    header("location: ../Index.php");
}/**ses */
?>