<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/WB_Proyecto/mycss/mystyle.css">
</head>

<body>
    <div class="container mt-3" style="max-width: 600px;"> <!-- Reducir el ancho máximo aquí -->
        <h1 class="mb-3">Agregar Nuevo Usuario</h1>
        <form action="/WB_Proyecto/php/CRUD/create.php" method="POST" id="formulario">
            <div class="formulario_campo form-group" id="formulario_correo">
                <label for="correo">Correo institucional:</label>
                <i class="formulario__validacion bi bi-x-circle-fill"></i>
                <input type="email" class="form-control" name="correo" id="correo" required />
            </div>
            <div class="formulario_campo form-group" id="formulario_contrasena">
                <label for="contrasena">Contraseña:</label>
                <i class="formulario__validacion bi bi-x-circle-fill"></i>
                <input type="password" class="form-control" name="contrasena" id="contrasena" required />
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
            <div class="formulario_campo form-group" id="formulario_telefono">
                <label for="telefono">Telefono:</label>
                <i class="formulario__validacion bi bi-x-circle-fill"></i>
                <input type="number" class="form-control" name="telefono" id="telefonof" required />
            </div>
            <div class="formulario_campo form-group">
                <label for="semestre">Semestre:</label>
                <select type="number" class="form-control form-select" name="semestre" id="semestre" required>
                    <option selected>Primero</option>
                    <option value="Segundo">Segundo</option>
                    <option value="Tercero">Tercero</option>
                    <option value="Cuarto">Cuarto</option>
                    <option value="Quinto">Quinto</option>
                    <option value="Sexto">Sexto</option>
                    <option value="Septimo">Séptimo</option>
                    <option value="Octavo">Octavo</option>
                    <option value="Noveno">Noveno</option>
                    <option value="Decimo">Décimo</option>
                </select>
            </div>
            <div class="formulario_campo form-group">
                <label for="semestre">Carrera:</label>
                <select type="number" class="form-control form-select" name="carrera" id="carrera" required>
                    <option selected>ISC</option>
                    <option value="IIA">IIA</option>
                    <option value="LCD">LCD</option>
                </select>
            </div>
            <div class="formulario_campo form-group">
                <label for="semestre">Carrera:</label>
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

<?php

// Conectar la base de datos llamada "DatosPersonales"
$conexion = mysqli_connect('localhost', 'root', '', 'DatosPersonales');

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener los datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $boleta = $_POST['boleta'];
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $telefono = $_POST['telefono'];
    $semestre = $_POST['semestre'];
    $carrera = $_POST['carrera'];
    $genero_tutor = $_POST['genero_tutor'];


    $query = "INSERT INTO DatosPersonales (correo, contrasena, boleta, nombre, apellido_paterno, apellido_materno, telefono, semestre, carrera, genero_tutor) VALUES ('$correo', '$contrasena', '$boleta', '$nombre', '$apellido_paterno', '$apellido_materno', '$telefono', '$semestre', '$carrera', '$genero_tutor')";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado == 1) {
        echo "Usuario añadido con éxito.";
    } else {
        echo "Error al añadir el usuario: " . mysqli_error($conexion);
    }
}

mysqli_close($conexion);
?>