const express = require('express');
const router = express.Router();
const db = require('../db');

// Ruta para obtener todos los salones (sin autenticación, sin filtros)
router.get('/', async (req, res) => {
  try {
    const [salones] = await db.query('SELECT * FROM admin_salones WHERE archivado = 0');
    res.json(salones);
  } catch (error) {
    console.error('Error al obtener los salones:', error);
    res.status(500).json({ mensaje: 'Error al obtener los salones' });
  }
});

module.exports = router;
