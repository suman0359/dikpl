<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['challan_date']) && isset($_POST['memo_no']) && isset($_POST['transfer_to']) && isset($_POST['transfer_from_div']) && isset($_POST['to_jonal']) && isset($_POST['college_id']) && isset($_POST['teacher_id'])) {
 
    $challan_date = $_POST['challan_date'];
    $memo_no = $_POST['memo_no'];
    $transfer_to = $_POST['transfer_to'];
    $transfer_from_div = $_POST['transfer_from_div'];
    $to_jonal = $_POST['to_jonal'];
    $college_id = $_POST['college_id'];
    $teacher_id = $_POST['teacher_id'];
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO transfer(transfer_time,challan_date,memo_no,transfer_to,transfer_from_div,to_jonal,college_id,teacher_id) VALUES(now(),'$challan_date', '$memo_no', '$transfer_to' ,'$transfer_from_div' ,'$to_jonal',' $college_id',' $teacher_id')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
        $response["message"] = "Product successfully created.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>