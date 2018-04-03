<?php
//ini_set("display_errors", "1");
//error_reporting(E_ALL);

include('index.php');

include("geolocationConnection.php");

include('beerDBConnection.php');

?>
<!DOCTYPE html>
<html>
  <head>
      <title>Simple Map</title>
      <meta name="viewport" content="initial-scale=1.0">
      <meta charset="utf-8">
      <!--<script type="text/javascript" src="js/googleMaps.js"></script>-->

      <link href="css/styles.css" rel="stylesheet" type="text/css">
  </head>
  <body>
  <h1> "<?php echo $count; ?>" found in <?php echo $formatted_address; ?> </h1>

    <div id="map"></div>



  <script>

      function loadMap() {

          var marker;

          var JSONBeerObject = JSON.parse('<?= $var ?>');
          var size = JSON.parse('<?= $j ?>');

          console.log(size);
          console.log(JSONBeerObject);


          //Get the coordinates from the city entered by the use
          var center_lat = parseFloat("<?php echo $centered_lat?>");
          var center_lng = parseFloat("<?php echo $centered_lng?>");

          //store the values from the user input
          var center = {lat:center_lat, lng: center_lng};

          //center the map
          var map = new google.maps.Map(document.getElementById('map'), {
              zoom: 11,
              center: center
          });

          for (var i = 0; i < size; i++){

              var objLat = JSONBeerObject[i].lat;
              console.log(objLat);
              var objLng = JSONBeerObject[i].lng;
              console.log(objLng);

              var location = {lat: objLat, lng: objLng};

              marker = new google.maps.Marker({
                  position: location,
                  map: map
              });

          }
      }
  </script>

  </body>

  <script  async defer
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3LHKpXFdv0jxbaf-eSC-J6hiU13Yjq7U&callback=loadMap">
  </script>

</html>
