<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login2.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</head>
<body>
<?php
if(isset($_GET['error']))
{
    ?>
    <script src="js/alertaerror.js"></script>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <img src="imagenes/login.jpg" id="icon" alt="User Icon" />
            </div>
            <form method="POST" action="controller/login/login.php">
                <input type="text" id="login" class="fadeIn second" name="usr" placeholder="Usuario">
                <input type="password" id="password" class="fadeIn third" name="pwd" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Log In">    
            </form>
        </div>
    </div>
    <?php

}
else{
    ?>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <img src="imagenes/login.jpg" id="icon" alt="User Icon" />
            </div>
            <form method="POST" action="controller/login/login.php">
                <input type="text" id="login" class="fadeIn second" name="usr" placeholder="Usuario">
                <input type="password" id="password" class="fadeIn third" name="pwd" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Log In">    
            </form>
        </div>
    </div>
    <?php
}
?>
</body>
</html>