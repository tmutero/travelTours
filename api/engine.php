<?php


require_once '../include/DB_Functions.php';
$db = new DB_Functions();
include "../include/conn.php";

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['resortName'])) {

    // receiving the post params
    $resortName = $_POST['resortName'];
    $preferedService=$_POST['preferedService'];
    $preferedCity=$_POST['preferedCity'];

    $latitudeFrom=$_POST['latitude'];
    $longitudeFrom=$_POST['longitude'];


    $select = "SELECT *, s.id as resortID  FROM `resorts` s join city c ON s.city_id = c.id 
and s.serviceType='$preferedService' and c.city='$preferedCity'";
    $run_select = mysqli_query($conn, $select);
    $someArray = [];
    while ($row = mysqli_fetch_array($run_select)) {

        $longitudeTo=$row['longitude'];
        $latitudeTo=$row['latitude'];

        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $distance = ($miles * 1.609344);
        $dis = round($distance, 3);

        array_push($someArray, [
            'resortID' =>$row['resortID'],
            'name' => $row['name'],
            'serviceType' => $row['serviceType'],
            'longitude' =>$row['longitude'],
            'latitude' =>$row['latitude'],
            'city' =>$row['city'],
            'contact' =>$row['contact'],
            'amount' =>$row['amount'],
            'imageString' =>$row['image'],
            'distance'=>$dis,
        ]);
    }


    $someJSON = json_encode($someArray);
    echo $someJSON;

}

/*
 *
 *
 * SELECT *,s.id as resortID, (((acos(sin(($latitudeFrom*pi()/180))
* sin((latitude*pi()/180))+
                 cos(($latitudeFrom*pi()/180)) *
                 cos((latitude*pi()/180)) * cos((($longitudeFrom - longitude)
                 *pi()/180))))*180/pi())*60*1.1515*1.609344) as distance
FROM resorts s WHERE s.serviceType='$preferedService' and c.city='$preferedCity' ORDER BY distance
 */
?>

