<?php


// Conectar la base de datos llamada "Cuenta"
$conexion = mysqli_connect('localhost', 'root', '', 'DatosPersonales');

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$GeneroTutor = $_POST['GeneroTutor'];


$consulta = "SELECT * FROM datospersonales WHERE GeneroTutor = '$GeneroTutor'";
$resultado = mysqli_query($conexion, $consulta);

while ($fila = mysqli_fetch_assoc($resultado)) {
    foreach ($fila as $valor) {
        echo $valor . " ";
    }
}

mysqli_close($conexion);

?>
