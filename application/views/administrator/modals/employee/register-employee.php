<div class="modal fade" id="registerEmployeeFormModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
                ADD EMPLOYEE 
                <img id="registerEmployeeLoadingImage" style="height: 25px; width:25px;" src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="center-block">
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="registerEmployeeCommonErrorDisplay"></div>
                <?php 
                echo form_open('', 'id="register_employee_form" class="register_employee_form" method="post"');
                ?>
                <div class="form-group">
                    <?php echo form_label('Firstname', 'employee_firstname'); ?>
                    <div class="text-red firstname_error"></div>
                    <?php
                    $employee_firstname = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'employee_firstname',
                        'id' => 'employee_firstname'
                    );
                    echo form_input($employee_firstname);
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Lastname', 'employee_lastname'); ?>
                    <div class="text-red lastname_error"></div>
                    <?php
                    $employee_lastname = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'employee_lastname',
                        'id' => 'employee_lastname'
                    );
                    echo form_input($employee_lastname);
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Address', 'employee_address'); ?>
                    <div class="text-red address_error"></div>
                    <?php
                    $employee_address = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'employee_address',
                        'id' => 'employee_address'
                    );
                    echo form_input($employee_address);
                    ?>
                </div>
                <!-- for gender -->
                <div class="form-group">
                    <?php echo form_label('Gender', 'employee_gender'); ?>
                    <div class="text-red gender_error"></div>
                    <?php
                    $employee_gender = array(
                        '' => 'Select Gender',
                        '1' => 'Male',
                        '2' => 'Female'
                    );
                    echo form_dropdown('employee_gender', $employee_gender, '', 'class="form-control" id="employee_gender"');
                    ?>
                </div>
                
                <?php
                $reset_button = array(
                    'type' => 'reset',
                    'id' => 'clear_button',
                    'class' => 'btn btn-default',
                    'content' => 'Clear Fields'
                );
                echo form_button($reset_button);
                
                $submit_button = array(
                    'id' => 'submitRegisterEmployeeButton',
                    'class' => 'btn btn-primary',
                    'content' => '<i class="glyphicon glyphicon-pencil"></i> Register'
                );
                echo form_button($submit_button);
                
                ?>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>