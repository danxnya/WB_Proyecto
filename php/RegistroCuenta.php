<?php

// Conectar la base de datos llamada "Cuenta"
$conexion = mysqli_connect('localhost', 'root', '', 'DatosPersonales');

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
$telefono = $_POST['telefono'];

//revisar si el correo ya esta registrado
$consulta1 = "SELECT * FROM usuarios WHERE correo = '$correo'";
$resultado1 = mysqli_query($conexion, $consulta1);

if (mysqli_num_rows($resultado1) >= 1) {
    echo "El correo ya esta registrado";
    exit();
} else {


    // Insertar los datos en la tabla usuarios, insertar correo, contraseña y telefono
    $consulta = "INSERT INTO usuarios (correo, contrasena, telefono) VALUES ('$correo', '$contrasena', '$telefono')";
    $resultado = mysqli_query($conexion, $consulta);



    if ($resultado) {
        // Redirigir a la página login.html
        header("Location: /html/login.html");
        exit(); // Asegúrate de salir después de redirigir
    } else {
        echo "Correo o contraseña incorrectos";
    }
}

mysqli_close($conexion);
