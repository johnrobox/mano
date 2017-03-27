
<?php
echo $this->session->flashdata('error');
echo $this->session->flashdata('success');
?>
<div class="panel panel-default">
    <div class="panel-heading">
        Register
    </div>
    <div class="panel-body">
        <?php echo form_open(base_url().'index.php/administrator/AdminUserController/registerExec'); ?>

        <!-- for firstname -->
        <div class="form-group">
            <label for="firstname">Firstname</label>
            <?php
            echo form_error('firstname', '<br><span class="text-red">', '</span>');
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
            echo form_error('lastname', '<br><span class="text-red">', '</span>');
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
            echo form_error('username', '<br><span class="text-red">', '</span>');
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
            echo form_error('password', '<br><span class="text-red">', '</span>');
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
            echo form_error('password_conf', '<br><span class="text-red">', '</span>');
            $admin_password_conf = array(
                'type' => 'password',
                'name' => 'password_conf',
                'id' => 'password_conf',
                'class' => 'form-control'
            );
            echo form_input($admin_password_conf);
            ?>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <?php
            echo form_error('email', '<br><span class="text-red">', '</span>');
            $admin_email = array(
                'type' => 'text',
                'name' => 'email',
                'id' => 'email',
                'value' => set_value('email'),
                'class' => 'form-control'
            );
            echo form_input($admin_email);
            ?>
        </div>

        <!-- for gender -->
        <div class="form-group">
            <label for="gender">Gender</label>
            <?php
            echo form_error('gender', '<br><span class="text-red">', '</span>');
            $admin_gender = array(
                '' => 'Select Gender',
                '1' => 'Male',
                '2' => 'Female'
            );
            echo form_dropdown('gender', $admin_gender, '', 'class="form-control" id="gender"');
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
