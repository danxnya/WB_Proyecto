<?php
session_start();

// Conectar la base de datos llamada "DatosPersonales"
$conexion = mysqli_connect('localhost', 'root', '', 'DatosPersonales');

if (!$conexion) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

// Inicializar variables
$login_exitoso = false;
$nombres_tutores = [];
$tutor_asignado = '';

// Verificar si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    if ($correo == "admin@ipn.mx" && $contrasena == "54321") {
        // Iniciar una nueva sesión si el usuario es un administrador
        $_SESSION['correo'] = 'admin';
        echo "Inicio de sesión exitoso.";
        header("Location: /WB_Proyecto/html/admin.php");
        exit();
    }

    // Consulta SQL para obtener los datos del usuario
    $consulta = "SELECT * FROM datospersonales WHERE correo = '$correo' AND contrasena = '$contrasena'";
    $resultado = mysqli_query($conexion, $consulta);

    // Verificar si se encontró un usuario válido
    if (mysqli_num_rows($resultado) == 1) {
        $login_exitoso = true;
        $fila = mysqli_fetch_assoc($resultado); // Obtener datos del usuario

        // Verificar si el usuario ya tiene un tutor asignado
        $tutor_asignado = $fila['tutor_asignado'];

        if (empty($tutor_asignado)) {
            // Obtener el valor de genero_tutor y tutoria del usuario
            $genero_tutor = $fila['genero_tutor'];
            $tipo_tutoria = $fila['tutoria'];

            // Consulta SQL para obtener los nombres de los tutores que coincidan con el genero_tutor y tipo_tutoria y tengan menos de 10 registros
            $consulta_tutores = "SELECT nombre FROM tutores WHERE genero = '$genero_tutor' AND tipotutoria = '$tipo_tutoria' AND registros < 10";
            $resultado_tutores = mysqli_query($conexion, $consulta_tutores);

            // Obtener nombres de los tutores y guardarlos en el array
            while ($fila_tutor = mysqli_fetch_assoc($resultado_tutores)) {
                $nombres_tutores[] = $fila_tutor['nombre'];
            }
        }
    } else {
        echo "Correo o contraseña incorrectos o el usuario no existe.";
    }
}

mysqli_close($conexion); // Cerrar la conexión a la base de datos
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Datos</title>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="/WB_Proyecto/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="/WB_Proyecto/mycss/mystyle.css" />
    <!-- Logo de la página -->
    <link rel="icon" href="/WB_Proyecto/img/PIT.png" type="image/icon type">
</head>

<body>
    <!-- Barra de navegacion-->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <!-- Imagen Personal (Seguida del PIT) (Equipo) -->
            <div class="navbar-brand">
                <img class="logo" src="/WB_Proyecto/img/Mio.png" alt="Logo Pagina" title="Mio" width="" height="70px">
            </div>
            <!-- Imagen del lado izquierdo (PIT) -->
            <img class="logo" src="/WB_Proyecto/img/PIT.png" alt="Logo Pagina" title="IPN" width="" height="90px">

            <!-- "Hamburger Menu" o Barra de Navegación para Celulares -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/WB_Proyecto/html/index.html"><i class="bi bi-house-door-fill"></i> Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/WB_Proyecto/html/login.html"><i class="bi bi-person-fill"></i> Ingresar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-paperclip"></i> Páginas Oficiales</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a style="color: #952f57;" class="dropdown-item" href="https://www.ipn.mx/" target="_blank">IPN<img src="/WB_Proyecto/img/IPN_logo.png" alt="logoipn" title="IPN" width="" height="30px"></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="https://www.escom.ipn.mx/" target="_blank">ESCOM <img src="/WB_Proyecto/img/ESCOM_logo.png" title="ESCOM" alt="logoescom" width="" height="20px"></a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/WB_Proyecto/html/creditos.html"><i class="bi bi-mortarboard-fill"></i> Créditos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/WB_Proyecto/html/loginadmin.html"><i class="bi bi-person-fill"></i> Admin</a>
                    </li>
                </ul>

                <!-- Logos de la Escuela (Lado Derecho) -->
                <div style="margin-right: 15px;">
                    <div class="d-none d-lg-flex">
                        <img class="logo" src="/WB_Proyecto/img/ESCOM_logo.png" alt="Logo ESCOM" title="ESCOM" height="70px" style="margin-right: 10px;">
                        <img class="logo" src="/WB_Proyecto/img/IPN_logo.png" alt="Logo IPN" title="IPN" height="70px">
                    </div>
                    <div class="d-flex w-100 justify-content-between mt-2 d-lg-none">
                        <img class="logo" src="/WB_Proyecto/img/ESCOM_logo.png" alt="Logo ESCOM" title="ESCOM" height="70px">
                        <img class="logo" src="/WB_Proyecto/img/IPN_logo.png" alt="Logo IPN" title="IPN" height="70px">
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <div class="container body" style="margin: 50px 50px 25px 50px;">
        <div class="row">
            <div>
                <div class="bubble shadow">
                    <?php if ($login_exitoso): ?>
                        <!-- Mostrar los datos obtenidos -->
                        <h1>Inicio de sesión exitoso.</h1>
                        <div style="font-size: 20px;">
                            <h2>Datos del usuario:</h2>
                            <div style="margin-bottom: 20px;">
                                <p><strong>Boleta:</strong> <?php echo $fila['boleta']; ?></p>
                                <p><strong>Correo:</strong> <?php echo $fila['correo']; ?></p>
                                <p><strong>Contraseña:</strong> <?php echo $fila['contrasena']; ?></p>
                                <p><strong>Nombre:</strong> <?php echo $fila['nombre']; ?></p>
                                <p><strong>Apellido Paterno:</strong> <?php echo $fila['apellido_paterno']; ?></p>
                                <p><strong>Apellido Materno:</strong> <?php echo $fila['apellido_materno']; ?></p>
                                <p><strong>Teléfono:</strong> <?php echo $fila['telefono']; ?></p>
                                <p><strong>Semestre:</strong> <?php echo $fila['semestre']; ?></p>
                                <p><strong>Carrera:</strong> <?php echo $fila['carrera']; ?></p>
                                <p><strong>Tutoría:</strong> <?php echo $fila['tutoria']; ?></p>
                                <p><strong>Género tutor:</strong> <?php echo $fila['genero_tutor']; ?></p>
                                <p><strong>Tutor asignado:</strong> <?php echo empty($tutor_asignado) ? 'No asignado' : $tutor_asignado; ?></p>
                            </div>
                        </div>
                        <!-- Formulario para generar PDF -->
                        <form action="miPDF.php" method="post" target="_blank">
                            <!-- Campos ocultos para enviar datos al archivo miPDF.php -->
                            <input type="hidden" name="correo" value="<?php echo htmlspecialchars($correo); ?>">
                            <input type="hidden" name="contrasena" value="<?php echo htmlspecialchars($contrasena); ?>">
                            <?php if (empty($tutor_asignado)): ?>
                                <!-- Selección de tutor -->
                                <div class="formulario_campo form-group">
                                    <label for="tutor">Selecciona un tutor:</label>
                                    <select class="form-control" name="tutorselec" id="tutorselec" required>
                                        <?php foreach ($nombres_tutores as $nombre_tutor): ?>
                                            <option value="<?php echo htmlspecialchars($nombre_tutor); ?>"><?php echo htmlspecialchars($nombre_tutor); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php else: ?>
                                <input type="hidden" name="tutorselec" value="<?php echo htmlspecialchars($tutor_asignado); ?>">
                            <?php endif; ?>

                            <!-- Botón para generar PDF -->
                            <button type="submit" class="btn btn-primary">Generar PDF</button>
                        </form>
                        <?php else: ?>
                            <h2>Correo o contraseña incorrectos o el usuario no existe.</h2>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer py-3">
            <div class="container text-center">
                <span class="text-muted">© 2024 Mi Sitio Web</span>
            </div>
            </footer>

        <!-- Bootstrap JavaScript Bundle -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js'></script>
        <script src="/WB_Proyecto/myjs/script.js"></script>
    </body>
</html>
