<?php include('auth.php'); ?>
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
                                <th>Image</th>
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
                                $select = "select *,r.id as id from resorts r JOIN city c ON r.city_id=c.id";
                                $run_select = mysqli_query($conn, $select);
                                while ($rows = mysqli_fetch_array($run_select)) {
                                    $name = $rows['name'];
                                    $serviceType = $rows['serviceType'];
                                    $contact = $rows['contact'];
                                    $city = $rows['city'];
                                    $amount = $rows['amount'];
                                    $id = $rows['id'];
                                    ?>
                                    <tr>

                                        <td><img src="uploads/<?php echo $rows["image"]; ?>" width="50" height="50"/>
                                        </td>

                                        <td><?php echo $name; ?></td>
                                        <td><?php echo $city; ?></td>
                                        <td><?php echo $contact; ?></td>
                                        <td><?php echo $serviceType; ?></td>
                                        <td><?php echo $amount; ?></td>
                                        <td>
                                        <td>
                                            <a href="#edit<?php echo $rows['id']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a> ||
                                            <a href="#del<?php echo $rows['id']; ?>" data-toggle="modal" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>

                                        </td>
                                        <?php require('resort_modal.php'); ?>



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
    <div class="modal fade" id="edit<?php echo $rows['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Edit</h4></center>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-check"></span> Save</button>
                </div>

            </div>
        </div>
    </div>

<script src="jquery-1.12.3.min.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).on('click', '.update', function () {
            var resort_id = $(this).attr("id");
            var btn_action = 'fetch_single';
            alert(btn_action);

            $.ajax({
                url: "resort_action.php",
                method: "POST",
                data:{resort_id:resort_id, btn_action:btn_action},
                dataType: "json",
                success: function (data) {
                    $('#productModal').modal('show');
                }

            })
        });
    </script>
<?php include('footer.php') ?>