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
	e.preventDefault();

	const terminos = document.getElementById('terminos');
	if (campos.boleta && campos.nombre && campos.apellido_paterno && campos.apellido_materno && campos.telefono) {
		//formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 2000);

		document.querySelectorAll('.formulario_correcto').forEach((icono) => {
			icono.classList.remove('formulario_correcto');
		});

	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		}, 2000);
	}
});