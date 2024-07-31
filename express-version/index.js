const express = require("express");
const cors = require("cors");

const app = express();
app.use(cors());

var port = process.env.PORT || 3000;

app.get("/", (request, response) => {
  var info = {
    string_value: "stack overflow",
    number_value: 8476,
  };
  response.json(info);
});

app.listen(port, () => {
  console.log("Server berjalan pada port: " + port);
});
