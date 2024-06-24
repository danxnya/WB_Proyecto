<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ingresar</title>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Hoja de Estilos Personal -->
  <link rel="stylesheet" href="/WB_Proyecto/mycss/login.css" />
  <!-- Logo de la página (Pestaña) -->
  <link rel="icon" href="/WB_Proyecto/img/PIT.png" type="image/icon type">


  <style>
    /* Estilos adicionales para mejorar el centrado y la presentación */
    .container-height {
      height: 100%;
      align-items: center; /* Alineación vertical */
      justify-content: center; /* Alineación horizontal */
    }
    .body {
    margin-top: 50px; /* Ajusta el valor según el espacio que desees */
    }
    fieldset {
      width: 100%; /* optional: ajusta el ancho del fieldset si es necesario */
    }
  </style>

</head>

                        <!-- Inicio del Body -->
<body>
  <!-- Barra de navegacion-->
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      
      <!-- Imagen Personal (Seguida del PIT) (Equipo) -->
      <div class="navbar-brand">
      <img class="logo" src="/WB_Proyecto/img/Mio.png" alt="Logo Pagina" title="Mio" width="" height="70px">
      </div>
      
      <!-- Imagen del lado izquierdo (PIT) -->
      <img class="logo" src="/WB_Proyecto/img/PIT.png" alt="Logo Pagina" title="IPN" width="" height="90px" style="margin-left: 10px;">

      <!-- 
              "Hamburger Menu" o Barra de Navegación para Celulares 
                        (Barra de navegación contraída) 
      -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 10px;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/WB_Proyecto/html/index.html"><i
                class="bi bi-house-door-fill"></i> Inicio</a>
          </li>

          <!-- Navegar a: Inicio de Sesión (Login) -->
          <li class="nav-item">
            <a class="nav-link" href="/WB_Proyecto/html/login.html"><i class="bi bi-person-fill"></i>
              Ingresar</a>
          </li>

          <!-- Navegar a: Páginas (Externas) Oficiales -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
              aria-expanded="false"><i class="bi bi-paperclip"></i> Páginas Oficiales</a>

            <ul class="dropdown-menu">
              <!-- Link Externo hacia la Pág. Oficial del IPN -->
              <li>
                <a style="color: #952f57;" class="dropdown-item"
                  href="https://www.ipn.mx/" target="_blank">IPN<img src="/WB_Proyecto/img/IPN_logo.png" alt="logoipn" title="IPN"
                    width="" height="30px">
                </a>
              </li>
              
              <!-- Divisor del menú desplegable -->
              <li>
                <hr class="dropdown-divider" />
              </li>
              
              <!-- Link Externo hacia la Pág. Oficial de la ESCOM -->
              <li>
                <a class="dropdown-item"
                  href="https://www.escom.ipn.mx/" target="_blank">ESCOM <img src="/WB_Proyecto/img/ESCOM_logo.png" title="ESCOM"
                    alt="logoescom" width="" height="20px">
                </a>
              </li>
            </ul>
          </li>

          <!-- Navegar a: Créditos (Del Equipo) -->
          <li class="nav-item">
            <a class="nav-link" href="/WB_Proyecto/html/creditos.html">
              <i class="bi bi-mortarboard-fill"></i>
              Créditos
            </a>
          </li>

          <!-- Navegar a: Admin (Login del ADMIN) -->
          <li class="nav-item">
            <a class="nav-link" href="/WB_Proyecto/html/loginadmin.html">
              <i class="bi bi-person-fill"></i>
              Admin
            </a>
          </li>
        </ul>

        <!-- Logos de la Escuela (Lado Derecho) -->
      <!-- Logos para pantallas grandes -->
      <div style="margin-right: 10px;">
      <div class="d-none d-lg-flex">
        <img class="logo" src="/WB_Proyecto/img/ESCOM_logo.png" alt="Logo ESCOM" title="ESCOM" height="70px" style="margin-right: 10px;">
        <img class="logo" src="/WB_Proyecto/img/IPN_logo.png" alt="Logo IPN" title="IPN" height="70px">
      </div>
      
      <!-- Logos para pantallas pequeñas -->
      <div class="d-flex w-100 justify-content-between mt-2 d-lg-none">
        <img class="logo" src="/WB_Proyecto/img/ESCOM_logo.png" alt="Logo ESCOM" title="ESCOM" height="70px">
        <img class="logo" src="/WB_Proyecto/img/IPN_logo.png" alt="Logo IPN" title="IPN" height="70px">
      </div>
        </div>
      
      </div>
    </div>
  </nav>

  <div class="body container-fluid container-height">
    <div class="row justify-content-center">
      <div class="col-md-4"> <!-- Columna centrada de tamaño medio -->
        <fieldset class="shadow p-3">
          <legend>Datos personales y académicos</legend>
          <form action="/WB_Proyecto/php/login.php" method="POST" id="loginForm">
            <div class="formulario_campo form-group" id="formulario_correo">
              <label for="correo">Correo institucional:</label>
              <i class="formulario__validacion bi"></i>
              <input type="email" class="form-control" name="correo" id="correo" required />
            </div>
            <div class="formulario_campo form-group" id="formulario_contrasena">
              <label for="contrasena">Contraseña:</label>
              <i class="formulario__validacion bi"></i>
              <input type="password" class="form-control" name="contrasena" id="contrasena" required />
            </div>
            <div class="formulario_campo form-group" id="formulario_boleta">
              <label for="boleta">Numero de boleta:</label>
              <i class="formulario__validacion bi"></i>
              <input type="number" class="form-control" name="boleta" id="boleta" required />
            </div>
            <div class="formulario_campo form-group" id="formulario_nombre">
              <label for="nombre">Nombre:</label>
              <i class="formulario__validacion bi"></i>
              <input type="text" class="form-control" name="nombre" id="nombre" required />
            </div>
            <div class="formulario_campo form-group" id="formulario_apellido_paterno">
              <label for="apellido_paterno">Primer apellido:</label>
              <i class="formulario__validacion bi"></i>
              <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" required />
            </div>
            <div class="formulario_campo form-group" id="formulario_apellido_materno">
              <label for="apellido_materno">Segundo apellido:</label>
              <i class="formulario__validacion bi"></i>
              <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" required />
            </div>
            <div class="formulario_campo form-group" id="formulario_telefono">
              <label for="telefono">Telefono:</label>
              <i class="formulario__validacion bi"></i>
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
              <label for="carrera">Carrera:</label>
              <select type="number" class="form-control form-select" name="carrera" id="carrera" required>
                <option selected>ISC</option>
                <option value="IIA">IIA</option>
                <option value="LCD">LCD</option>
              </select>
            </div>
            <div class="formulario_campo form-group">
              <label for="tutoria">Tipo de tutoria:</label>
              <select type="text" class="form-control form-select" name="tutoria" id="tutoria" required>
                <option disabled selected>Seleccionar tutoria</option>
                <option value="Individual">Individual</option>
                <option value="Grupal">Grupal</option>
                <option value="Regularizacion">Regularización</option>
                <option value="Pares">Entre pares</option>
                <option value="Recuperacion">Recuperación académica</option>
              </select>
            </div>
            <label for="genero_tutor">Genero del tutor:</label>

            <div class="formulario_campo form-group">
              <div class="form-check-inline">
                <input class="form-check-input" type="radio" id="genero_masculino" name="genero_tutor" value="M" required>
                <label class="form-check-label" for="genero_masculino">Masculino</label>
              </div>
              <div class="form-check-inline">
                <input class="form-check-input" type="radio" id="genero_femenino" name="genero_tutor" value="F" required>
                <label class="form-check-label" for="genero_femenino">Femenino</label>
              </div>
            </div>

            <div class="mb-3" id="tutorContainer" style="display: none;">
                    <label for="tutor">Selecciona tu tutor:</label>
                    <select class="form-select controls" id="tutor" name="id_tutor" required>
                        <option value="" disabled selected>Selecciona un tutor</option>
                    </select>
                </div>
            <br>
          

            <input type="button" id="submitButton" class="btn btn-primary" value="Enviar" />
            <input type="reset" class="btn btn-secondary" value="Limpiar" />

            <div class="formulario__mensaje" id="formulario__mensaje">
              <p>Por favor rellena el formulario correctamente. </p>
            </div>

            <div class="formulario__grupo formulario__grupo-btn-enviar">
              <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>
          </form>
        </fieldset>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="resultModalLabel">Resultados</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body data">

              
                <div class="container">
                  <h1 class="display-4">Datos personales</h1>
                  <p class="lead">
                    En esta sección se mostrarán los datos personales y académicos que
                    se han registrado.
                  </p>
                </div>
                <div class="php">

                  <?php
                  $mostrarModal = false;
                  // Conectar la base de datos llamada "DatosPersonales"
                  $conexion = mysqli_connect('localhost', 'root', '', 'DatosPersonales');

                  if (!$conexion) {
                    die("Error al conectar con la base de datos: " . mysqli_connect_error());
                  }

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
                  $tutoria = $_POST['tutoria'];
                  $genero_tutor = $_POST['genero_tutor'];

                                    // Validar que los datos no existan en la base de datos
                  if (mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM DatosPersonales WHERE correo = '$correo'")) > 0) {
                      echo "El correo ya ha sido registrado.<br>";
                  } else if (mysqli_num_rows(mysqli_query($conexion, "SELECT * FROM DatosPersonales WHERE boleta = '$boleta'")) > 0) {
                      echo "La boleta ya ha sido registrada.<br>";
                  } else
                  



                  if (
                    preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $correo) &&
                    preg_match('/^\d{10}$/', $boleta) &&
                    preg_match('/^[a-zA-ZÀ-ÿ\s]{1,40}$/', $nombre) &&
                    preg_match('/^[a-zA-ZÀ-ÿ\s]{1,40}$/', $apellido_paterno) &&
                    preg_match('/^[a-zA-ZÀ-ÿ\s]{1,40}$/', $apellido_materno) &&
                    preg_match('/^\d{10}$/', $telefono)
                  ) {

                    // Insertar los datos en la tabla "DatosPersonales"
                    $consulta = "INSERT INTO DatosPersonales (correo, contrasena, boleta, nombre, apellido_paterno, apellido_materno, telefono, semestre, carrera, tutoria, genero_tutor) VALUES ('$correo','$contrasena', '$boleta', '$nombre', '$apellido_paterno', '$apellido_materno', '$telefono', '$semestre', '$carrera','$tutoria', '$genero_tutor')";
                    $resultado = mysqli_query($conexion, $consulta);

                    if ($resultado == 1) {
                      echo "Datos personales guardados correctamente.<br><br><br>";
                      $mostrarModal = true;
                    

                    $consulta = "SELECT * FROM DatosPersonales WHERE boleta = '$boleta'";
                    $resultado = mysqli_query($conexion, $consulta);

                    //Sus datos son:
                    echo "Datos personales:<br><br>";
                    echo "Correo: $correo<br><br>";
                    echo "Contraseña: ********<br><br>";
                    echo "Boleta: $boleta<br><br>";
                    echo "Nombre: $nombre<br><br>";
                    echo "Primer Apellido: $apellido_paterno<br><br>";
                    echo "Segundo Apellido: $apellido_materno<br><br>";
                    echo "Telefono: $telefono<br><br>";
                    echo "Semestre: $semestre<br><br>";
                    echo "Carrera: $carrera<br><br>";
                    echo "Tipo de Tutoria: $tutoria<br><br>";
                    echo "Genero Tutor: $genero_tutor<br><br>";

                  } else {
                    echo "Error al guardar los datos personales: " . mysqli_error($conexion);
                  }

                  }

                  mysqli_close($conexion);

                  ?>
                </div>

                
                <!-- Boton para mostrar la lista de tutores segun el genero -->
                <form action="/WB_Proyecto/php/tutores.php" method="post" class="mb-3 align-self-end d-grid gender" id="tutorForm">
                  <input type="hidden" name="generoTutorSeleccionado" id="generoTutorSeleccionado" value="" />
                  <input type="submit" class="btn btn-primary" value="Ver lista de tutores por género" />
                </form>


              

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  <footer class="footer mt-auto py-3">
    <div class="container text-center">
      <span class="text-muted">© 2024 Mi Sitio Web</span>
    </div>
  </footer>




  <!-- Bootstrap JavaScript Bundle -->
  <script>
  document.getElementById('submitButton').addEventListener('click', function() {
    if (confirm('¿Estás seguro de que quieres enviar los datos?')
    // Impresion de los datos recuperados del formulario
  ) {
      // Si el usuario confirma, se envía el formulario
      document.getElementById('loginForm').submit();
    } else {
      // Si el usuario no confirma, simplemente se muestra una alerta o no se hace nada
      alert('Puedes revisar y modificar tus datos antes de enviar.');
    }
  });



document.getElementById('tutorForm').addEventListener('submit', function(event) {
    // Si necesitas confirmación, puedes agregarla aquí
    if (!confirm('¿Deseas proceder con este género del tutor seleccionado?')) {
        event.preventDefault(); // Detiene el envío del formulario
    }
});


  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="/WB_Proyecto/myjs/login1.js"></script>


  <?php if ($mostrarModal) : ?>
    <script>
      var myModal = new bootstrap.Modal(document.getElementById('resultModal'));
      myModal.show();
    </script>
  <?php endif; ?>


</body>

</html>