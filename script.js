// Obtener el formulario
var form = document.getElementById('altaForm');

// Agregar un evento de envío al formulario
form.addEventListener('submit', function(event) {
    event.preventDefault(); // Evitar el envío por defecto

    // Obtener los valores de los campos de entrada
    var nombre = form.elements['nombre'].value;
    var apellido = form.elements['apellido'].value;
    var email = form.elements['email'].value;

    // Validar los campos requeridos
    if (nombre.trim() === '') {
        alert('Por favor, ingresa un nombre válido.');
        return;
    }

    if (apellido.trim() === '') {
        alert('Por favor, ingresa un apellido válido.');
        return;
    }

    if (email.trim() === '') {
        alert('Por favor, ingresa un email válido.');
        return;
    }

    // Validar el formato del email
    if (!/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/.test(email)) {
        alert('Por favor, ingresa un email válido.');
        return;
    }

    // Realizar cualquier otra validación necesaria aquí

    // Enviar los datos al servidor o realizar cualquier otra acción
    // Puedes utilizar AJAX, Fetch o cualquier otro método aquí

    // Mostrar el aviso de éxito sin perder la alineación
    var successMessage = document.createElement('p');
    successMessage.textContent = 'Nuevo registro creado exitosamente';
    successMessage.classList.add('success-message');
    
    // Verificar si ya existe un mensaje de éxito
    var existingSuccessMessage = document.querySelector('.success-message');
    if (existingSuccessMessage) {
        existingSuccessMessage.remove(); // Eliminar el mensaje de éxito existente
    }
    
    // Agregar el mensaje de éxito
    form.appendChild(successMessage);

    // Restablecer el formulario después de un cierto tiempo
    setTimeout(function() {
        successMessage.remove(); // Eliminar el aviso de éxito
        form.reset(); // Restablecer el formulario
    }, 3000); // Tiempo en milisegundos para mostrar el aviso (3 segundos en este ejemplo)
});
