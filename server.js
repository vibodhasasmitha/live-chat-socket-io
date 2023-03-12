// initialize express server
var express = require("express");
var app = express();

// create http server from express instance
var http = require("http").createServer(app);

// include socket IO
var socketIO = require("socket.io")(http, {
	cors: {
		origin: ["http://localhost"]
	}
});

// start the HTTP server at port 3000
http.listen(process.env.PORT || 3000, function () {
	console.log("Server started running...");

	socketIO.on("connection", function (socket) {

		socket.on("msgSend", function (u_id) {
			socketIO.emit("msgSend", u_id);
		});

	});
	
});