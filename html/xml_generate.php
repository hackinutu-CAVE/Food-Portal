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


// header("Content-type: text/xml");


// Start XML file, echo parent node

echo htmlspecialchars("<?xml version='1.0' ?>")."<br>";
echo htmlspecialchars('<markers>')."<br>";
$ind=0;
// Iterate through the rows, printing XML nodes for each
foreach ($sql->fetchAll(PDO::FETCH_ASSOC) as $row){
  // Add to XML document node
  echo htmlspecialchars('<marker ')." ";
  echo 'mid="' . $row['mid'] . '" '." ";
  echo 'food_name="' . parseToXML($row['food_name']) . '" '." ";
  echo 'donor_name="' . parseToXML($row['donor_name']) . '" '." ";
  echo 'address="' . parseToXML($row['address']) . '" '." ";
  echo 'lat="' . $row['lat'] . '" '." ";
  echo 'lng="' . $row['lng'] . '" '." ";
  echo htmlspecialchars('/>')."<br>";
  $ind = $ind + 1;
}

// End XML file
echo htmlspecialchars('</markers>')."<br>";

?>