// A Node.js server
var app = require('express')(); 
var server = require('http').Server(app);
var io = require('socket.io')(server); 
// Requiring the ioredis package
var redis = require('redis');
// A redis client

// Start the server at http://localhost:3000
server.listen(4000);

// Just to be sure it's working
console.log('Server started');