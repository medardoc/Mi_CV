<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario y validar
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $email = htmlspecialchars(trim($_POST['email']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    // Configuración del correo
    $to = "tu_correo@example.com"; // Cambia esto a tu dirección de correo electrónico
    $subject = "Nuevo mensaje de contacto de $nombre";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Contenido del correo
    $email_message = "<html><body>";
    $email_message .= "<h2>Mensaje de Contacto</h2>";
    $email_message .= "<p><strong>Nombre:</strong> $nombre</p>";
    $email_message .= "<p><strong>Email:</strong> $email</p>";
    $email_message .= "<p><strong>Mensaje:</strong><br>$mensaje</p>";
    $email_message .= "</body></html>";

    // Enviar el correo
    if (mail($to, $subject, $email_message, $headers)) {
        echo "<p>Gracias, $nombre. Tu mensaje ha sido enviado.</p>";
    } else {
        echo "<p>Hubo un error al enviar tu mensaje. Por favor, inténtalo de nuevo más tarde.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Medardo Carpio</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="content">
        <h1>Contacto</h1>
        <form action="contacto.php" method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea>
            <br>
            <button type="submit">Enviar</button>
        </form>
    </div>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
