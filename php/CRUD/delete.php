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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $boleta = $_POST['boleta'];
    $query = "DELETE FROM DatosPersonales WHERE boleta = '$boleta'";
    $resultado = mysqli_query($conexion, $query);

    if ($resultado) {
        echo "<script>alert('Usuario eliminado con éxito.');</script>";
    } else {
        echo "<script>alert('Error al eliminar el usuario: " . mysqli_error($conexion) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/WB_Proyecto/mycss/admin.css">
    <style>

        .thead-purple {
            background-color: #a688fa; 
            border: 1px solid #a688fa;
            color: black;
        }
        .table td, .table th {
        text-align: center;
        vertical-align: middle;
    }
    </style>
</head>
<body>
    <div class="container mt-3">
        <h1 class="mb-3">Eliminar usuario con la boleta (ID)</h1>
        <a href="/WB_Proyecto/html/admin.php" class="btn btn-secondary mb-3">Regresar al Panel de Administración</a>
        <form action="/WB_Proyecto/php/CRUD/delete.php" method="POST" id="formulario">
            <div class="form-group">
                <label for="boleta">Número de boleta:</label>
                <input type="number" class="form-control" name="boleta" id="boleta" required />
            </div>
            <input type="submit" class="btn btn-danger" value="Eliminar" />
            <input type="reset" class="btn btn-secondary" value="Limpiar" />
        </form>
        <br>
    </div>
    <div class="container mt-3">
        <h2>Lista de Usuarios</h2>
        <table class="table table-striped table-hover rounded-table">
            <thead class="thead-purple">
                <tr>
                    <th>ID</th>
                    <th>Correo</th>
                    <th>Contraseña</th>
                    <th>Nombre</th>
                    <th>Apellido Materno</th>
                    <th>Apellido Paterno</th>
                    <th>Teléfono</th>
                    <th>Semestre</th>
                    <th>Carrera</th>
                    <th>Género Tutor</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM DatosPersonales";
                $result = mysqli_query($conexion, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['boleta']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['correo']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['contrasena']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['apellido_materno']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['apellido_paterno']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['telefono']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['semestre']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['carrera']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['genero_tutor']) . "</td>";
                    echo "</tr>";
                }
                mysqli_close($conexion);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
