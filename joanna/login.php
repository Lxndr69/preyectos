<?php
if (isset($_POST['btnEntrar'])){


include 'configdb.php'; 
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$validar_log = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario='$usuario' and contrasena='$contrasena'");

if(mysqli_num_rows($validar_log) > 0){
    session_start();
    $_SESSION['usuario']= $usuario;
    header("location: index.php");
}else{ 
    echo '
    <script>
    alert("Usuario inexistente, verifique sus datos")

    </script>';
}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>login</title>
</head>
<body>
    <header class="outlet" align="center" > Outlet Damas </header>
    <div class="card" align="center"> 
        <form action="login.php" method="post">
        <h1>Outlet ropa para damas</h1>  <h3>(inicie sesión)</h3><br><br>
        <label>Usuario:</label>
        <input type="text" name="usuario"></input><br><br>
        <label>Contraseña:</label>
        <input type="password" name="contrasena"></input> <br><br>
        <input type="submit" value="Entrar" name="btnEntrar">
        <a href="register.php">Registrarse</a>
    </form>
    </div>



<div></div>











</body>
</html>