<?php


/*
* Following code will list all the products
*/

// array for JSON response

$response["jo"] = array();
// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

if (isset($_GET["div_id"])) {
$div_id = $_GET['div_id'];

// get a product from products table
$result = mysql_query("SELECT name FROM `jonal` WHERE div_id = $div_id");

$jo = array();
if (is_resource($result)) {      

    if (mysql_num_rows($result) > 0) {

   while($row = mysql_fetch_assoc($result)){
      $jo = array();
      $jo["id"] = $row["id"]; 
      $jo["name"] = $row["name"]; 
      array_push($response["jo"],$jo); 
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