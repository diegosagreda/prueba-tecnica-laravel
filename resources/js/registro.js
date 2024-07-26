document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formRegistro');

    form.addEventListener('submit', (event)=> {
        event.preventDefault();
        const formData = new FormData(form);
        submitForm(formData);

    });

    function submitForm(formData) {
        fetch('/user', {
            method: 'POST',
            body: formData,
            headers: {
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(handleResponse)
        .then(mostrarMensajesExito)
        .catch(handleError);
    }

    function handleResponse(response) {
        if (!response.ok) {
            return response.json().then(data => {
                throw new Error(JSON.stringify(data)); // Lanza un error con los datos de la respuesta
            });
        }
        return response.json();
    }

    function mostrarMensajesExito(data) {
        clearErrors();
        const mensajeDiv = document.getElementById('mensaje');
        mensajeDiv.classList.add('success');
        mensajeDiv.innerHTML = '<p>Usuario Creado con éxito</p>';
        form.reset();
        setTimeout(() => {
            mensajeDiv.innerHTML = '';
            mensajeDiv.classList.remove('success');
        }, 5000);
    }

    function handleError(error) {
        clearErrors();
        const errorData = parseError(error);
        mostrarMensajesError(errorData.errors);
    }

    function clearErrors() {
        document.querySelectorAll('p[id^="error_"]').forEach(p => p.textContent = '');
        document.querySelectorAll('.input-error').forEach(input => input.classList.remove('input-error'));
    }

    function parseError(error) {
        let errorData;
        try {
            errorData = JSON.parse(error.message);
        } catch (e) {
            errorData = { message: 'Hubo un error desconocido' };
        }
        return errorData;
    }

    function mostrarMensajesError(errors) {
        if (errors) {
            Object.keys(errors).forEach(field => {
                let inputField = document.querySelector(`[name="${field}"]`);
                if(errors[field][0] === 'El campo confirmación de password no coincide.'){
                    inputField = document.querySelector('[name="password_confirmation"]');
                }
                if (inputField) {
                    inputField.classList.add('input-error');
                    let errorParagraph = document.getElementById(`error_${field}`);
                    if(errors[field][0] === 'El campo confirmación de password no coincide.'){
                        errorParagraph = document.getElementById('error_password_confirmation');
                    }
                    if (errorParagraph) {
                        errorParagraph.textContent = `* ${errors[field][0]}`;
                    }
                }
            });
        }
    }
});
