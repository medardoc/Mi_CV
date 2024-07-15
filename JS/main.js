// Puedes agregar scripts personalizados aquí
console.log('JavaScript funcionando correctamente');

// JavaScript para controlar el slider
let slideIndex = 0;
showSlides();

function showSlides() {
    const slides = document.querySelectorAll('.slide');
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1;
    }
    slides[slideIndex - 1].style.display = 'block';
    setTimeout(showSlides, 3000); // Cambiar imagen cada 3 segundos
}

// Inicializar EmailJS con tu User ID
(function(){
    emailjs.init('service_u2ucdmo'); // Reemplaza 'YOUR_USER_ID' con tu User ID de EmailJS
})();

document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    const templateParams = {
        from_name: name,
        from_email: email,
        message: message
    };

    emailjs.send('service_u2ucdmo', 'service_u2ucdmo', templateParams) // Reemplaza 'YOUR_TEMPLATE_ID' con el ID de tu plantilla
        .then(function(response) {
            console.log('SUCCESS!', response.status, response.text);
            alert('Mensaje enviado exitosamente');
            window.location.href = 'http://localhost:3000'; // Redirige al panel
        }, function(error) {
            console.log('FAILED...', error);
            alert('Error al enviar el mensaje');
        });
});
