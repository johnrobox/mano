
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $this->session->flashdata('error'); ?>
                    <?php echo $this->session->flashdata('success'); ?>
                    <h1 class="page-header">Register Employee</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">Register</div>
                        <div class="panel-body">
                            <?php echo form_open(); ?>
                            <!-- for firstname -->
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <?php
                                $employee_firstname = array(
                                    'type' => 'text',
                                    'name' => 'firstname',
                                    'id' => 'firstname',
                                    'class' => 'form-control',
                                    'value' => set_value('firstname')
                                );
                                echo form_input($employee_firstname);
                                ?>
                            </div>
                            
                            <!-- for lastname -->
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <?php
                                $employee_lastname = array(
                                    'type' => 'text',
                                    'name' => 'lastname',
                                    'id' => 'lastname',
                                    'class' => 'form-control',
                                    'value' => set_value('lastname')
                                );
                                echo form_input($employee_lastname);
                                ?>
                            </div>
                            
                            <!-- for address -->
                            <div class="form-group">
                                <label for="address">Address</label>
                                <?php
                                $employee_address = array(
                                    'type' => 'text',
                                    'name' => 'address',
                                    'id' => 'address',
                                    'class' => 'form-control',
                                    'value' => set_value('address')
                                );
                                echo form_input($employee_address);
                                ?>
                            </div>
                            
                            <!-- for gender -->
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <?php
                                echo form_error('gender', '<br><small class="text-red">', '</small>');
                                $employee_gender = array(
                                    '' => 'Select Gender',
                                    '1' => 'Male',
                                    '2' => 'Female'
                                );
                                echo form_dropdown('gender', $employee_gender, '', 'class="form-control" id="gender"');
                                ?>
                            </div>
                            
                            <?php echo form_close(); ?>
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