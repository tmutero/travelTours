<?php include ('auth.php');?>
    <!DOCTYPE html>
    <title>Travel Tours :Clients</title>
<?php include('header.php'); ?>
    <!-- .content -->


    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Clients</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Clients</li>
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
                            <h4 class="title"> List</h4>

                        </div>

                        <div class="content table-responsive table-full-width">


                            <table class="table table-hover">
                                <thead>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Contact Number</th>
                                <th>Date Created</th>

                                </thead>
                                <tbody>
                                <?php
                                include('include/conn.php');
                                $select = "select * from clients";
                                $run_select = mysqli_query($conn, $select);
                                while ($rows = mysqli_fetch_array($run_select)) {

                                    $name=$rows['name'];
                                    $email=$rows['email'];
                                    $created_at=$rows['created_at'];
                                  //  $lastname=$rows['lastname'];
                                    $contact=$rows['contact'];

                                    ?>
                                    <tr>
                                        <td><?php echo $name;?></td>

                                        <td><?php echo $email;?></td>
                                        <td><?php echo $contact;?></td>
                                        <td><?php echo $created_at;?></td>







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
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
<?php include('footer.php')?>