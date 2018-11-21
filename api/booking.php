<?php


require_once '../include/DB_Functions.php';
$db = new DB_Functions();
include "../include/conn.php";

$response = array("error" => FALSE);
$someArray = [];

if (isset($_POST['resortID'])) {

    $resort_id= $_POST['resortID'];
    $client_id=$_POST['clientID'];

    $select = "INSERT INTO `booking`(`clientID`, `resortID`) VALUES ('$client_id','$resort_id')";
    $run_select = mysqli_query($conn, $select);
    echo json_encode($response);
}


if(isset($_POST['clientID'])){

    $clientID=$_POST['clientID'];

    $select = "SELECT * FROM booking JOIN resorts WHERE clientID='$clientID' AND booking.resortID=resorts.id";
    $run_select = mysqli_query($conn, $select);

    while ($row = mysqli_fetch_array($run_select)) {

        array_push($someArray, [
            'resortID' =>$row['resortID'],
            'name' => $row['name'],
            'serviceType' => $row['serviceType'],
            'dateCreated'=>$row['dateCreated'],

        ]);
    }


    $someJSON = json_encode($someArray);
    echo $someJSON;







}

?>

