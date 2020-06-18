import { URL_BASE } from '../parametros.js';

async function register( data ) {
    const response = await fetch(URL_BASE + "user/signUp/", {
    method: "POST",
    headers: {
      Accept: "application/json",
    },
    body: data,
  });
  return response.json();
}

const form_register = document.getElementById( 'form_register' );
const tipo_documento = document.getElementById( 'tipo_documento' );
const password = document.getElementById( 'password' );
const password_confirm = document.getElementById( 'password_confirm' );
const email_error = document.getElementById( 'email_error' );
const password_error = document.getElementById( 'password_error' );
const tipo_documento_error = document.getElementById( 'tipo_documento_error' );

form_register.addEventListener( 'submit', async e => {
    e.preventDefault();
    if( tipo_documento.value == 'null' ){
        tipo_documento_error.innerText = 'Selecciona un tipo de documento.'
        setTimeout(() => {
            tipo_documento_error.innerText = '';
        }, 3000);
    }
    if (password.value == password_confirm.value) {
        const data = new FormData( form_register );
        const response = await register( data );
        if ( response.message == 'user-exist' ) {
            email_error.innerText = 'El usuario ya se encuentra registrado.';
            setTimeout(() => {
                email_error.innerText = '';
            }, 3000);
        }else if (response.message == 'ok') {
            window.location = URL_BASE + 'inicio/index/';
        }else{

        }
    }else {
        password_error.innerText = 'Las contraseñas no coinciden.';
        password_confirm.value = '';
        setTimeout(() => {
            password_error.innerText = '';
        }, 3000);
    }
});