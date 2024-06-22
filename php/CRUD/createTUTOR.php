<?php
session_start();
if (!isset($_SESSION['correo']) || $_SESSION['correo'] != 'admin') {
    header("Location: /WB_Proyecto/html/login.html");
    exit();
}

// Conectar la base de datos llamada "DatosPersonales"
$conexion = mysqli_connect('localhost', 'root', '', 'DatosPersonales');
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $genero_tutor = $_POST['genero_tutor'];

    $query = "INSERT INTO DatosPersonales (correo, contrasena, boleta, nombre, apellido_paterno, apellido_materno, telefono, semestre, carrera, tutoria, genero_tutor) VALUES ('$correo', '$contrasena', '$boleta', '$nombre', '$apellido_paterno', '$apellido_materno', '$telefono', '$semestre', '$carrera', '$tutoria', '$genero_tutor')";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado == 1) {
        echo "Usuario añadido con éxito.";
    } else {
        echo "Error al añadir el usuario: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/WB_Proyecto/mycss/admin.css">
</head>
<body>
    <div class="container mt-3" style="max-width: 600px;">
        <h1 class="mb-3">Agregar Nuevo Usuario</h1>
        <a href="/WB_Proyecto/html/admin.php" class="btn btn-secondary mb-3">Regresar al Panel de Administración</a>
        <form action="/WB_Proyecto/php/CRUD/create.php" method="POST" id="formulario">
            </div>
            <div class="formulario_campo form-group" id="formulario_boleta">
                <label for="boleta">Numero de boleta:</label>
                <i class="formulario__validacion bi bi-x-circle-fill"></i>
                <input type="number" class="form-control" name="boleta" id="boleta" required />
            </div>
            <div class="formulario_campo form-group" id="formulario_nombre">
                <label for="nombre">Nombre:</label>
                <i class="formulario__validacion bi bi-x-circle-fill"></i>
                <input type="text" class="form-control" name="nombre" id="nombre" required />
            </div>
            <div class="formulario_campo form-group" id="formulario_apellido_paterno">
                <label for="apellido_paterno">Primer apellido:</label>
                <i class="formulario__validacion bi bi-x-circle-fill"></i>
                <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" required />
            </div>
            <div class="formulario_campo form-group" id="formulario_apellido_materno">
                <label for="apellido_materno">Segundo apellido:</label>
                <i class="formulario__validacion bi bi-x-circle-fill"></i>
                <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" required />
            </div>

            <div class="formulario_campo form-group">
                <label for="semestre">Genero del tutor:</label>
                <select type="number" class="form-control form-select" name="genero_tutor" id="genero_tutor" required>
                    <option selected>Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>

            <input type="submit" class="btn btn-primary" value="Enviar" />
            <input type="reset" class="btn btn-secondary" value="Limpiar" />
            
        </form>
        <br>
    </div>
</body>
</html>




