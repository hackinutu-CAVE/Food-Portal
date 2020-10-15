<!DOCTYPE html>
<html>
<head>
	<title>Receive</title>

	<style>
      #map {

        width: 90%;
        height: 600px;
        background-color: grey;
        margin: 0 auto;
      }
    </style>

    <script>
    	let map, infoWindow;

        function initMap() {
          map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -34.397, lng: 150.644 },
            zoom: 6,
          });
          infoWindow = new google.maps.InfoWindow();

          // Try HTML5 geolocation.
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
              (position) => {
                const pos = {
                  lat: position.coords.latitude,
                  lng: position.coords.longitude,
                };
                infoWindow.setPosition(pos);
                infoWindow.setContent("Your location");
                infoWindow.open(map);
                map.setCenter(pos);
              },
              () => {
                handleLocationError(true, infoWindow, map.getCenter());
              }
            );
          } 
          else {
            // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
          }

          // downloadUrl();
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
          infoWindow.setPosition(pos);
          infoWindow.setContent(
            browserHasGeolocation
              ? "Error: The Geolocation service failed."
              : "Error: Your browser doesn't support geolocation."
          );
          infoWindow.open(map);
        }

        // function downloadUrl("xml_generate.php",function(data) {
        //     var xml = data.responseXML;
        //     var markers = xml.documentElement.getElementsByTagName('marker');
        //     Array.prototype.forEach.call(markers, function(markerElem) {
        //         var mid = markerElem.getAttribute('mid');
        //         var food_name = markerElem.getAttribute('food_name');
        //         var donor_name = markerElem.getAttribute('donor_name');
        //         var address = markerElem.getAttribute('address');
        //         var point = new google.maps.LatLng(
        //             parseFloat(markerElem.getAttribute('lat')),
        //             parseFloat(markerElem.getAttribute('lng')));

        //         var infowincontent = document.createElement('div');
        //         var strong = document.createElement('strong');
        //         strong.textContent = name
        //         infowincontent.appendChild(strong);
        //         infowincontent.appendChild(document.createElement('br'));

        //         var text = document.createElement('text');
        //         text.textContent = address;
        //         infowincontent.appendChild(text);
        //         // var icon = customLabel[type] || {};
        //         var marker = new google.maps.Marker({
        //           map: map,
        //           position: point,
        //           label: mid
        //         });
        //         marker.addListener('click', function() {
        //           infoWindow.setContent(infowincontent);
        //           infoWindow.open(map, marker);
        //         });
        //     });
        // }
    </script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsVoY4zW3LEvh1FYV00kTm2LH71ArmzOs&callback=initMap"></script>
</head>
<body>
	<h3>Go to Home page :</h3>
	<input type="button" onclick="window.location='index.php'" class="Redirect" value="Home"/>
	<br><br><br>

	<h3>Google Maps</h3>
    <div id="map"></div>
    
    <?php
    error_reporting(0);
    require("phpsqlajax_dbinfo.php");

    function parseToXML($htmlStr)
    {
    $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
    }

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }

    // Select all the rows in the markers table
    try{
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = $conn->prepare("SELECT * FROM markers");
      $sql->execute();   
    }
    catch(PDOException $e){
      echo $e->getMessage();
    }

    echo '<table border="1" cellspacing="2" cellpadding="2"> 
          <tr> 
              <td> <font face="Arial">ID</font> </td> 
              <td> <font face="Arial">Food Name</font> </td> 
              <td> <font face="Arial">Donor Name</font> </td> 
              <td> <font face="Arial">Address</font> </td> 
              <td> <font face="Arial">Latitude</font> </td>
              <td> <font face="Arial">Longitude</font> </td> 
          </tr>';


    $ind=0;
    foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $row){
      $field1name = $row["mid"];
        $field2name = $row["food_name"];
        $field3name = $row["donor_name"];
        $field4name = $row["address"];
        $field5name = $row["lat"];
        $field6name = $row["lng"]; 

        echo '<tr> 
                  <td>'.$field1name.'</td> 
                  <td>'.$field2name.'</td> 
                  <td>'.$field3name.'</td> 
                  <td>'.$field4name.'</td> 
                  <td>'.$field5name.'</td>
                  <td>'.$field6name.'</td> 
              </tr>';
      $ind = $ind + 1;
    }
    ?>

    <form action="<?php echo $_SERVER["PHP_SELF"] ?>", method="POST">
        Enter ID of food you want to receive :<input type="text" name="foodid">
        <br><br>

        <button name="submit1">Submit2</button>
    </form>

    <?php
    if(isset($_POST["submit2"])) {
      $id = $_POST["foodid"];
      try{
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM markers WHERE mid='$id'";
        $conn->exec($sql);
      }
      catch(PDOException $e){
        echo $e->getMessage();
      }
      $conn = null;
    }
    
    ?>
</body>
</html>