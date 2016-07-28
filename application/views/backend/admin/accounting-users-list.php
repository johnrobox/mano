
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Administrator list
                        </div>
                        <div class="panel-body">
                            <?php echo $this->session->flashdata('error'); ?>
                            <?php echo $this->session->flashdata('success'); ?>
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
                                    <th>Action</th>
                                </tr>
                            <?php foreach($all_admin as $row) { ?>
                                <tr>
                                    <td>
                                        <?php
                                        if (!empty($row->user_image)) {
                                            $profile_image = 'uploads/'.$row->user_image;
                                        } else if ($row->user_gender == 1) {
                                            $profile_image = 'default/male.jpg';
                                        } else {
                                            $profile_image = 'default/female.jpg';
                                        }
                                        ?>
                                        <img src="<?php echo base_url().'images/admin/'.$profile_image;?>"  style="width: 80px; height: 80px;">
                                    </td>
                                    <td><?php echo $row->user_firstname; ?></td>
                                    <td><?php echo $row->user_lastname; ?></td>
                                    <td><?php echo $row->user_username; ?></td>
                                    <td><?php echo ($row->user_gender == 1) ? 'Male' : 'Female'; ?> </td>
                                    <td><?php echo ($row->user_status == 1) ? 'Enable' : 'Disable'; ?></td>
                                    <td><?php echo $row->user_lastlogin; ?></td>
                                    <td><?php echo $row->user_lastlogout; ?></td>
                                    <td><?php echo $row->user_created; ?></td>
                                    <td><?php echo $row->user_modified; ?></td>
                                    <td>
                                        <button onclick="changeStatus(<?php echo $row->id. ', '.$row->user_status;?>, 'accounting')" class="btn btn-<?php echo ($row->user_status == 0) ? 'success' : 'warning';?>">
                                            <?php echo ($row->user_status == 0) ? 'Enable' : 'Disable'; ?>
                                        </button>
                                        <button onclick="deleteSomething(<?php echo $row->id;?>, 'accounting')"class="btn btn-danger">Delete</button>
                                    </td>
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