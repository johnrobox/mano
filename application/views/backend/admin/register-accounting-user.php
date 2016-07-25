
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Register Accounting User</h1>
                    <?php
                    echo $this->session->flashdata('error');
                    echo $this->session->flashdata('success');
                    ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Register
                        </div>
                        <div class="panel-body">
                            <?php echo form_open(base_url().'admin/register-accounting-user-exec'); ?>
                            
                            <!-- for firstname -->
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <?php
                                echo form_error('firstname', '<br><small class="text-red">', '</small>');
                                $accounting_firstname = array(
                                    'type' => 'text',
                                    'name' => 'firstname',
                                    'id' => 'firstname',
                                    'value' => set_value('firstname'),
                                    'class' => 'form-control'
                                );
                                echo form_input($accounting_firstname);
                                ?>
                            </div>
                            
                            <!-- for lastname -->
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <?php
                                echo form_error('lastname', '<br><small class="text-red">', '</small>');
                                $accounting_lastname = array(
                                    'type' => 'text',
                                    'name' => 'lastname',
                                    'id' => 'lastname',
                                    'value' => set_value('lastname'),
                                    'class' => 'form-control'
                                );
                                echo form_input($accounting_lastname);
                                ?>
                            </div>
                            
                            <!-- for email -->
                            <div class="form-group">
                                <label for="username">Username</label>
                                <?php
                                echo form_error('username', '<br><small class="text-red">', '</small>');
                                $accounting_username = array(
                                    'type' => 'text',
                                    'name' => 'username',
                                    'id' => 'username',
                                    'value' => set_value('username'),
                                    'class' => 'form-control'
                                );
                                echo form_input($accounting_username);
                                ?>
                            </div>
                            
                            <!-- for password -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <?php
                                echo form_error('password', '<br><small class="text-red">', '</small>');
                                $accounting_password = array(
                                    'type' => 'password',
                                    'name' => 'password',
                                    'id' => 'password',
                                    'class' => 'form-control'
                                );
                                echo form_input($accounting_password);
                                ?>
                            </div>
                            
                            <!-- for confirm password -->
                            <div class="form-group">
                                <label for="password_conf">Confirm Password</label>
                                <?php 
                                echo form_error('password_conf', '<br><small class="text-red">', '</small>');
                                $accounting_password_conf = array(
                                    'type' => 'password',
                                    'name' => 'password_conf',
                                    'id' => 'password_conf',
                                    'class' => 'form-control'
                                );
                                echo form_input($accounting_password_conf);
                                ?>
                            </div>
                            
                            <!-- for gender -->
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <?php
                                echo form_error('gender', '<br><small class="text-red">', '</small>');
                                $accounting_gender = array(
                                    '' => 'Select Gender',
                                    '1' => 'Male',
                                    '2' => 'Female'
                                );
                                echo form_dropdown('gender', $accounting_gender, '', 'class="form-control" id="gender"');
                                ?>
                            </div>
                            
                            <?php 
                            $submit_button = array(
                                'type' => 'submit',
                                'class' => 'btn btn-primary',
                                'content' => '<span class="glyphicon glyphicon-plus"></span> Add User'
                            );
                            echo form_button($submit_button);
                            
                            $reset_button = array(
                                'type' => 'reset',
                                'class' => 'btn btn-default',
                                'content' => '<span class="glyphicon glyphicon-refresh"></span> Clear'
                            );
                            echo form_button($reset_button);
                            ?>
                            
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