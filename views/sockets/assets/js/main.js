const title = document.getElementById("Title");
// Crea una nueva conexión.
const socket = new WebSocket('ws://localhost:80/mvc-phpv7/sockets');

// Abre la conexión
socket.addEventListener('open', function (event) {
    socket.send('Hello Server!');
});

// Escucha por mensajes
socket.addEventListener('message', function (event) {
    console.log('Message from server', event.data);
});