<?php
    
    session_start(); 
    session_destroy(); //sesion cerrada
    header("location: ../index.php"); //redirecciona al formulario login

?>
