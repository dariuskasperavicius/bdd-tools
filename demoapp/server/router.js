Router.route('/db/restart/:name?', function () {
  // NodeJS request object
  var request = this.request;

  // NodeJS  response object
  var response = this.response;

  console.log("Restarting:"+this.params.name);
  response.writeHead(200, {'Content-Type': 'text/html'});
  response.end('<html><body>Your request was restart ' + this.params.name + '</body></html>');
}, {where: 'server'});

/*
Router.route('/db/restart/:name?', { where: 'server' })
  .get(function () {
      console.log("Restarting:"+this.params.name);
      //this.response.writeHead(200, {'Content-Type': 'text/html'});
      //this.response.end('<html><body>Your request was a ' + request + '</body></html>');
      console.dir(this);
      return "ok";
    })
*/
