const btnSend = document.querySelector('#btn-send');
const email = document.querySelector('#email');
const password = document.querySelector('#password');
const confirmPassword = document.querySelector('#confirm-password');

btnSend.setAttribute('disabled', 'true');

email.addEventListener('change', validateForm);
email.addEventListener('keyup', validateForm);
password.addEventListener('change', validateForm);
confirmPassword.addEventListener('change', validateForm);
password.addEventListener('keyup', validateForm);
confirmPassword.addEventListener('keyup', validateForm);

function validateForm(){

    if(email.value.length > 12){

        email.classList.remove('is-invalid');
        email.classList.add('is-valid');

    }else{
        email.classList.remove('is-valid');
        email.classList.add('is-invalid');
    }

    if (confirmPassword.value.length > 4) {
        if (password.value === confirmPassword.value ) {

            password.classList.remove('is-invalid');
            confirmPassword.classList.remove('is-invalid');

            password.classList.add('is-valid');
            confirmPassword.classList.add('is-valid');

            btnSend.removeAttribute('disabled');
        }else{
            password.classList.add('is-invalid');
            confirmPassword.classList.add('is-invalid');

            btnSend.setAttribute('disabled', 'true');

        }
    }
}
