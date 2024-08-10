const express = require('express');
const mysql = require('mysql');
const app = express();
const port = 3000;

// Conexión a la base de datos
const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '1d0ntw4nn4kn0w',
    database: 'login'
});

db.connect((err) => {
    if (err) {
        console.error('Conexión fallida: ' + err.stack);
        return;
    }
    console.log('Conectado a la base de datos.');
});

app.get('/archivos', (req, res) => {
    const sql = 'SELECT id, nombre_archivo FROM archivos';
    db.query(sql, (err, results) => {
        if (err) {
            res.status(500).json({ success: false, message: 'Error en la consulta' });
            return;
        }
        res.json({ success: true, data: results });
    });
});

app.listen(port, () => {
    console.log(`Servidor escuchando en http://localhost:${port}`);
});
