<div class="modal fade" id="registerCashierFormModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
                ADD EMPLOYEE 
                <img id="registerCashierLoadingImage" style="height: 25px; width:25px;" src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="center-block">
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="registerCashierCommonErrorDisplay"></div>
                <?php 
                echo form_open('', 'id="register_cashier_form" class="register_cashier_form" method="post"');
                ?>
                <div class="form-group">
                    <?php echo form_label('Firstname', 'cashier_firstname'); ?>
                    <div class="text-red firstname_error"></div>
                    <?php
                    $cashier_firstname = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'cashier_firstname',
                        'id' => 'cashier_firstname'
                    );
                    echo form_input($cashier_firstname);
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Lastname', 'cashier_lastname'); ?>
                    <div class="text-red lastname_error"></div>
                    <?php
                    $cashier_lastname = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'cashier_lastname',
                        'id' => 'cashier_lastname'
                    );
                    echo form_input($cashier_lastname);
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Username', 'cashier_username'); ?>
                    <div class="text-red username_error"></div>
                    <?php
                    $cashier_username = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'cashier_username',
                        'id' => 'cashier_username'
                    );
                    echo form_input($cashier_username);
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Address', 'cashier_address'); ?>
                    <div class="text-red address_error"></div>
                    <?php
                    $cashier_address = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'cashier_address',
                        'id' => 'cashier_address'
                    );
                    echo form_input($cashier_address);
                    ?>
                </div>
                <!-- for gender -->
                <div class="form-group">
                    <?php echo form_label('Gender', 'cashier_gender'); ?>
                    <div class="text-red gender_error"></div>
                    <?php
                    $cashier_gender = array(
                        '' => 'Select Gender',
                        '1' => 'Male',
                        '2' => 'Female'
                    );
                    echo form_dropdown('cashier_gender', $cashier_gender, '', 'class="form-control" id="cashier_gender"');
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
                    'id' => 'submitRegisterCashierButton',
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