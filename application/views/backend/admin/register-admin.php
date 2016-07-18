
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Blank</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Register
                        </div>
                        <div class="panel-body">
                            <?php echo form_open(base_url().'admin/register-admin-exec'); ?>
                            
                            <!-- for firstname -->
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <?php
                                echo form_error('firstname', '<small class="text-red">', '</small>');
                                $admin_firstname = array(
                                    'type' => 'text',
                                    'name' => 'firstname',
                                    'id' => 'firstname',
                                    'value' => set_value('firstname'),
                                    'class' => 'form-control'
                                );
                                echo form_input($admin_firstname);
                                ?>
                            </div>
                            
                            <!-- for lastname -->
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <?php
                                echo form_error('lastname', '<small class="text-red">', '</small>');
                                $admin_lastname = array(
                                    'type' => 'text',
                                    'name' => 'lastname',
                                    'id' => 'lastname',
                                    'value' => set_value('lastname'),
                                    'class' => 'form-control'
                                );
                                echo form_input($admin_lastname);
                                ?>
                            </div>
                            
                            <!-- for email -->
                            <div class="form-group">
                                <label for="username">Username</label>
                                <?php
                                echo form_error('username', '<small class="text-red">', '</small>');
                                $admin_username = array(
                                    'type' => 'text',
                                    'name' => 'username',
                                    'id' => 'username',
                                    'value' => set_value('username'),
                                    'class' => 'form-control'
                                );
                                echo form_input($admin_username);
                                ?>
                            </div>
                            
                            <!-- for password -->
                            <div class="form-group">
                                <label for="password">Password</label>
                                <?php
                                echo form_error('password', '<small class="text-red">', '</small>');
                                $admin_password = array(
                                    'type' => 'password',
                                    'name' => 'password',
                                    'id' => 'password',
                                    'class' => 'form-control'
                                );
                                echo form_input($admin_password);
                                ?>
                            </div>
                            
                            <!-- for confirm password -->
                            <div class="form-group">
                                <label for="password_conf">Confirm Password</label>
                                <?php 
                                echo form_error('password_conf', '<small class="text-red">', '</small>');
                                $admin_password_conf = array(
                                    'type' => 'password',
                                    'name' => 'password_conf',
                                    'id' => 'password_conf',
                                    'class' => 'form-control'
                                );
                                echo form_input($admin_password_conf);
                                ?>
                            </div>
                            
                            <!-- for gender -->
                            <div class="form-group">
                                <?php
                                echo form_error('gender', '<small class="text-red">', '</small>');
                                $admin_gender = array(
                                    '' => 'Select Gender',
                                    '1' => 'Male',
                                    '2' => 'Female'
                                );
                                echo form_dropdown('gender', $admin_gender, '', 'class="form-control"');
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