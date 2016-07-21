
<div class="modal fade" id="UpdateProfile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Change Profile Picture
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-4 text-center">
                        <div class="alert alert-info text-center">
                            <img src="<?php echo base_url().'images/admin/uploads/'.$account[0]->user_image; ?>" id="output" class="img-responsive img-circle" style="height: 100px; width: 100px; border: 1px solid black"/> 
                        </div>
                    </div>
                    <?php
                    echo form_open('', array('id' => 'fileinfo', 'name' => 'fileinfo', 'onsubmit' => 'return submitForm()'));
                    ?>
                    <div class="col-xs-6">
                        <?php 
                        $for_profile = array(
                            'type' => 'file',
                            'name' => 'profile_image',
                            'id' => 'profile_image',
                            'accept' => 'image/*',
                            'onchange' => 'loadFile(event)',
                            'class' => 'form-control'
                        );
                        echo form_input($for_profile);
                        ?>
                        <div class="errorMessage" style="color: red"></div>
                        <br>
                        <img src="<?php echo base_url();?>images/admin/default/PLS WAIT LOGO.gif" class="img-responsive  center-block" id="imageLoading" style="display: none" >
                       
                    </div>
                    <?php 
                    echo form_close();
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <?php
                        $submit_button = array(
                            'class' => 'btn btn-primary',
                            'id' => 'update',
                            'content' => 'Update Profile'
                        );
                        echo form_button($submit_button);
                        ?>
                <?php
                    $cancel_button = array(
                        'class' => 'btn btn-default',
                        'content' => 'Cancel',
                        'data-dismiss' => 'modal'
                    );
                    echo form_button($cancel_button);
                ?>
            </div>
        </div>
    </div>
</div>