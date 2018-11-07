<?php include ('auth.php');?>
    <!DOCTYPE html>
    <title>Travel Tours :Resorts</title>
    <?php include('header.php'); ?>
    <!-- .content -->


    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Resorts</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Resorts</li>
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
                                <h4 class="title">Resorts List</h4>

                            </div>

                            <div class="content table-responsive table-full-width">



                                <div>
                                    <a href="addResorts.php" onClick="return popup(this, 'notes')">
                                        <i class="pe-7s-map-marker"></i>
                                        <button type="button" class="btn btn-info btn-sm">
                                            New Resort
                                        </button>
                                    </a>
                                </div>



                                <script TYPE="text/javascript">
                                    function popup(mylink, windowname) {
                                        if (!window.focus) return true;
                                        var href;
                                        if (typeof(mylink) == 'string')
                                            href = mylink;
                                        else href = mylink.href;
                                        window.open(href, windowname, 'width=800,height=400,scrollbars=yes');
                                        return false;
                                    }
                                </script>
                                <table class="table table-hover">
                                    <thead>
                                    <th>Resort Name</th>
                                    <th>City</th>
                                    <th>Contact</th>
                                    <th>Service Type</th>
                                    <th>Minimum Amount</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include('include/conn.php');
                                    $select = "select * from resorts r JOIN city c ON r.city_id=c.id";
                                    $run_select = mysqli_query($conn, $select);
                                    while ($rows = mysqli_fetch_array($run_select)) {
                                        $name=$rows['name'];
                                        $serviceType=$rows['serviceType'];
                                        $contact=$rows['contact'];
                                        $city=$rows['city'];
                                        $amount=$rows['amount'];
                                        ?>
                                        <tr>


                                            <td><?php echo $name;?></td>
                                            <td><?php echo $city;?></td>
                                            <td><?php echo $contact;?></td>
                                            <td><?php echo $serviceType;?></td>
                                            <td><?php echo $amount;?></td>


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