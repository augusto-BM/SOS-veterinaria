const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const btn_enviar = document.getElementById('enviar');

const expresiones = {
	dni_adm: /^[\d]{1,3}\.?[\d]{3,3}\.?[\d]{3,3}$/, // 6 a 9 digitos.
	nombre_adm: /^[a-zA-ZÀ-ÿ\s]{3,40}$/, // Letras y espacios, pueden llevar acentos.
	apellido_adm: /^[a-zA-ZÀ-ÿ\s]{3,50}$/, // Letras y espacios, pueden llevar acentos.
	direccion_adm: /^[a-zA-Z0-9\ \-\_]{4,16}$/, // Letras, numeros, espacios, guion y guion_bajo
	telefono_adm: /^\d{7,14}$/, // 7 a 14 numeros.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	password: /^.{3,15}$/ // 4 a 15 digitos.
}

const campos = {
	dni_adm: false,
	nombre_adm: false,
	apellido_adm: false,
	direccion_adm: false,
	telefono_adm: false, 
	correo: false,
	password: false
	
}

const validarFormulario = (e) => {
	switch (e.target.id) {
		case "dni_adm":
			validarCampo(expresiones.dni_adm, e.target, 'dni_adm');
		break;
		case "nombre_adm":
			validarCampo(expresiones.nombre_adm, e.target, 'nombre_adm');
		break;
		case "apellido_adm":
			validarCampo(expresiones.apellido_adm, e.target, 'apellido_adm');
		break;
		case "direccion_adm":
			validarCampo(expresiones.direccion_adm, e.target, 'direccion_adm');
		break;
		case "telefono_adm":
			validarCampo(expresiones.telefono_adm, e.target, 'telefono_adm');
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
	if(campos.correo && campos.nombre_adm && campos.apellido_adm && campos.direccion_adm && campos.telefono_adm && campos.dni_adm && campos.password /* && terminos.checked */ ){
		/* formulario.reset(); */
		/* btn_enviar.setAttribute("disabled","false"); */
		document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
		/* document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo'); */
		/* setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		}); */
	}else if(campos.password){
		document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
	} else {
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
		/* btn_enviar.setAttribute("disabled","false") */
	}
});