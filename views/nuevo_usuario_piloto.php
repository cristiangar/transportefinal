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
    <title>Usuarios de Piloto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/imagen.css">
    <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/index.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
    <a href="ViewAdministrador.php">
        <img src="../imagenes/logo.png" alt="HTML tutorial" style="width:52px;height:52px;">
    </a>
    <ul class="navbar-nav ml-auto">
       
        <li class="navbar-item">
            <a class="nav-link" >Usuario: <?php echo $us;?></a>
        </li>
        <li class="navbar-item">
        <a class="nav-link" href="../controller/login/login.php?log">Cerrar sesión</a>
        </li>
        
    </ul>

</nav>
<div class="container-fluid">
<?php
if (isset($_GET['id'])){
    $id=$_GET['id'];
    $empleado=$_GET['em'];
    include_once('../controller/usuario.php');
    $usuario= new Usuario();
    $dt=$usuario->VerUnUsuario($id);
    while ($row=mysqli_fetch_array($dt)) {
        $usuario=$row['usuario'];
        $pwd=$row['pass'];
        $idus=$row['id_usuarios'];
        $idrol=$row['id_rol_usuario'];
        $rol=$row['rol'];
    }

    ?>
    <form method="POST" action="../controller/usuario_piloto.php?id=<?php echo $idus;?>&mod">
    <h1>Datos del Usuario</h1>
    <br>
        <div class="form-row">
            <div class="col-sm-4">
            <label>Nombre del Piloto</label>
                <input type="text" name="empleado" value="<?php echo $empleado;?>" class="form-control" placeholder="Nombre" disabled>
            </div>

            <div class="col-sm-4">
            <label>Usuario</label>
                <input type="text" name="us" value="<?php echo $usuario;?>" class="form-control" placeholder="Usuario" require>
            </div>
            <div class="col-sm-4">
            <label>Contraseña</label>
                <input type="text" name="pwd" value="<?php echo $pwd;?>" class="form-control" placeholder="Clave" require>
            </div>

            <div class="col-sm-4">
                <label>Puesto</label>
                <select name="id_rol" id="" class="form-control">
                    <?php echo '<option  value="'.$idrol.'">'.$rol.'</option>'; ?>
                    
                
                </select>
            </div>
                           
        </div>
        </div>
<br>
        
        </div>
            <div class="container-fluid wrapper fadeInDown col-sm-5">
                <br>
                <br>
            <center>
                <input type="submit" class="btn btn-success" value="Aceptar">
                <a href="lista_usuarios_piloto.php"><button type="button" class="btn btn-warning" >Regresar</button></a>
                <input type="submit" class="btn btn-danger" value="cancelar">
                
            </center>
            </div>
    </form>
    <?php
}
else{

}
?>

</div>
</body>
</html>
<?php
}

else{/**else de la session */
    header("location: ../Index.php");
}/**ses */
?>