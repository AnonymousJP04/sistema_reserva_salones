const express = require('express');
const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const router = express.Router();
const db = require('../db');

const SECRET_KEY = 'gestorsalones123';

// Registro de usuario
router.post('/register', async (req, res) => {
    try {
        const { nombre, apellido, email, telefono, nit, password } = req.body;
        
        // Validar que todos los campos requeridos estén presentes
        if (!nombre || !apellido || !email || !telefono || !nit || !password) {
            return res.status(400).json({ message: 'Todos los campos son requeridos' });
        }
        
        // Verificar si el usuario ya existe (por email, teléfono o nit)
        const [existingUsers] = await db.query(
            'SELECT * FROM pub_usuarios WHERE email = ? OR telefono = ? OR nit = ?', 
            [email, telefono, nit]
        );
        
        if (existingUsers.length > 0) {
            if (existingUsers.some(user => user.email === email)) {
                return res.status(400).json({ message: 'El email ya está registrado' });
            }
            if (existingUsers.some(user => user.telefono === telefono)) {
                return res.status(400).json({ message: 'El teléfono ya está registrado' });
            }
            if (existingUsers.some(user => user.nit === nit)) {
                return res.status(400).json({ message: 'El NIT ya está registrado' });
            }
        }

        // Encriptar la contraseña
        const hashedPassword = await bcrypt.hash(password, 10);
        
        // Insertar el nuevo usuario
        await db.query(
            'INSERT INTO pub_usuarios (nombre, apellido, email, telefono, nit, password) VALUES (?, ?, ?, ?, ?, ?)',
            [nombre, apellido, email, telefono, nit, hashedPassword]
        );
        
        res.json({ message: 'Usuario registrado exitosamente' });
    } catch (error) {
        console.error('Error en registro:', error);
        res.status(500).json({ message: 'Error interno del servidor' });
    }
});

// Login de usuario
router.post('/login', async (req, res) => {
    try {
        const { email, password } = req.body;
        
        if (!email || !password) {
            return res.status(400).json({ message: 'Email y contraseña son requeridos' });
        }
        
        const [rows] = await db.query('SELECT * FROM pub_usuarios WHERE email = ?', [email]);
        if (rows.length === 0) {
            return res.status(400).json({ message: 'Credenciales inválidas' });
        }

        const valido = await bcrypt.compare(password, rows[0].password);
        if (!valido) {
            return res.status(400).json({ message: 'Contraseña inválida' });
        }

        // Incluye el id y email en el token
        const token = jwt.sign({ 
            id: rows[0].id, 
            email: rows[0].email,
            nombre: rows[0].nombre,
            apellido: rows[0].apellido
        }, SECRET_KEY, { expiresIn: '2h' });

        res.json({ 
            token,
            user: {
                id: rows[0].id,
                nombre: rows[0].nombre,
                apellido: rows[0].apellido,
                email: rows[0].email
            }
        });
    } catch (error) {
        console.error('Error en login:', error);
        res.status(500).json({ message: 'Error interno del servidor' });
    }
});

module.exports = router;