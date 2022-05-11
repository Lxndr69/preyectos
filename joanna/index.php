<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Index</title>
    <?php

    if(isset($_GET["boton"]) ){
        if(isset($_GET["usuario"]) ){
            $MODELO = $_GET["modelo"];
            $LINEA= $_GET["linea"];
            $ARTICULO = $_GET["articulo"];
            $CANTIDAD = $_GET["cantidad"];
            
            if($USUARIO!=""){
                require "configdb.php";

                $query = "INSERT INTO ropa (usuario, modelo, linea, articulo, cantidad) ";
                $query .= "VALUES('$MODELO','$LINEA','$ARTICULO', '$CANTIDAD');";
    
                $result = mysqli_query($conexion, $query);
    
                if($result === TRUE){
                    echo "Datos guardados correctamente";
                }
                else{
                    echo "no se guardaron datos, intente nuevamente";
                }   
            }
            else{
                echo "no se permiten datos vacios";
            }
         
        }
        else{
            echo "variable de sesión no inicializada";
        }
    }
   

?>

</head>
<body class="body1">
    <header class="titulo">Bienvenid@ <b>"USUARIO"</b> a outlet ropa dama</header>

    <div class="entrasale columnas">
    <div class="inputs">
        <form action="" method="get">
        <label>Modelo: </label>
        <input type="text" placeholder="Introduce el modelo"></input>
        <label>Artículo: </label>
        <input type="text" placeholder="Introduce el artículo"></input>
        <input type="submit" name="boton" value="guardar">
        <br><br>
        <label>Línea: </label>
        <input type="text" placeholder="Introduce la línea"></input>
        <label>Cantidad: </label>
        <input type="text" placeholder="Introduce la cantidad"></input>
        <button>Salidas</button>
        <button align="center">Aceptar</button>
   
</form>
    </div>
    </div>
    <?php 
    require 'configdb.php';
    $query = "SELECT * FROM ropa";
    $tabla_result = mysqli_query($conexion, $query);
    
    if(mysqli_num_rows($tabla_result)>0){
        while($renglon = mysqli_fetch_assoc($tabla_result)){
            ?>
<table style="width:100%">
<tr>
    <td>Folio</td>
    <td>Usuario</td>
    <td>Modelo</td>
    <td>Línea</td>
    <td>Artículo</td>
    <td>Cantidad</td>
  </tr>
  <tr>
    <td>16</td>
    <td>14</td>
    <td>14</td>
    <td>14</td>
    <td>14</td>
    <td>10</td>
  </tr>
  <?php
        }
    } 
    else{
        echo "No hay datos en la tabla, intente nuevamente";
    }

?>
</table>
</body>
</html>