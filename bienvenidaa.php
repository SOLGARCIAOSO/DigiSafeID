<?php
    session_start();   //inicializar la sesión

    //condicional que evalua SI no existe (!=no / isset=existe) una sesion iniciada
    if(!isset($_SESSION['usuario'])){
        echo '
        <script>
        alert("Por favor, debes iniciar sesión");
        window.location = "index.php";
        </script>
        ';
      
        session_destroy(); //destruir cualquier sesion existente
        die(); //dejar de ejcutar el código
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida - DigiSafeId </title>
</head>
<body>
    <h1>Historial de acceso al vehiculo</h1>
    <a href="php/cerrar_sesion.php">Cerrar sesión</a>
</body>
</html>
