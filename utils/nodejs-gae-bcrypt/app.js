'use strict';

var express = require('express');
var bcrypt = require('bcrypt');
var path = require('path');
var bodyParser = require('body-parser')

var app = express();

// app.use( bodyParser.json() ); // json encoded
//URL encoded
app.use(bodyParser.urlencoded({
  extended: true
}));

app.get('/', function (req, res) {
  var abs_path = path.resolve(__dirname+'/app.html');
  res.status(200)
  res.sendFile(abs_path);
});

app.get('/hash_password', function (req, res) {
  var abs_path = path.resolve(__dirname+'/hash_password.html');
  res.status(200)
  res.sendFile(abs_path);
});

app.post('/hash_password', function(req, res) {
  var hash_input = req.body.hash_input
  var hash_rounds = parseInt(req.body.hash_rounds)
  var hash_rounds = hash_rounds < 13 && hash_rounds > 0 ? hash_rounds : 1;

  var start_time = Math.floor(Date.now())
  var hash = bcrypt.hashSync(hash_input, bcrypt.genSaltSync(hash_rounds));
  var end_time = Math.floor(Date.now())
  var time_diff = (end_time - start_time)/1000

  res.status(200)
  res.json({
    'hash': hash,
    'time_taken_seconds': time_diff
  });
});

app.get('/check_password', function (req, res) {
  var abs_path = path.resolve(__dirname+'/check_password.html');
  res.status(200)
  res.sendFile(abs_path);
});

app.post('/check_password', function(req, res) {
  var password_plaintext = req.body.password_plaintext
  var bcrypt_hash = req.body.bcrypt_hash

  var start_time = Math.floor(Date.now())
  var hashed_password = bcrypt.hashSync(password_plaintext, bcrypt_hash);
  var end_time = Math.floor(Date.now())
  var time_diff = (end_time - start_time)/1000

  if (hashed_password == bcrypt_hash) {
    var match = true
  } else {
    var match = false
  }

  res.status(200)
  res.json({
    'match': match,
    'time_taken_seconds': time_diff
  });
});

// Start the server
var server = app.listen(process.env.PORT || '3000', function () {
  console.log('App listening on port %s', server.address().port);
  console.log('Press Ctrl+C to quit.');
});
