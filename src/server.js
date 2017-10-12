var request = require("request");

vhsys_url = 'https://www.vhsys.com/Communication/WebService/'

var options = { method: 'POST',
  url: vhsys_url,
  headers: 
   {
     'cache-control': 'no-cache',
     'content-type': 'multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'
    },
  formData: 
   { TOKEN: 'AAGIjM2UDN0IbNUDbNXTDMyADc0BbN0Y7M',
     API: 'Pedidos',
     METODO: 'LISTARPED' } };

request(options, function (error, response, body) {
  if (error) throw new Error(error);

  console.log(body);
});
