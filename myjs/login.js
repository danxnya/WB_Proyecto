const loginForm = document.getElementById("loginForm");
const inputs = document.querySelectorAll("#loginForm input");

const expresiones = {
  correo: /^[a-zA-Z0-9_.+-]+@(alumno\.ipn\.mx|ipn\.mx)$/,
  contrasena: /^.{4,12}$/, // 4 a 12 digitos.
};

const campos = {
  correo: false,
  contrasena: false,
};

const validarFormulario = (e) => {
  switch (e.target.name) {
    case "correo":
      validarCampo(expresiones.correo, e.target, "correo");
      break;
    case "contrasena":
      validarCampo(expresiones.contrasena, e.target, "contrasena");
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
  if (campos.correo && campos.contrasena) {
    loginForm.submit();
  } else {
    alert("Por favor, rellena el formulario correctamente.");
  }
});
