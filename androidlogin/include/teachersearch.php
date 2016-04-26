<?php


/*
* Following code will list all the products
*/

// array for JSON response

$response["tc"] = array();
// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

if (isset($_GET["college_id"])) {
$college_id = $_GET['college_id'];

// get a product from products table
$result = mysql_query("SELECT * FROM `teachers` WHERE college_id = $college_id");

$tc = array();
if (is_resource($result)) {      

    if (mysql_num_rows($result) > 0) {

   while($row = mysql_fetch_assoc($result)){
      $tc = array();
      $tc["id"] = $row["id"]; 
      $tc["name"] = $row["name"]; 
      array_push($response["tc"],$tc); 
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