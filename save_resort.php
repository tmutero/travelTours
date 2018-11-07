<?php
/**
 * Created by PhpStorm.
 * User: tmutero
 * Date: 11/6/18
 * Time: 1:42 PM
 */


include('include/conn.php');

if($_POST["name"]) {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $amount = $_POST['amount'];
    $city_id = $_POST['city_id'];
    $service_type = $_POST['service_type'];


    $query = "INSERT INTO `resorts`(`name`, `city_id`, `serviceType`, `longitude`, `latitude`, `contact`, `amount`)
 VALUES ('$name','$city_id','$service_type','$lng', '$lat','$contact', '$amount')";


    $result = mysqli_query($conn, $query);
    if ($result) {

        echo $query;
        echo "Location saved";
    }

    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
}

?>