const express = require('express');
const multer = require('multer');
const path = require('path');
const fs = require('fs');
const router = express.Router();

// Configuración de almacenamiento para el archivo (comprobante)
const storage = multer.diskStorage({
  destination: (req, file, cb) => {
    const dir = 'uploads/comprobantes';
    if (!fs.existsSync(dir)) fs.mkdirSync(dir, { recursive: true });
    cb(null, dir);
  },
  filename: (req, file, cb) => {
    const ext = path.extname(file.originalname);
    const filename = Date.now() + '-' + file.originalname.replace(/\s+/g, '_');
    cb(null, filename);
  }
});

const upload = multer({ storage });

// Simulador de base de datos
const reservas = [];

// Ruta para reservar un salón (POST /reservas)
router.post('/', upload.single('comprobante'), (req, res) => {
  const {
    salon_id,
    fecha_reserva,
    hora_inicio,
    hora_fin,
    numero_personas,
    tipo_evento,
    observaciones
  } = req.body;

  // Validación básica
  if (!salon_id || !fecha_reserva || !hora_inicio || !hora_fin || !numero_personas) {
    return res.status(400).json({ mensaje: 'Faltan campos obligatorios.' });
  }

  const nuevaReserva = {
    id: reservas.length + 1,
    salon_id,
    fecha_reserva,
    hora_inicio,
    hora_fin,
    numero_personas,
    tipo_evento,
    observaciones,
    comprobante: req.file ? req.file.filename : null
  };

  reservas.push(nuevaReserva);

  res.status(201).json({
    mensaje: 'Reserva creada exitosamente.',
    reserva: nuevaReserva
  });
});

module.exports = router;
