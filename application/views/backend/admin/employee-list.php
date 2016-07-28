
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List</h1>
                    <?php echo $this->session->flashdata('error'); ?>
                    <?php echo $this->session->flashdata('success'); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">List of Employees</div>
                        <div class="panel-body">
                            <table class="table table-bordered table-hover">
                                <tr>
                                    <th></th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Birthdate</th>
                                    <th>Date Employed</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <?php
                                foreach($employees as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <?php
                                        $profile_image = ($row->employee_gender == 1) ? 'default/male.jpg' : 'default/female.jpg';
                                        ?>
                                        <img src="<?php echo base_url().'images/admin/'.$profile_image;?>"  style="width: 80px; height: 80px;">
                                    </td>
                                    <td>
                                        <?php echo $row->employee_firstname; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->employee_lastname; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->employee_address; ?>
                                    </td>
                                    <td>
                                        <?php echo ($row->employee_gender == 1) ? 'Male' : 'Female'; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->employee_birthdate; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->employee_date_employed;?>
                                    </td>
                                    <td>
                                        <?php echo ($row->employee_status == 1) ? 'Active' : 'None';?>
                                    </td>
                                    <td>
                                        <button onclick="changeStatus(<?php echo $row->id. ', '.$row->employee_status;?>, 'employee')" class="btn btn-<?php echo ($row->employee_status == 0) ? 'success' : 'warning';?>">
                                            <?php echo ($row->employee_status == 0) ? 'Enable' : 'Disable'; ?>
                                        </button>
                                        <button onclick="deleteSomething(<?php echo $row->id;?>, 'employee')"class="btn btn-danger">Delete</button>
                                        <button onclick="updateEmployee(<?php echo $row->id;?>)" class="btn btn-primary">Update</button>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                        <div class="panel-footer"></div>
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