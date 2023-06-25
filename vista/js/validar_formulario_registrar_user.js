const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const btn_enviar = document.getElementById('enviar');

const expresiones = {
	dni_cliente: /^[\d]{1,3}\.?[\d]{3,3}\.?[\d]{3,3}$/, // 6 a 9 digitos.
	nombre_cliente: /^[a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras y espacios, pueden llevar acentos.
	apellido_cliente: /^[a-zA-ZÀ-ÿ\s]{3,50}$/, // Letras y espacios, pueden llevar acentos.
	direccion_cliente: /^[a-zA-Z0-9\ \-\_]{4,16}$/, // Letras, numeros, espacios, guion y guion_bajo
	telefono_cliente: /^\d{7,14}$/, // 7 a 14 numeros.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	password: /^.{3,15}$/ // 3 a 15 digitos.
	
}

const campos = {
	dni_cliente: false,
	nombre_cliente: false,
	apellido_cliente: false,
	direccion_cliente: false,
	telefono_cliente: false, 
	correo: false,
	password: false
	
}

const validarFormulario = (e) => {
	switch (e.target.id) {
		case "dni_cliente":
			validarCampo(expresiones.dni_cliente, e.target, 'dni_cliente');
		break;
		case "nombre_cliente":
			validarCampo(expresiones.nombre_cliente, e.target, 'nombre_cliente');
		break;
		case "apellido_cliente":
			validarCampo(expresiones.apellido_cliente, e.target, 'apellido_cliente');
		break;
		case "direccion_cliente":
			validarCampo(expresiones.direccion_cliente, e.target, 'direccion_cliente');
		break;
		case "telefono_cliente":
			validarCampo(expresiones.telefono_cliente, e.target, 'telefono_cliente');
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;
		case "password":
			validarCampo(expresiones.password, e.target, 'password');
			validarPassword2();
		break;
		case "cpassword":
			validarPassword2();
		break;


	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('cpassword');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('keyup', (e) => {
	/* e.preventDefault(); */

	/* const terminos = document.getElementById('terminos'); */
	if(campos.correo && campos.nombre_cliente && campos.apellido_cliente && campos.direccion_cliente && campos.telefono_cliente && campos.dni_cliente && campos.password /* && terminos.checked  */){
		/* formulario.reset(); */
		/* btn_enviar.setAttribute("disabled","false"); */
		document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		/* document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		}); */
	}else if(campos.password){
		document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
	}
	 else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		/* btn_enviar.setAttribute("disabled","false") */
	}
});