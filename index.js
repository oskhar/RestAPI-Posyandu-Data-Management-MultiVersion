const express = require("express");

const app = express();

app.get("", (request, response) => {
  response.send("pong");
});

app.listen(3000, "localhost");
