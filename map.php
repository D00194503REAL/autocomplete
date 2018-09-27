<!DOCTYPE html>
<html>
  <head>
    <title>Geocoding service</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      #map {
        height: 100%;
      }
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #other {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
        box-shadow: 0 0 100px rgba(0,0,0,10);
        border-radius: 50px;
      }
      
    </style>
  </head>
  <body>
      <a href='index.php'><div id='other'>Find other country</div></a>
      
      <!-- Creates map -->
    <div id="map"></div>
    <script>
      function initMap() {
          // geocoder to convert address to latitude and longtitude
          var geocoder = new google.maps.Geocoder();
          // address = coutry, county, town
          // we get them from form in index.php (POST method)
          // if statements checks if country, county, town is not empty
        var address = "<?php if (!empty($_POST["country"])) { echo $_POST["country"];} ?>, <?php if (!empty($_POST["county"])) { echo $_POST["county"]; } ?>, <?php if (!empty($_POST["town"])) { echo $_POST["town"]; } ?>";
          
          // creates map
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 10
        });
        

        // coverts address to latitude and longtitude and creates new map with latitude and longtitude of selected country, county, town
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: map,
              position: results[0].geometry.location
            });
            
            // check for errors
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }

      
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3GNUNqilg3CdYIedKxEY5zgCl4p7xp-4&callback=initMap">
    </script>
  </body>
</html>


