var fs = require('fs');

var settings = {
    environment: "development",
    local: true, // if local or server
    debug: true,
    port: '8080',
    ssl: {
        // key: fs.readFileSync('/etc/ssl/private/ssl.key'),
        // cert: fs.readFileSync('/etc/ssl/private/ssl.crt'),
        // ca: fs.readFileSync('/etc/ssl/private/ssl.ca')
    },
    redis: {
        host: 'localhost', // Will be changed to hosted
        port: '6379',
        keys: {
            master: 'logging',
            auth: 'auth',
            puchasing: 'puchasing',
            results: 'results',
            gateway_response: 'gateway_response'
        },
        key: {},
        expire: {
            puchasing: '1800000',
            results: '1800000',
            gateway_response: '1800000'
        }
    }
};

settings.api = 'https://' + (settings.local ? "local" : '') + '.playhugelottos.com';

settings.redis.key.auth = settings.redis.keys.master + ':' + settings.redis.keys.auth;
settings.redis.key.puchasing = settings.redis.keys.master + ':' + settings.redis.keys.puchasing;
settings.redis.key.results = settings.redis.keys.master + ':' + settings.redis.keys.results;
settings.redis.key.gateway_response = settings.redis.keys.master + ':' + settings.redis.keys.gateway_response;

module.exports = settings;
