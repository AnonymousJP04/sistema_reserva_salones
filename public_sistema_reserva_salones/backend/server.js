const express = require('express');
const morgan = require('morgan');
const cors = require('cors');
const db = require('./db');
const authRoutes = require('./routes/auth');
const salonesRoutes = require('./routes/salones');  // Importa el router de salones
const authMiddleware = require('./middleware/auth');

const app = express();
const port = 3000;

// Middlewares básicos (se ejecutan en orden)
app.use(morgan('dev'));
app.use(cors());
app.use(express.json());

// Rutas públicas
app.use('/auth', authRoutes); // /auth/login y /auth/register NO requieren token
app.use('/api/salones', salonesRoutes);  // Monta la ruta para salones

// Ruta de prueba pública
app.get('/', (req, res) => {
  res.send('API Negocio - Servidor en funcionamiento');
});

// Manejo de errores
app.use((err, req, res, next) => {
  console.error(err.stack);
  res.status(500).json({ error: 'Error interno del servidor' });
});

app.listen(port, () => {
  console.log(`Servidor escuchando en http://localhost:${port}`);
});
