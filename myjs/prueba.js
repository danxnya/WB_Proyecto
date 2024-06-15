const boleta = document.getElementById('formulario_boleta')
const nombre = document.getElementById('formulario_nombre')
const apellido_paterno = document.getElementById('formulario_apellido_paterno')
const apellido_materno = document.getElementById('formulario_apellido_materno')
const telefono = document.getElementById('telefono')

form.addEventListener("submit", e => {
    e.preventDefault()
    let send = false
    if (boleta.value.length != 10) {
        send = true
    }
    if (send == true) {
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		}, 2000);
    } else {
        $Datos = $("#form").serialize();
        var Datos = $("#form").serialize();
        $.ajax({
            url: '/php/login.php',
            data: $Datos,
            type: 'post'
        })
    }
    return false
})