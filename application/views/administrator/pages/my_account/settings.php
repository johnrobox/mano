
<?php
$change_password = array(
    'class' => 'btn btn-primary pull-right',
    'id' => 'change_password',
    'content' => '<i class="glyphicon glyphicon-pencil"></i> Change Password'
);
echo form_button($change_password);
?>
<br><br>
<?php 
echo $this->session->flashdata('error');
echo $this->session->flashdata('success');
?>
<div class="panel panel-default">
    <div class="panel-heading">SETTINGS</div>
    <div class="panel-body">
        <?php echo form_open(base_url().'index.php/administrator/AccountController/updateExec'); ?>
        <div class="form-group">
            <?php
            echo form_label('Firstname', 'firstname');
            echo form_error('firstname', '<span class="text-red">', '</span>');
            $firstname_field = array(
                'type' => 'text',
                'name' => 'firstname',
                'id' => 'firstname',
                'class' => 'form-control',
                'value' => $account[0]->admin_firstname
            );
            echo form_input($firstname_field);
            ?>
        </div>
        <div class="form-group">
            <?php
            echo form_label('Lastname', 'lastname');
            echo form_error('lastname', '<span class="text-red">', '</span>');
            $lastname_field = array(
                'type' => 'text',
                'name' => 'lastname',
                'id' => 'lastname',
                'class' => 'form-control',
                'value' => $account[0]->admin_lastname
            );
            echo form_input($lastname_field);
            ?>
        </div>
        <div class="form-group">
            <?php
            echo form_label('Username', 'username');
            echo form_error('username', '<span class="text-red">', '</span>');
            $username_field = array(
                'type' => 'text',
                'name' => 'username',
                'id' => 'username',
                'class' => 'form-control',
                'value' => $account[0]->admin_username
            );
            echo form_input($username_field);
            ?>
        </div>
        <div class="form-group">
            <?php 
            echo form_label('Email', 'email');
            echo form_error('email', '<span class="text-red">', '</span>');
            $email_field = array(
                'type' => 'text',
                'name' => 'email',
                'id' => 'email',
                'class' => 'form-control',
                'value' => $account[0]->admin_email
            );
            echo form_input($email_field);
            ?>
        </div>
        <div class="form-group">
              <?php 
              echo form_label('Gender', 'gender');
              echo form_error('gender', '<span class="text-red">', '</span>');
              $gender = array(
                  '' => 'Select Gender',
                  '1' => 'Male',
                  '2' => 'Female'
              );
              echo form_dropdown('gender', $gender, $account[0]->admin_gender, array('id' => 'gender', 'class' => 'form-control'));
              ?>
          </div>
        
        <?php
          $add_button = array(
              'class' => 'btn btn-primary',
              'type' => 'submit',
              'content' => '<i class="glyphicon glyphicon-pencil"></i> Update'
          );
          echo form_button($add_button);
          ?>
        
        <?php echo form_close(); ?>
    </div>
    <div class="panel-footer"></div>
</div>