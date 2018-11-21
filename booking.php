<?php include('auth.php'); ?>
    <!DOCTYPE html>
    <title>Travel Tours :Resorts</title>
<?php include('header.php'); ?>
    <!-- .content -->


    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Bookings</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Bookings</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">

        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Bookings List</h4>

                        </div>

                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover">
                                <thead>
                                <th>Client Name</th>
                                <th>Resort Name</th>
                                <th>Date Booked</th>

                                </thead>
                                <tbody>
                                <?php
                                include('include/conn.php');
                                $select = "SELECT r.name as resortName,c.name as clientName,b.dateCreated as dateCreated FROM booking b JOIN resorts r JOIN clients c WHERE b.clientID=c.id AND b.resortID=r.id";
                                $run_select = mysqli_query($conn, $select);
                                while ($rows = mysqli_fetch_array($run_select)) {

                                    $resortName = $rows['resortName'];
                                    $clientName = $rows['clientName'];
                                    $dateCreated = $rows['dateCreated'];

                                    ?>
                                    <tr>
                                        <td><?php echo $resortName; ?></td>
                                        <td><?php echo $clientName; ?></td>
                                        <td><?php echo $dateCreated; ?></td>




                                    </tr>
                                    <?php
                                }

                                ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>
<?php include('footer.php') ?>