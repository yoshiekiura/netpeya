var settings = require('./settings.js'),
        request = require('request'),
        http = require('http'),
        app = http.createServer(),
        io = require('socket.io').listen(app),
        redis = require("redis"),
        redisClient = redis.createClient(settings.redis),
        redisSubscriber = redis.createClient(settings.redis);

app.listen(settings.port);

if (settings.debug) {
    //redisClient.monitor();
    // redisClient.on("monitor", function (time, args, raw_reply) {
    //     if (args.indexOf('ping') && args.indexOf('info') && args.indexOf('set') && args.indexOf('client')) {
    //         console.log(args);
    //     }
    // });

    if (settings.local) {
        process.env.NODE_TLS_REJECT_UNAUTHORIZED = '0';
    }
} else {
    var methods = ["log", "debug", "warn", "info"];
    for (var i = 0; i < methods.length; i++) {
        console[methods[i]] = function () {};
    }
}

console.log('connected');

// TODO: Use socket.io-redis to allow socket.io connections to be stored
// there instead of memory. This is good for scaling the node server.
var ioRedis = require('socket.io-redis');
io.adapter(ioRedis(settings.redis));

var notification_socket = io.of('/');

notification_socket.on('connection', function (socket) {

    notification_socket.emit('notification_recieved', 'Hello Client!');

    socket.on('notification_sent', function (payload) {
        notification_socket.emit('notification_recieved', payload);
    });
});