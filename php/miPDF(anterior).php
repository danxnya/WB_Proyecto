<?php
require('../fpdf186/fpdf.php'); // Incluir la clase FPDF

// Conectar a la base de datos usando UTF-8
$conexion = mysqli_connect('localhost', 'root', '', 'DatosPersonales');
mysqli_set_charset($conexion, "utf8"); // Establecer el conjunto de caracteres a UTF-8

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$correo = mysqli_real_escape_string($conexion, $_POST['correo']);
$contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);

// Consulta SQL para obtener los datos del usuario
$consulta = "SELECT * FROM datospersonales WHERE correo = '$correo' AND contrasena = '$contrasena'";
$resultado = mysqli_query($conexion, $consulta);

if (mysqli_num_rows($resultado) == 1) {
    // Crear instancia de FPDF con codificación UTF-8
    $pdf = new FPDF('P', 'mm', 'Letter');
    $pdf->AddPage();

    // Añadir imagen en la esquina superior izquierda
    $pdf->Image('../img/ESCOM_logo.png', 10, 10, 35);

    // Añadir imagen en la esquina superior derecha
    $pdf->Image('../img/IPN_logo.png', 170, 10, 45);
    $pdf->Ln();

    // Encabezado
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Datos del Usuario', 0, 1, 'C');
    $pdf->Ln(); // Salto de línea
    $pdf->Ln(); // Salto de línea
    $pdf->Ln(); // Salto de línea

    // Mostrar los datos del usuario en el PDF
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, utf8_decode('Boleta: ' . $fila['boleta']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Correo: ' . $fila['correo']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Nombre: ' . $fila['nombre']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Apellido Paterno: ' . $fila['apellido_paterno']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Apellido Materno: ' . $fila['apellido_materno']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Teléfono: ' . $fila['telefono']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Semestre: ' . $fila['semestre']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Carrera: ' . $fila['carrera']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Tutoría: ' . $fila['tutoria']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Género tutor: ' . $fila['genero_tutor']), 0, 1);
        $pdf->Cell(0, 10, utf8_decode('Tutor asignado: ' . $fila['tutor_asignado']), 0, 1);
        $pdf->Ln();
    }

    // Salida del PDF
    $pdf->Output('I', 'datos_usuario.pdf');

} else {
    echo "Correo o contraseña incorrectos o el usuario no existe.";
}

mysqli_close($conexion);
?>