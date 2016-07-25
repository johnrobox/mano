
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Blank</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Administrator list
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Profile</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Username</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Last Login</th>
                                    <th>Last Logout</th>
                                    <th>Created</th>
                                    <th>Modified</th>
                                </tr>
                            <?php foreach($all_admin as $row) { ?>
                                <tr>
                                    <td><img src="<?php echo base_url();?>images/admin/uploads/<?php echo $row->user_image;?>"  style="width: 80px; height: 80px;"></td>
                                    <td><?php echo $row->user_firstname; ?></td>
                                    <td><?php echo $row->user_lastname; ?></td>
                                    <td><?php echo $row->user_username; ?></td>
                                    <td><?php echo ($row->user_gender == 1) ? 'Male' : 'Female'; ?> </td>
                                    <td><?php echo $row->user_status; ?></td>
                                    <td><?php echo $row->user_lastlogin; ?></td>
                                    <td><?php echo $row->user_lastlogout; ?></td>
                                    <td><?php echo $row->user_created; ?></td>
                                    <td><?php echo $row->user_modified; ?></td>
                                </tr>
                            <?php } ?>
                            </table>
                        </div>
                        <div class="panel-footer">
                            
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>