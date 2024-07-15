const express = require('express');
const app = express();
const path = require('path');
const { exec } = require('child_process');

// Configuración para servir archivos estáticos desde directorios específicos
app.use('/CSS', express.static(path.join(__dirname, 'CSS')));
app.use('/img', express.static(path.join(__dirname, 'img')));
app.use('/JS', express.static(path.join(__dirname, 'JS')));
app.use('/index', express.static(path.join(__dirname, 'index')));

// Ruta para servir el archivo panel.html
app.get('/', (req, res) => {
    res.sendFile(path.join(__dirname, 'panel.html'));
});

// Ruta para servir archivos PHP
app.get('/index.php', (req, res) => {
    exec('php -f ' + path.join(__dirname, 'index.php'), (error, stdout, stderr) => {
        if (error) {
            res.send(`Error ejecutando PHP: ${stderr}`);
        } else {
            res.send(stdout);
        }
    });
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Servidor corriendo en http://localhost:${PORT}`);
});
