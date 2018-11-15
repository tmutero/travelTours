<?php
include('functions.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>

<!DOCTYPE html >
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <title>Locating Resort</title>
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>

<body>

<div id="map" height="460px" width="100%"></div>


<div class="container-fluid">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <strong>Resort Entry</strong> Form
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="">
                    <div class="form-group">
                        <label for="name" class=" form-control-label">Resort Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter resort name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="contact" class=" form-control-label">Contact Details</label>
                        <input type="number" id="contact" name="contact" placeholder="Enter Contact Details"
                               class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="city_id">City</label>
                        <select class="form-control" id="city_id" name="city_id">
                            <?php
                            include('include/conn.php');
                            $select = "SELECT  * FROM `city`";
                            $run_select = mysqli_query($conn, $select);

                            while ($rows = mysqli_fetch_array($run_select)) {
                                $id = $rows['id'];
                                $name = $rows['city'];
                                ?>

                                <option value=<?php echo $id; ?>><?php echo $name; ?>
                                </option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="amount" class=" form-control-label">Minimum Amount(Service)</label>
                        <input type="number" id="amount" name="amount" placeholder="Enter amount name"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="service_type">Service Type</label>
                        <select class="form-control" id="service_type">
                            <option>Select Option</option>
                            <option value="Game Reserves"> Game Reserves</option>
                            <option value="Hotel and Conference">Hotel and Conference</option>
                        </select>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm" onclick="saveData()">
                            <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <div class="col-lg-2">
    </div>

</div>


<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvwG3LyJWfecG0sQvezyNc0ZWZVmOPwjs&callback=initMap">
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script>
    var map;
    var marker;
    var infowindow;
    var messagewindow;

    var oxmlHttp;
    var oxmlHttpSend;

    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttpSend = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
        oxmlHttpSend = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(oxmlHttpSend == null) {
        alert("Browser does not support XML Http Request");
    }

    function initMap() {
        var harare = {lat: -17.823725, lng: 31.040007};
        map = new google.maps.Map(document.getElementById('map'), {
            center: harare,
            zoom: 13
        });

        infowindow = new google.maps.InfoWindow({
            content: document.getElementById('form')
        });

        messagewindow = new google.maps.InfoWindow({
            content: document.getElementById('message')
        });

        google.maps.event.addListener(map, 'click', function (event) {
            marker = new google.maps.Marker({
                position: event.latLng,
                map: map
            });


            google.maps.event.addListener(marker, 'click', function () {
                infowindow.open(map, marker);
            });
        });
    }

    function saveData() {

        var name = document.getElementById('name').value;
        var service_type = document.getElementById('service_type').value;
        var city_id = document.getElementById('city_id').value;
        var amount = document.getElementById('amount').value;
        var contact = document.getElementById('contact').value;
        var lat = marker.getPosition().lat();
        var lng = marker.getPosition().lng();

        var url = "resort_action.php";

      //  var url = 'save_resort.php?name=' + name + '&service_type=' + service_type +
        //    '&city_id=' + city_id + '&lat=' + lat + '&lng=' + lng + '&amount=' + amount + '&contact=' + contact;

//alert(url);
        $.post("resort_action.php", {
                name: name,
                service_type: service_type,
                city_id: city_id,
                lat: lat,
                lng: lng,
                amount: amount,
                contact: contact
            },

            function(data) {
               alert(data);
            });

//        url += '?name=' + name + '&service_type=' + service_type +'&city_id=' + city_id + '&lat=' + lat + '&lng=' + lng + '&amount=' + amount + '&contact=' + contact;
//alert(url);
//        oxmlHttpSend.open("GET",url,true);
//        oxmlHttpSend.send(null);

//        downloadUrl(url, function (data, responseCode) {
//
//            if (responseCode == 200 && data.length <= 1) {
//                infowindow.close();
//                messagewindow.open(map, marker);
//            }
//        });
//

    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request.responseText, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {
    }

</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCqZNUgpf1A0hbNiAg6A9HTAchLOs5O3EA&callback=initMap">
</script>
</body>
</html>