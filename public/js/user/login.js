import { URL_BASE } from '../parametros.js';

async function login( data ) {
    const response = await fetch(URL_BASE + "user/signIn/", {
    method: "POST",
    headers: {
      Accept: "application/json",
    },
    body: data,
  });
  return response.json();
}

const form_login = document.getElementById( 'form_login' );
const email_error = document.getElementById( 'email_error' );

form_login.addEventListener( 'submit', async e => {
    e.preventDefault();
    const data = new FormData( form_login );
    const response = await login( data );
    if (response.message == 'ok') {
        window.location = URL_BASE + 'inicio/index/';
    }else {
        email_error.innerText = 'El usuario no esta registrado.';
        setTimeout(() => {
            email_error.innerText = '';
        }, 3000);
    }
} )