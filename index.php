<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi CV - Medardo Carpio</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <div class="content">
        <h1>Bienvenido a mi CV</h1>
        <p>Este es un breve resumen de mi carrera y experiencia.</p>

        <!-- Formulario de contacto -->
        <h2>Contacto</h2>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = htmlspecialchars($_POST['nombre']);
                $email = htmlspecialchars($_POST['email']);
                $mensaje = htmlspecialchars($_POST['mensaje']);
                
                if (!empty($nombre) && !empty($email) && !empty($mensaje)) {
                    // Lógica para procesar el formulario, como enviar un correo
                    echo "<p>Gracias, $nombre. Tu mensaje ha sido enviado.</p>";
                } else {
                    echo "<p>Por favor, rellena todos los campos.</p>";
                }
            }
        ?>
        <form action="index.php" method="POST">
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

    <script src="JS/main.js"></script>
</body>
</html>
