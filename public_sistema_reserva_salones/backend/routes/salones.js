const express = require('express');
const router = express.Router();
const db = require('../db');

// GET /api/salones - Obtener todos los salones
router.get('/', async (req, res) => {
    try {
        const [rows] = await db.query('SELECT * FROM admin_salones ORDER BY nombre');
        res.json(rows);
    } catch (error) {
        console.error('Error al obtener salones:', error);
        res.status(500).json({ message: 'Error interno del servidor' });
    }
});

// GET /api/salones/:id - Obtener un salón específico
router.get('/:id', async (req, res) => {
    try {
        const { id } = req.params;
        const [rows] = await db.query('SELECT * FROM admin_salones WHERE id = ?', [id]);
        
        if (rows.length === 0) {
            return res.status(404).json({ message: 'Salón no encontrado' });
        }
        
        res.json(rows[0]);
    } catch (error) {
        console.error('Error al obtener salón:', error);
        res.status(500).json({ message: 'Error interno del servidor' });
    }
});

// POST /api/salones - Crear un nuevo salón
router.post('/', async (req, res) => {
    try {
        const { nombre, capacidad, ubicacion, descripcion, precio_por_hora } = req.body;
        
        if (!nombre || !capacidad || !ubicacion || !precio_por_hora) {
            return res.status(400).json({ message: 'Todos los campos requeridos deben estar presentes' });
        }
        
        const [result] = await db.query(
            'INSERT INTO admin_salones (nombre, capacidad, ubicacion, descripcion, precio_por_hora) VALUES (?, ?, ?, ?, ?)',
            [nombre, capacidad, ubicacion, descripcion, precio_por_hora]
        );
        
        res.status(201).json({ 
            message: 'Salón creado exitosamente',
            id: result.insertId
        });
    } catch (error) {
        console.error('Error al crear salón:', error);
        res.status(500).json({ message: 'Error interno del servidor' });
    }
});

// PUT /api/salones/:id - Actualizar un salón
router.put('/:id', async (req, res) => {
    try {
        const { id } = req.params;
        const { nombre, capacidad, ubicacion, descripcion, precio_por_hora } = req.body;
        
        const [result] = await db.query(
            'UPDATE admin_salones SET nombre = ?, capacidad = ?, ubicacion = ?, descripcion = ?, precio_por_hora = ? WHERE id = ?',
            [nombre, capacidad, ubicacion, descripcion, precio_por_hora, id]
        );
        
        if (result.affectedRows === 0) {
            return res.status(404).json({ message: 'Salón no encontrado' });
        }
        
        res.json({ message: 'Salón actualizado exitosamente' });
    } catch (error) {
        console.error('Error al actualizar salón:', error);
        res.status(500).json({ message: 'Error interno del servidor' });
    }
});

// DELETE /api/salones/:id - Eliminar un salón
router.delete('/:id', async (req, res) => {
    try {
        const { id } = req.params;
        
        const [result] = await db.query('DELETE FROM admin_salones WHERE id = ?', [id]);
        
        if (result.affectedRows === 0) {
            return res.status(404).json({ message: 'Salón no encontrado' });
        }
        
        res.json({ message: 'Salón eliminado exitosamente' });
    } catch (error) {
        console.error('Error al eliminar salón:', error);
        res.status(500).json({ message: 'Error interno del servidor' });
    }
});

module.exports = router;