<div class="modal fade" id="changeProfileModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-pencil"></i>
                CHANGE PROFILE PICTURE
                <img id="changeProfileImageLoading" style="height: 30px; width:30px;" src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="center-block">
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-4 text-center">
                        <div class="alert alert-info text-center">
                            <?php
                            if (empty($account[0]->admin_image)) {
                                if ($account[0]->admin_gender == 1) 
                                    $image_name = "male.png";
                                else if ($account[0]->admin_gender == 2)
                                    $image_name = "female.png";
                                else 
                                    $image_name = "not-set.png";
                                $image_link = "default/" . $image_name;
                            } else {
                                $image_link = "uploads/" . $account[0]->admin_image;
                            }
                            ?>
                            <img src="<?php echo base_url();?>images/administrator/admin_users/<?php echo $image_link; ?>" id="output" class="img-responsive img-circle" style="height: 100px; width: 100px; border: 1px solid black"/> 
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
                        <?php
                        $submit_button = array(
                            'class' => 'btn btn-primary',
                            'id' => 'update',
                            'content' => '<i class="glyphicon glyphicon-pencil"></i> Update Profile'
                        );
                        echo form_button($submit_button);
                        ?>
                    </div>
                    <?php 
                    echo form_close();
                    ?>
                </div>
                
                 
            </div>
            <div class="modal-footer">
                <?php
                    $cancel_button = array(
                        'class' => 'btn btn-default',
                        'content' => '<i class="glyphicon glyphicon-thumbs-down"></i> Cancel',
                        'data-dismiss' => 'modal'
                    );
                    echo form_button($cancel_button);
                ?>
            </div>
        </div>
    </div>
</div>