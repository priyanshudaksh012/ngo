var unique = require('uniq');

var data = [1, 2, 2, 3, 4, 5, 5, 5, 6];
var mediasoupClient = require('mediasoup-client');

console.log(unique(data));