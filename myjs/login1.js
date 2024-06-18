const loginForm = document.getElementById("loginForm");
const inputs = document.querySelectorAll("#loginForm input");

const expresiones = {
  // Debe admitir solamente correos con dominio institucional, que sean del IPN ejemplo@alumno.ipn.mx o ejemplo@ipn.mx
  correo: /^[a-zA-Z0-9_.+-]+@(alumno\.ipn\.mx|ipn\.mx)$/,
  contrasena: /^.{4,12}$/,
  nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  apellido_paterno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  apellido_materno: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
  telefono: /^\d{10}$/, // 10 numeros.
  // La boleta es de 10 digitos
  boleta: /^\d{10}$/,
};

const campos = {
  correo: false,
  contrasena: false,
  nombre: false,
  apellido_paterno: false,
  apellido_materno: false,
  telefono: false,
  boleta: false,
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "correo":
      validarCampo(expresiones.correo, e.target, "correo");
      break;
    case "contrasena":
      validarCampo(expresiones.contrasena, e.target, "contrasena");
      break;
    case "nombre":
      validarCampo(expresiones.nombre, e.target, "nombre");
      break;
    case "apellido_paterno":
      validarCampo(expresiones.apellido_paterno, e.target, "apellido_paterno");
      break;
    case "apellido_materno":
      validarCampo(expresiones.apellido_materno, e.target, "apellido_materno");
      break;
    case "telefono":
      validarCampo(expresiones.telefono, e.target, "telefono");
      break;
    case "boleta":
      validarCampo(expresiones.boleta, e.target, "boleta");
      break;
  }
};

const validarCampo = (expresion, input, campo) => {
  if (expresion.test(input.value)) {
    input.classList.remove("is-invalid");
    input.classList.add("is-valid");
    campos[campo] = true;
  } else {
    input.classList.add("is-invalid");
    input.classList.remove("is-valid");
    campos[campo] = false;
  }
};

inputs.forEach((input) => {
  input.addEventListener("keyup", validarFormulario);
  input.addEventListener("blur", validarFormulario);
});

loginForm.addEventListener("submit", (e) => {
  e.preventDefault();
  if (
    campos.correo &&
    campos.contrasena &&
    campos.nombre &&
    campos.apellido_paterno &&
    campos.apellido_materno &&
    campos.telefono &&
    campos.boleta
  ) {
    loginForm.submit();
  } else {
    alert("Por favor, rellena el formulario correctamente.");
  }
});
