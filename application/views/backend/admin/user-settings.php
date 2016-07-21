
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Settings</h1>
                    <?php echo $this->session->flashdata('error'); ?>
                    <?php echo $this->session->flashdata('success'); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Account
                            <button id="changePasswordButton" class="btn btn-primary pull-right" data-toggle="modal">Change Password</button>
                        </div>
                        <div class="panel-body">
                            <?php echo form_open(base_url().'admin/admin-settings-exec'); ?>
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <?php
                                echo form_error('firstname', '<small class="text-red">', '</small>');
                                $firstname = array(
                                    'type' => 'text',
                                    'name' => 'firstname',
                                    'id' => 'firstname',
                                    'value' => $account[0]->user_firstname,
                                    'class' => 'form-control'
                                );
                                echo form_input($firstname);
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <?php
                                echo form_error('lastname', '<small class="text-red"', '</small>');
                                $lastname = array(
                                    'type' => 'text',
                                    'name' => 'lastname',
                                    'id' => 'lastname',
                                    'value' => $account[0]->user_lastname,
                                    'class' => 'form-control'
                                );
                                echo form_input($lastname);
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="username">Username</label>
                                <?php
                                echo form_error('username', '<small class="text-error">', '</small>');
                                $username = array(
                                    'type' => 'text',
                                    'name' => 'username',
                                    'id' => 'username',
                                    'value' => $account[0]->user_username,
                                    'class' => 'form-control'
                                );
                                echo form_input($username);
                                ?>
                            </div>
                            
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <?php
                                echo form_error('gender', '<br><small class="text-red">', '</small>');
                                $gender = array(
                                    '' => 'Select Gender',
                                    '1' => 'Male',
                                    '2' => 'Female'
                                );
                                echo form_dropdown('gender', $gender, $account[0]->user_gender, 'class="form-control" id="gender"');
                                ?>
                            </div>
                            
                            <?php 
                            $submit_button = array(
                                'type' => 'submit',
                                'class' => 'btn btn-primary',
                                'content' => '<span class="glyphicon glyphicon-pencil"></span> Add User'
                            );
                            echo form_button($submit_button);
                            echo form_close(); 
                            ?>
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