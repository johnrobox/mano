<div class="modal fade" id="ownAccountChangePasswrordModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
                CHANGE ACCOUNT PASSWORD
                <img id="changePassLoadingImage" style="height: 25px; width:25px;" src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="center-block">
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="common_error_display"></div>
                <?php 
                echo form_open('', 'id="update_password_form" class="update_password_form" method="post"');
                ?>
                <div class="form-group">
                    <?php echo form_label('Old Password', 'old_password'); ?>
                    <div class="text-red old_password_err"></div>
                    <?php
                    $old_password = array(
                        'type' => 'password',
                        'class' => 'form-control',
                        'name' => 'old_password',
                        'id' => 'old_password'
                    );
                    echo form_input($old_password);
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('New Password', 'new_password'); ?>
                    <div class="text-red new_password_err"></div>
                    <?php
                    $new_password = array(
                        'type' => 'password',
                        'class' => 'form-control',
                        'name' => 'new_password',
                        'id' => 'new_password'
                    );
                    echo form_input($new_password);
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Repeat New Password', 'repeat_new_password'); ?>
                    <div class="text-red repeat_new_password_err"></div>
                    <?php
                    $repeat_new_password = array(
                        'type' => 'password',
                        'class' => 'form-control',
                        'name' => 'repeat_new_password',
                        'id' => 'repeat_new_password'
                    );
                    echo form_input($repeat_new_password);
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
                    'id' => 'changePasswordSubmitButton',
                    'class' => 'btn btn-primary',
                    'content' => '<i class="glyphicon glyphicon-pencil"></i> Update'
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