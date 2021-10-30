//khởi tạo server với modul là express
const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const { Server } = require("socket.io");
const io = new Server(server);
//in ra màn hình hello wordl
app.get('/roomchat', (req, res) => {
    res.sendFile(__dirname + '/index.html');
});
//theo dõi kết nối và mất kết nối 
io.on('connection', (socket) => {
    console.log('a user connected');
    //nếu mất kết nối thì sẽ hiển thị ra màn hình 
    socket.on('disconnect', () => {
        console.log('user disconnected');
    });
    socket.on('chat message', (msg) => {
        console.log('message: ' + msg);
        io.emit('chat message', msg);
    });
});

//chạy trên cổng 3000
server.listen(3000, () => {
    console.log('listening on *:3000');
});