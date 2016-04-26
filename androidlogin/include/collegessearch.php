<?php


/*
* Following code will list all the products
*/

// array for JSON response

$response["co"] = array();
// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

if (isset($_GET["jonal_id"])) {
$jonal_id = $_GET['jonal_id'];

// get a product from products table
$result = mysql_query("SELECT * FROM `college` WHERE jonal_id = $jonal_id");

$co = array();
if (is_resource($result)) {      

    if (mysql_num_rows($result) > 0) {

   while($row = mysql_fetch_assoc($result)){
      $co = array();
      $co["id"] = $row["id"]; 
      $co["name"] = $row["name"]; 
      array_push($response["co"],$co); 
      //echo $row["name"];
      //$th = $row["name"];
      //$th["name"] = $row["name"];       
    }

   //array_push($response["th"],$th);

        // success
    $response["success"] = 1;

   echo json_encode($response);

    } else {
        // no product found
        $response["success"] = 0;
        $response["message"] = "No product found";

        // echo no product JSON
        echo json_encode($response);
    }
} else {
    // no product found
    $response["success"] = 0;
    $response["message"] = "No product found";

    // echo no users JSON
    echo json_encode($response);
}
} else {
$response["success"] = 0;
$response["message"] = "Required field(s) is missing";

// echoing JSON response
echo json_encode($response);
}