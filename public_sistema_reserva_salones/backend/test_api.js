const http = require('http');

function testAPI() {
    const options = {
        hostname: 'localhost',
        port: 3000,
        path: '/api/salones',
        method: 'GET'
    };

    const req = http.request(options, (res) => {
        let data = '';

        res.on('data', (chunk) => {
            data += chunk;
        });

        res.on('end', () => {
            console.log('Status Code:', res.statusCode);
            console.log('Response:', JSON.parse(data));
            console.log('\n¡API de salones funcionando correctamente!');
        });
    });

    req.on('error', (error) => {
        console.error('Error al conectar con la API:', error.message);
        console.log('Asegúrate de que el servidor esté ejecutándose con: node server.js');
    });

    req.end();
}

setTimeout(testAPI, 1000); // Esperar 1 segundo para que el servidor se inicie

