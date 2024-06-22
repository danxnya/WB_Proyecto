<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/WB_Proyecto/mycss/admin.css">
    <link rel="icon" href="/WB_Proyecto/img/PIT.png" type="image/icon type">
    
</head>
<body>
<div class="container mt-5"> 
        <h1>Lista de Usuarios</h1>
        <div class="mb-3">
            <a href="/WB_Proyecto/php/logout.php" class="btn btn-warning list">Cerrar Sesión</a>
            <a href="/WB_Proyecto/php/CRUD/create.php" class="btn btn-success">Agregar Usuario</a>
            <a href="/WB_Proyecto/php/CRUD/delete.php" class="btn btn-danger">Borrar Usuario</a>
            <a href="/WB_Proyecto/php/CRUD/update.php" class="btn btn-primary">Actualizar Usuario</a>
        </div>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
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
                    <th>Tutoría</th>
                    <th>Género Tutor</th>
                </tr>
            </thead>
            <tbody style="color:white">
                <?php
                session_start();  // Reanudar la sesión existente
                if (!isset($_SESSION['correo']) || $_SESSION['correo'] != 'admin') {
                    header("Location: /WB_Proyecto/html/login.html");
                    exit();
                }

                $conexion = mysqli_connect('localhost', 'root', '', 'DatosPersonales');

                if (!$conexion) {
                    die("Error al conectar con la base de datos: " . mysqli_connect_error());
                }


                $sql = "SELECT * FROM DatosPersonales";
                foreach ($conexion->query($sql) as $row) {
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
                    echo "<td>" . htmlspecialchars($row['tutoria']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['genero_tutor']) . "</td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>



        <h1>Lista de Tutores</h1>
        <div class="mb-3">
            <a href="/WB_Proyecto/php/logout.php" class="btn btn-warning list">Cerrar Sesión</a>
            <a href="/WB_Proyecto/php/CRUD/createTUTOR.php" class="btn btn-success">Agregar Usuario</a>
            <a href="/WB_Proyecto/php/CRUD/deleteTUTOR.php" class="btn btn-danger">Borrar Usuario</a>
            <a href="/WB_Proyecto/php/CRUD/updateTUTOR.php" class="btn btn-primary">Actualizar Usuario</a>
        </div>
        <table class="table table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Género</th>
                </tr>
            </thead>
            <tbody style="color:white">
                <?php
                $conexion = mysqli_connect('localhost', 'root', '', 'DatosPersonales');

                if (!$conexion) {
                    die("Error al conectar con la base de datos: " . mysqli_connect_error());
                }


                $sql = "SELECT * FROM tutores";
                foreach ($conexion->query($sql) as $row) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id_trabajador']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['genero']) . "</td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
</div>
</body>
</html>
