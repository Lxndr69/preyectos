<?php

if(!empty ($_POST)){
    $alert='';
    if (empty($_POST['nombre']) || empty($_POST['usuario']) || empty($_POST['contrasena'])){
        $alert='<p>Todos los campos son obligartorios</p>';
    }else{
        require "configdb.php";
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        $query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usuario' ");
        $result = mysqli_fetch_array($query);
if(count($result)  > 0){
    $alert='<p>Datos existentes, intente nuevamente.</p>';
}else{
    $query_insert = mysqli_query ($conexion,"INSERT INTO usuarios (nombre, usuario, contrasena) VALUES ('$nombre', '$usuario', '$contrasena')");
    if($query){
        $alert='<p>usuario creado correctamente</p>';
    }else{
        $alert='<p>error al crear usuario</p>';
    }
}

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
    <title>register</title>
</head>
<body>
    <header class="outlet" align="center" > Outlet Damas </header>
    <div class="card" align="center"> 
        <form action="" method="post">
        <h1>Outlet ropa para damas</h1>  <h3>(ingrese sus datos)</h3><br><br>
        <div><?php echo isset ($alert)? $alert:'';?></div>
        <label>Nombre:</label>
        <input type="text" name="nombre"></input><br><br>
        <label>Usuario:</label>
        <input type="text" name="usuario"></input><br><br>
        <label>Contraseña:</label>
        <input type="password" name="contrasena"></input> <br><br>
        <input type="submit" value="Entrar" name="btnEntrar">
    </form>
    </div>



<div></div>











</body>
</html>