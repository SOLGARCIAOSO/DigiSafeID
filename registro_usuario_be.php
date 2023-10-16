<?php

//conectar a la tabla usuarios de la bd login_register_db 
    include 'conexion_be.php';  //se llamo al archivo 'conexion_be.php para que estableciera la conexion, sin tener que poner $conexion...

//variables para almacenar los valores del formulario registro
    $nombre_completo = $_POST['nombre_completo'];
    $correo = $_POST['correo'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

   //  encriptacion de contraseñas con funcion hash
    $contrasena = hash('sha512', $contrasena); //algoritmo de encriptamiento sha512

//creacion de un query paa que se guarden los valores del formulario registro - funcion de consulta
    $query = "INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena) 
                VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";

// verificar que el correo no se repita en la bd
            $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo ='$correo' ");

            if(mysqli_num_rows($verificar_correo) > 0){
                echo '
                <script>
                alert("Este correo ya esta registrado, intente con un correo diferente");
                window.location ="../index.php";
                </script>
                ';

                exit();
            }

            // verificar que el nombre de usuario no se repita en la bd
            $verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario ='$usuario' ");

            if(mysqli_num_rows($verificar_usuario) > 0){
                echo '
                <script>
                alert("Este usuario ya esta registrado, intente con un usuario diferente");
                window.location ="../index.php";
                </script>
                ';

                exit();
            }

    //ejecutar la query
    $ejecutar = mysqli_query($conexion, $query); //se ejecuta la conexion con la bd y la insercion de los valores en el formulario


    //condicional para enviar mensaje de registro exitoso  //funcion de javascript para que solo se muestre ese mensaje emergente
    if($ejecutar){
        echo '
        <script>
            alert("Usuario registrado exitosamente");
            window.location = "../index.php";
        </script>
        ';
    }else{
        echo '
        <script>
            alert("Intentalo de nuevo, usuario no registrado");
            window.location = "../index.php";
        </script>
        ';
    }

    mysqli_close($conexion);
?>