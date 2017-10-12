var request = require("request");

var options = { method: 'POST',
  url: 'https://www.vhsys.com/Communication/WebService/',
  headers: 
   { 'postman-token': '19da0b34-988b-d50d-829e-32f64f89375c',
     'cache-control': 'no-cache',
     'content-type': 'multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW' },
  formData: 
   { TOKEN: 'AAGIjM2UDN0IbNUDbNXTDMyADc0BbN0Y7M',
     API: 'Pedidos',
     METODO: 'LISTARPED' } };

request(options, function (error, response, body) {
  if (error) throw new Error(error);

  console.log(body);
});
