<?php

// Conectar a la base de datos "DatosPersonales"
$conexion = mysqli_connect('localhost', 'root', '', 'DatosPersonales');

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Comprobar si el valor 'generoTutorSeleccionado' ha sido enviado
if (isset($_POST['generoTutorSeleccionado'])) {
    $GeneroTutor = $_POST['generoTutorSeleccionado'];
    echo "Genero seleccionado: $GeneroTutor<br>";  // Debug: Mostrar el genero seleccionado

    // Preparar la consulta para evitar inyecciones SQL
    if ($consulta = $conexion->prepare("SELECT * FROM tutores WHERE genero = ?")) {
        $consulta->bind_param("s", $GeneroTutor); // 's' especifica que la variable es una cadena (string)
        $consulta->execute();
        $resultado = $consulta->get_result();

        if ($resultado->num_rows > 0) {
            // Mostrar los datos de cada fila
            while ($fila = $resultado->fetch_assoc()) {
                echo "Nombre: " . $fila['nombre'] . " - Apellidos: " . $fila['apellido_paterno'] . " " . $fila['apellido_materno'] . "<br>";
            }
        } else {
            echo "No se encontraron registros.";
        }
        $consulta->close();
    } else {
        echo "Error en la consulta: " . $conexion->error;  // Debug: Mostrar error de la consulta
    }
} else {
    echo "GeneroTutor no ha sido definido en el formulario.";
}

mysqli_close($conexion);

?>
