<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ingresar</title>

  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="/WB_Proyecto/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="/WB_Proyecto/mycss/login.css" />
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="border-bottom: 2px solid">
    <div class="container">
      <!-- Icono del lado izquierdo -->
      <img style="margin-right: 20px; margin-left: 9px;" src="/WB_Proyecto/img/Mio.png" alt="Logo Pagina" title="Mio" width="" height="70px">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a style="color:#ffffff;" class="nav-link active" aria-current="page" href="/html/index.html"><i class="bi bi-house-door-fill"></i> Inicio</a>
          </li>
          <li class="nav-item">
            <a style="color:#ffffff;" class="nav-link" href="/html/login.html"><i class="bi bi-person-fill"></i>
              Ingresar</a>
            <!-- Cambiar de pagina para log in -->
          </li>
          <li class="nav-item dropdown">
            <a style="color:#ffffff;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-paperclip"></i> Paginas Oficiales</a>
            <ul style="background-color: #121212;" class="dropdown-menu">
              <li style="background-color: #121212;"><a class="dropdown-item" style="color: rgb(189, 59, 50);" href="https://www.ipn.mx/" target="_blank">IPN<img src="/WB_Proyecto/img/IPN_logo.png" alt="logoipn" title="IPN" width="" height="30px"></a></li>
              <li style="background-color: #525252;">
                <hr class="dropdown-divider" />
              </li>
              <li style="background-color: #121212;"><a style="color: rgb(64, 98, 150);" class="dropdown-item" href="https://www.escom.ipn.mx/" target="_blank">ESCOM <img src="/WB_Proyecto/img/ESCOM_logo.png" alt="logoescom" title="ESCOM" width="" height="20px"></a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a style="color:#ffffff;" class="nav-link" href="/html/creditos.html"><i class="bi bi-mortarboard-fill"></i>
              Creditos</a>
          </li>
        </ul>

        <img style="margin-right: 20px; margin-left: 9px;" src="/WB_Proyecto/img/ESCOM_logo.png" alt="Logo Pagina" title="ESCOM_Nombre" width="" height="70px">
        <img style="margin-right: 20px; margin-left: 9px;" src="/WB_Proyecto/img/IPN_logo.png" alt="Logo Pagina" title="ESCOM_Nombre" width="" height="70px">
      </div>
    </div>
  </nav>

  <div class="container body">
    <div class="row">



      <div>
        <fieldset class="shadow mb-4 acount">
          <legend>Cuenta</legend>
          <form action="/WB_Proyecto/php/ConexionCuenta.php" method="post">
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="correo" class="form-label">Correo institucional:</label>
                <input type="email" class="form-control" name="correo" id="correoc" placeholder="name@alumno.ipn.mx" required />
              </div>
              <div class="col-md-5 mb-3">
                <label for="contrasena" class="form-label">Contraseña:</label>
                <input type="password" class="form-control" name="contrasena" id="contrasenac" required />
              </div>
              <div class="col-md-2 mb-3 align-self-end d-grid">
                <input type="submit" class="btn btn-primary" value="Enviar" />
              </div>
            </div>
          </form>
        </fieldset>
      </div>

      <div class="col-lg-8 shadow mb-5 data">
        <div class="container">
          <h1 class="display-4">Datos personales</h1>
          <p class="lead">
            En esta sección se mostrarán los datos personales y académicos que
            se han registrado.
          </p>
        </div>
        <div class="php">
          <?php

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
          $genero_tutor = $_POST['genero_tutor'];

          if (
            preg_match('/^\d{10}$/', $boleta) &&
            preg_match('/^[a-zA-ZÀ-ÿ\s]{1,40}$/', $nombre) &&
            preg_match('/^[a-zA-ZÀ-ÿ\s]{1,40}$/', $apellido_paterno) &&
            preg_match('/^[a-zA-ZÀ-ÿ\s]{1,40}$/', $apellido_materno) &&
            preg_match('/^\d{10}$/', $telefono)
          ) {

            // Insertar los datos en la tabla "DatosPersonales"
            $consulta = "INSERT INTO DatosPersonales (correo, contrasena, boleta, nombre, apellido_paterno, apellido_materno, telefono, semestre, carrera, genero_tutor) VALUES ('$correo','$contrasena', '$boleta', '$nombre', '$apellido_paterno', '$apellido_materno', '$telefono', '$semestre', '$carrera', '$genero_tutor')";
            $resultado = mysqli_query($conexion, $consulta);

            if ($resultado == 1) {
              echo "Datos personales guardados correctamente.<br><br><br>";
            } else {
              echo "Error al guardar los datos personales: " . mysqli_error($conexion);
            }

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
            echo "Genero Tutor: $genero_tutor<br><br>";
          }

          mysqli_close($conexion);

          ?>
        </div>

        <!-- Boton para mostrar la lista de tutores segun el genero -->
        <form action="/php/tutores.php" method="post" class="mb-3 align-self-end d-grid gender">
          <input type="submit" class="btn btn-primary" value="Ver lista de tutores por genero" />
        </form>

      </div>

      <div class="col-lg-4">
        <fieldset class="shadow mb-5">
          <legend>Datos personales y académicos</legend>
          <form action="/php/login.php" method="POST" id="formulario">
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
            <input type="reset" class="btn btn-secondary" value="Generar PDF" />

            <div class="formulario__mensaje" id="formulario__mensaje">
              <p>Por favor rellena el formulario correctamente. </p>
            </div>

            <div class="formulario__grupo formulario__grupo-btn-enviar">
              <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>
          </form>
        </fieldset>
      </div>
    </div>
  </div>

  <footer class="footer mt-auto py-3 bg-dark">
    <div class="container text-center">
      <span class="text-muted" style="color: #999 !important">© 2024 Mi Sitio Web</span>
    </div>
  </footer>

  <!-- Bootstrap JavaScript Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const formulario = document.getElementById('formulario');
    const inputs = document.querySelectorAll('#formulario input');

    const expresiones = {
      boleta: /^\d{10}$/, // 10 numeros.
      nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
      apellido_paterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
      apellido_materno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
      telefono: /^\d{10}$/ // 10 numeros.
    }

    const campos = {
      boleta: false,
      nombre: false,
      apellido_paterno: false,
      apellido_materno: false,
      telefono: false,
    }

    const validarFormulario = (e) => {
      switch (e.target.name) {
        case "boleta":
          validarCampo(expresiones.boleta, e.target, 'boleta');
          break;
        case "nombre":
          validarCampo(expresiones.nombre, e.target, 'nombre');
          break;
        case "apellido_paterno":
          validarCampo(expresiones.apellido_paterno, e.target, 'apellido_paterno');
          break;
        case "apellido_materno":
          validarCampo(expresiones.apellido_materno, e.target, 'apellido_materno');
          break;
        case "telefono":
          validarCampo(expresiones.telefono, e.target, 'telefono');
          break;
      }
    }

    const validarCampo = (expresion, input, campo) => {
      if (expresion.test(input.value)) {
        document.getElementById(`formulario_${campo}`).classList.remove('formulario_incorrecto');
        document.getElementById(`formulario_${campo}`).classList.add('formulario_correcto');
        document.querySelector(`#formulario_${campo} i`).classList.add('bi-check-circle-fill');
        document.querySelector(`#formulario_${campo} i`).classList.remove('bi-x-circle-fill');
        campos[campo] = true;
      } else {
        document.getElementById(`formulario_${campo}`).classList.add('formulario_incorrecto');
        document.querySelector(`#formulario_${campo} i`).classList.remove('bi-check-circle-fill');
        document.querySelector(`#formulario_${campo} i`).classList.add('bi-x-circle-fill');
        document.getElementById(`formulario_${campo}`).classList.remove('formulario_correcto');
        campos[campo] = false;
      }
    }

    inputs.forEach((input) => {
      input.addEventListener('keyup', validarFormulario);
      input.addEventListener('blur', validarFormulario);
    });

    formulario.addEventListener('submit', (e) => {
      if (!(campos.boleta && campos.nombre && campos.apellido_paterno && campos.apellido_materno && campos.telefono)) {
        e.preventDefault();
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        setTimeout(() => {
          document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
        }, 2000);
      }
    });
  </script>
</body>

</html>