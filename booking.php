<?php include ('auth.php');?>
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
                                <th>Service Offered</th>
                                <th>Action</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


            </div>


        </div>
    </div>






    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
<?php include('footer.php')?>