<?php
    $conexion = mysqli_connect('localhost', 'root', 'escom', 'ejemploDB');
    $consultaSQL = "SELECT * FROM alumnos";
    $resultado = mysqli_query($conexion,$consultaSQL);
    $validaResultado = mysqli_num_rows($resultado);

    

    if($resultado = mysqli_query($conexion,$registro)){
        echo "Usuario registrado correctamente";
    }
    echo "Tenemos $validaResultado registro(s) en tu base de datos ejemplo db.";
?>