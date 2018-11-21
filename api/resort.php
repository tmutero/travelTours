<?php


require_once '../include/DB_Functions.php';
$db = new DB_Functions();
include "../include/conn.php";

// json response array
//$response = array("error" => FALSE);

if (isset($_POST['resortName'])) {

    // receiving the post params
    $resortName = $_POST['resortName'];

    $latitudeFrom=floatval($_POST['latitude']);
    $longitudeFrom=doubleval($_POST['longitude']);


    $select = "SELECT *,s.id as resortID, (((acos(sin(($latitudeFrom*pi()/180)) 
* sin((latitude*pi()/180))+
                 cos(($latitudeFrom*pi()/180)) * 
                 cos((latitude*pi()/180)) * cos((($longitudeFrom - longitude)
                 *pi()/180))))*180/pi())*60*1.1515*1.609344) as distance
FROM resorts s WHERE s.name='$resortName' ORDER BY distance";
    $run_select = mysqli_query($conn, $select);
    $someArray = [];
    while ($row = mysqli_fetch_array($run_select)) {

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
            'distance'=>round($row['distance'],3),
        ]);
    }


        $someJSON = json_encode($someArray);
        echo $someJSON;

}


/*
 *
 * SELECT *,(((acos(sin((-17.812611951*pi()/180)) * sin((latitude*pi()/180))+
                 cos((-17.812611951*pi()/180)) * cos((latitude*pi()/180)) * cos(((31.051508312- longitude)*pi()/180))))*180/pi())*60*1.1515*1.609344) as distance
FROM resorts ORDER BY distance

 */
?>

