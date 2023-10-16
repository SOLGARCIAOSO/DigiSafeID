<?php

session_start();


    include 'conexion_be.php';

    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena); //encriptacion de contraseña

   

    //variable para validar el usuario
    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' and contrasena = '$contrasena'");

    //condicional para dar acceso al usuario que esta tratando de ingresar a la pagina
    if(mysqli_num_rows($validar_login) > 0){
        $_SESSION['usuario'] = $correo;
        header("location: ../bienvenidaa.php"); 
        exit();
    }else{
        echo 
        '<script>
        alert("Usuario no existente, por favor verifique los datos intruducidos");
        window.location = "../index.php";
        </script>
        ';

        exit();
    }



?>