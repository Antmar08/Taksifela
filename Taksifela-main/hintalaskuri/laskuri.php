// Source - https://stackoverflow.com/a/13145135
// Posted by roshan thapa
// Retrieved 2026-03-05, License - CC BY-SA 3.0

    <?php
    session_start();
    $rate = 2;
    $extra = 50;
    $fix = 65;
    $above = 110;
    $next=55;
    $min=3;
    $cons = 4;
    //}
    ?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Taksi Fela hintalaskuri</title>
    <style type="text/css">
    html {
        height: 100%
    }
    body {
        height: 100%;
        margin: 0px;
        padding: 0px;
        font-family:tahoma;
        font-size:8pt;
    }
    #total {
        font-size:large;
        text-align:center;
        font-family:Georgia, “Times New Roman”, Times, serif;
        color:#990000;
        margin:5px 0 10px 0;
        font-size:12px;
        width:374px;
    }
    input {
        margin:5px 0px;
        font-family:tahoma;
        font-size:8pt;
    }
    </style>
    <!-- Google Maps API v3 now requires a key.  Replace YOUR_API_KEY with a valid key
         (https://console.cloud.google.com/apis/credentials).  Sensor parameter is deprecated. -->
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnj2BixNs6qi9uIVzKzunjYtUQyC0u3gw&libraries=places&region=FI&callback=initialize">
    </script>
    <!--
        * Be sure to replace YOUR_API_KEY with a real key.
        * Enable Maps JavaScript API in the Cloud console and attach a billing
          account (there is a free usage tier).
        * You can optionally restrict the key to '''HTTP referrers''' and set
          application restrictions to the Maps JavaScript API; restricting the
          key to Finland will prevent use from other countries.
    -->

    <script type="text/javascript">
        //<![CDATA[
          var map = null;
          var directionDisplay;
          var directionsService;

          function initialize() {
            directionsDisplay = new google.maps.DirectionsRenderer();
            directionsService = new google.maps.DirectionsService();

            // centre the map on Helsinki, Finland
            var Finland = new google.maps.LatLng(60.1699,24.9384);

            var mapOptions = {  
                        center              : Finland,
                        zoom                : 6,
                        minZoom             : 3,
                        streetViewControl   : false,
                        mapTypeId           : google.maps.MapTypeId.ROADMAP,
                        zoomControlOptions  : {style:google.maps.ZoomControlStyle.MEDIUM}
                    };


            map = new google.maps.Map(document.getElementById('map_canvas'),
                mapOptions);

             //Find From location    
        var options = { componentRestrictions: { country: 'FI' } };

        var fromText = document.getElementById('start');
        var fromAuto = new google.maps.places.Autocomplete(fromText, options);
        fromAuto.bindTo('bounds', map);
        //Find To location
        var toText = document.getElementById('end');
        var toAuto = new google.maps.places.Autocomplete(toText, options);
        toAuto.bindTo('bounds', map);
        //  
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById('directions-panel'));

            /*var control = document.getElementById('control');
            control.style.display = 'block';
            map.controls[google.maps.ControlPosition.TOP].push(control);*/
          }

          function calcRoute() {
            var start = document.getElementById('start').value;
            var end = document.getElementById('end').value;
            var request = {
              origin: start,
              destination: end,
              travelMode: google.maps.DirectionsTravelMode.DRIVING
            };
            directionsService.route(request, function(response, status) {
              if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                computeTotalDistance(response);
              }
            });
          }
          function computeTotalDistance(result) {
          var total = 0;
          var myroute = result.routes[0];
          for (i = 0; i < myroute.legs.length; i++) {
            total += myroute.legs[i].distance.value;
          }
          total = total / 1000;
          /*Start Calculating Distance fare - use inclusive comparisons for clarity*/
              var cost;
              if (total <= 10) {
                  cost = <?php echo $fix; ?>;
              } else if (total <= 20) {
                  cost = (total * <?php echo $rate; ?>) + <?php echo $extra; ?>;
              } else if (total <= 30) {
                  cost = (total * <?php echo $rate; ?>) + <?php echo $next; ?>;
              } else if (total <= 50) {
                  cost = ((total - 30) * <?php echo $cons; ?>) + <?php echo $above; ?>;
              } else {
                  cost = ((total - 50) * <?php echo $min; ?>) + 130;
              }

              var fare = cost * 0.11 + cost;
              var fare = Math.round(fare*100)/100;
          /*Distance Fair Calculation Ends*/

          document.getElementById("total").innerHTML = "Matkan pituus = " + total + " km ja hinta =" + fare + "€";
          }

        // the original `auto()` function was not used and contained syntax errors.
    // autocomplete is created in initialize().
    // Initialization is triggered by the script `callback=initialize` parameter,
    // so the addDomListener call is no longer necessary and has been removed.

        </script>
    </head>
    <body onLoad="initialize()">
    <table width="380px" border="2" cellpadding="0" cellspacing="0" bordercolor="#FF9F0F" style="border-collapse:collapse">
      <tr>
        <td bgcolor="#FFFF99" style="padding:5px;">
        <table width="375px" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><div id="map_canvas" style="width: 374px; height: 300px; border: solid 1px #336699"></div></td>
            </tr>
            <tr>
              <td><div id="form" style="width:374px; text-align:center; border: solid 1px #336699; background:#d1e1e4;">
                  Lähtöosoite:
                    <input type="text" id="start" size="60px" name="start" placeholder="Lisää lähtöosoite">
                    <br />
                    Kohdeosoite:
                    <input size="60px" type="text" id="end" name="end" placeholder="Lisää kohdeosoite ">
                    <input type="button" value="Calculate" onClick="calcRoute();">
                 <div id="total"></div>
                 </div></td>
            </tr>
          </table>
          </td>
      </tr>
    </table>
    </body>
    </html>
