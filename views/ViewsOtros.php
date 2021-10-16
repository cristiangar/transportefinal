<?php
session_start();
if(isset($_SESSION['usuario']))
{
    $rol=$_SESSION['rol'];
    $us=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Menu para Administradores</title>
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
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
<<<<<<< HEAD
    <a href="ViewAdministrador.php">
=======
    <a href="secritaria.php">
>>>>>>> 8991e2d8d9126d5e9d4fa2cfa10e74109efea498
        <img src="../imagenes/logo.png" alt="HTML tutorial" style="width:52px;height:52px;">
    </a>
    <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
            <a class="nav-link" ><?php echo $us;?></a>
        </li>
        <li class="navbar-item">
            <a class="nav-link" href="../index.php"> Cerrar sesión</a>
        </li>
    </ul>

</nav>
<div class="container-fluid">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    <div class="row">

        
        <div class="wrapper fadeInDown col-sm-6"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
<<<<<<< HEAD
                    <a href="tipo_usuario.php">
=======
                    <a href="lista_tipo_usuario.php">
>>>>>>> 8991e2d8d9126d5e9d4fa2cfa10e74109efea498
                        <img class="conimagen" id="conimg"src="../imagenes/tipousuario.jpeg" id="icon" alt="User Icon" style="max-width:60%;width:auto;height:auto;"/>
                    </a>
                    <h1>Tipo de Usuario</h1>
                </div>
            </div>
        </div>


        <div class="wrapper fadeInDown col-sm-6"><!--efecto de caida-->
            <div id="formContent"><!--contenedor-->
                <div class="fadeIn first">
<<<<<<< HEAD
                    <a href="lista_tipo_empleado.php">
=======
                    <a href="tipo_empleado/lista_tipo_empleado.php">
>>>>>>> 8991e2d8d9126d5e9d4fa2cfa10e74109efea498
                    <img class="img-fluid" src="../imagenes/tipoempleado.jpg" id="icon" alt="User Icon" style="max-width:60%;width:auto;height:auto;">
                    </a>
                    <h1>Tipo de Empleado</h1>
                </div>
            </div>
        </div>

        <div class="container-fluid wrapper fadeInDown col-sm-5">
        <br>
            <center>
               
                <a href="ViewAdministrador.php"><button type="button" class="btn btn-warning btn-lg" >Regresar</button></a>
                
            </center>
            </div>

    </div>
</div>
</body>
</html>
<?php
}

else{/**else de la session */
    header("location: ../Index.php");
}/**ses */
?>