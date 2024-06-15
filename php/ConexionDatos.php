<?php

// Conectar la base de datos llamada "DatosPersonales"
$conexion = mysqli_connect('localhost', 'root', '', 'DatosPersonales');

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$boleta = $_POST['boleta'];
$nombre = $_POST['nombre'];
$PrimerApellido = $_POST['apellido_paterno'];
$SegundoApellido = $_POST['apellido_materno'];
$telefono = $_POST['telefono'];
$semestre = $_POST['semestre'];
$carrera = $_POST['carrera'];
$GeneroTutor = $_POST['genero_tutor'];


// Insertar los datos en la tabla "DatosPersonales"
$consulta = "INSERT INTO DatosPersonales (boleta, nombre, apellido_paterno, apellido_materno, telefono, semestre, carrera, genero_tutor) VALUES ('$boleta', '$nombre', '$PrimerApellido', '$SegundoApellido', '$telefono', '$semestre', '$carrera', '$GeneroTutor')";
$resultado = mysqli_query($conexion, $consulta);

if ($resultado == 1) {
    echo "Datos personales guardados correctamente.<br><br>";
} else {
    echo "Error al guardar los datos personales: " . mysqli_error($conexion);
}

$consulta = "SELECT * FROM DatosPersonales WHERE boleta = '$boleta'";
$resultado = mysqli_query($conexion, $consulta);

//Sus datos son:
echo "Boleta: $boleta<br>";
echo "Nombre: $nombre<br>";
echo "Primer Apellido: $PrimerApellido<br>";
echo "Segundo Apellido: $SegundoApellido<br>";
echo "Telefono: $telefono<br>";
echo "Semestre: $semestre<br>";
echo "Carrera: $carrera<br>";
echo "Genero Tutor: $GeneroTutor<br>";



mysqli_close($conexion);

?>