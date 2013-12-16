<?php include_once("home.html"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Skynet Phone Demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->

    <script src="js/skynet.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <!-- // <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script> -->
    <script>
      var skynetConfig = {
        "uuid": "f1b7fe90-653b-11e3-b2eb-91cf874fce76",
        "token": "bcvssgwk8conipb9qpddzeffo2mx6r"
      }
      function skynetNotReady() {
        console.log('UUID/token not authorized');
      };          
      function skynetReady() {

        $("button").removeAttr("disabled");
      
        // Reset light to off
        skynet.emit('message', {
          "devices": "0d3a53a0-2a0b-11e3-b09c-ff4de847b2cc",
          "message": {
          "red":"off"
        }}, function(data){
          console.log(data);
        });     

        skynet.on('message', function(data){
          // console.log('message received');
          console.log(data);
          if(data.red == "on"){
            $("#led-state").html("ON");
          } else if(data.red == "off") {
            $("#led-state").html("OFF");
          }

        });

      };   

      $( document ).ready(function() {

        $('#button-on').on('click', function() {

          $("#led-state").html("ON");
          skynet.emit('message', {
            "devices": "0d3a53a0-2a0b-11e3-b09c-ff4de847b2cc",
            "message": {
            "red":"on"
          }}, function(data){
            console.log(data);
          });            

        });

        $('#button-off').on('click', function() {

          $("#led-state").html("OFF");
          skynet.emit('message', {
            "devices": "0d3a53a0-2a0b-11e3-b09c-ff4de847b2cc",
            "message": {
            "red":"off"
          }}, function(data){
            console.log(data);
          });     

        });


      });


    </script>
  </head>
  <body class="jumbotron">
    <div>
  
      <div><center><img src="images/icons/bulb.svg" alt="" /></center></div>

      <center>

        <h1 class="hero-unit" style="">Skynet</h1>
        <h2>Turn on/off Arduino LED</h2>
        <h2><div id="led-state">OFF</div></h2>

        <div class="btn-group">
          <button id="button-on" type="button" class="btn btn-lg btn-success" disabled><span class="glyphicon glyphicon-plus-sign"></span></button>
          <button id="button-off" type="button" class="btn btn-lg btn-danger" disabled><span class="glyphicon glyphicon-minus-sign"></span></button>
        </div>

      </center>


    </div><!-- /.container -->


    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>

  </body>
</html>
