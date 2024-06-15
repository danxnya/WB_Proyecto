<?php
session_start();
if (!isset($_SESSION['correo']) || $_SESSION['correo'] != 'admin') {
    header("Location: /WB_Proyecto/html/login.html");
    exit();
}

$conexion = mysqli_connect('localhost', 'root', '', 'DatosPersonales');
if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

$userData = [];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    $boleta = $_POST['boleta'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $nombre = $_POST['nombre'];
    $apellido_paterno = $_POST['apellido_paterno'];
    $apellido_materno = $_POST['apellido_materno'];
    $telefono = $_POST['telefono'];
    $semestre = $_POST['semestre'];
    $carrera = $_POST['carrera'];
    $genero_tutor = $_POST['genero_tutor'];

    $query = "UPDATE DatosPersonales SET correo='$correo', contrasena='$contrasena', nombre='$nombre', apellido_paterno='$apellido_paterno', apellido_materno='$apellido_materno', telefono='$telefono', semestre='$semestre', carrera='$carrera', genero_tutor='$genero_tutor' WHERE boleta='$boleta'";
    if (mysqli_query($conexion, $query)) {
        echo "<script>alert('Usuario actualizado con éxito.');</script>";
    } else {
        echo "<script>alert('Error al actualizar el usuario: " . mysqli_error($conexion) . "');</script>";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $boleta = $_POST['boleta_search'];
    $query = "SELECT * FROM DatosPersonales WHERE boleta = '$boleta'";
    $result = mysqli_query($conexion, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $userData = $row;
    } else {
        echo "<script>alert('No se encontró el usuario con la boleta especificada.');</script>";
    }
}

mysqli_close($conexion);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/WB_Proyecto/mycss/admin.css">
</head>
<body>
    <div class="container mt-3">
        <h1 class="mb-3">Actualizar Usuario</h1>
        <a href="/WB_Proyecto/html/admin.php" class="btn btn-secondary mb-3">Regresar al Panel de Administración</a>
        <form action="/WB_Proyecto/php/CRUD/update.php" method="POST">
            <div class="form-group">
                <label for="boleta_search">Número de Boleta:</label>
                <input type="number" class="form-control" name="boleta_search" id="boleta_search" required>
                <button type="submit" class="btn btn-primary mt-2" name="search">Buscar Usuario</button>
            </div>
        </form>

        <?php if (!empty($userData)): ?>
        <form action="/WB_Proyecto/php/CRUD/update.php" method="POST">
            <input type="hidden" name="boleta" value="<?php echo htmlspecialchars($userData['boleta']); ?>">
            <div class="form-group">
                <label for="correo">Correo institucional:</label>
                <input type="email" class="form-control" name="correo" id="correo" value="<?php echo htmlspecialchars($userData['correo']); ?>" required />
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" name="contrasena" id="contrasena" value="<?php echo htmlspecialchars($userData['contrasena']); ?>" required />
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo htmlspecialchars($userData['nombre']); ?>" required />
            </div>
            <div class="form-group">
                <label for="apellido_paterno">Primer apellido:</label>
                <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" value="<?php echo htmlspecialchars($userData['apellido_paterno']); ?>" required />
            </div>
            <div class="form-group">
                <label for="apellido_materno">Segundo apellido:</label>
                <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" value="<?php echo htmlspecialchars($userData['apellido_materno']); ?>" required />
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="number" class="form-control" name="telefono" id="telefono" value="<?php echo htmlspecialchars($userData['telefono']); ?>" required />
            </div>
            <div class="form-group">
                <label for="semestre">Semestre:</label>
                <select class="form-control" name="semestre" id="semestre" required>
                    <option value="<?php echo htmlspecialchars($userData['semestre']); ?>" selected><?php echo htmlspecialchars($userData['semestre']); ?></option>
                    <option value="Primero">Primero</option>
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
            <div class="form-group">
                <label for="carrera">Carrera:</label>
                <select class="form-control" name="carrera" id="carrera" required>
                    <option value="<?php echo htmlspecialchars($userData['carrera']); ?>" selected><?php echo htmlspecialchars($userData['carrera']); ?></option>
                    <option value="ISC">ISC</option>
                    <option value="IIA">IIA</option>
                    <option value="LCD">LCD</option>
                </select>
            </div>
            <div class="form-group">
                <label for="genero_tutor">Género del Tutor:</label>
                <select class="form-control" name="genero_tutor" id="genero_tutor" required>
                    <option value="<?php echo htmlspecialchars($userData['genero_tutor']); ?>" selected><?php echo htmlspecialchars($userData['genero_tutor']); ?></option>
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success" name="update">Actualizar Datos</button>
        </form>
        <br>
        <?php endif; ?>
    </div>
</body>
</html>
