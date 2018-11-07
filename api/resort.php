<?php


require_once '../include/DB_Functions.php';
$db = new DB_Functions();
include "../include/conn.php";

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['resortName'])) {

    // receiving the post params
    $resortName = $_POST['resortName'];


    $select = "SELECT * FROM `resorts` s join city c ON s.city_id = c.id";
    $run_select = mysqli_query($conn, $select);
    $someArray = [];
    while ($row = mysqli_fetch_array($run_select)) {

        array_push($someArray, [
            'name' => $row['name'],
            'serviceType' => $row['serviceType'],
            'longitude' =>$row['longitude'],
            'latitude' =>$row['latitude'],
            'city' =>$row['city'],
            'contact' =>$row['contact'],
            'amount' =>$row['amount'],
            'image' =>$row['image'],
        ]);
    }


        $someJSON = json_encode($someArray);
        echo $someJSON;

}
//    // get the user by email and password
//   $resort=$db->getResort($resortName);
//    if ($resort != false) {
//        // use is found
//        $response["error"] = FALSE;
//        $response["resort"]["name"] = $resort["name"];
//        $response["resort"]["id"] = $resort["id"];
//
//        echo json_encode($response);
//    } else {
//        // user is not found with the credentials
//        $response["error"] = TRUE;
//        $response["error_msg"] = "Error searching resorts. Please try again!";
//        echo json_encode($response);
//    }
//} else {
//    // required post params is missing
//    $response["error"] = TRUE;
//    $response["error_msg"] = "Required parameters name is missing!";
//    echo json_encode($response);
//}
?>

