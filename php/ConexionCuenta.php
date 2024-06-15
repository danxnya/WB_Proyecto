<?php


// Conectar la base de datos llamada "Cuenta"
$conexion = mysqli_connect('localhost', 'root', '', 'DatosPersonales');

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

if ($correo == "admin@ipn.mx" && $contrasena == "54321") {
    echo "Inicio de sesión exitoso.";
    header("Location: /WB_Proyecto/html/admin.php");
    exit();
}

$consulta = "SELECT * FROM usuarios WHERE correo = '$correo' AND contrasena = '$contrasena'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) == 1) {
    echo "Inicio de sesión exitoso.";


    // header("Location: ../html/Inicio.html");


} else {
    echo "Correo o contraseña incorrectos";
}

mysqli_close($conexion);


?>
