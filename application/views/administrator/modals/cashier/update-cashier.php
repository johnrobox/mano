<div class="modal fade" id="CashierUpdateModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
                <i class="glyphicon glyphicon-pencil"></i> EDIT CASHIER INFORMATION
                <br><br>
                <div class="updateCommonError alert alert-danger"></div>
                <img id="loadingImageUpdateCashier" src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="center-block loading-fixed-size">
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Firstname', 'cashier_firstname_update'); ?>
                                <div class="text-red firstname_error_update"></div>
                                <?php
                                $cashier_firstname = array(
                                    'type' => 'text',
                                    'name' => 'cashier_firstname_update',
                                    'id' => 'cashier_firstname_update',
                                    'class' => 'form-control'
                                );
                                echo form_input($cashier_firstname);
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size firstnameRefresh loading-margin-top"/>
                        </div>
                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Lastname', 'cashier_lastname_update');?>
                                <div class="text-red lastname_error_update"></div>
                                <?php 
                                $cashier_lastname = array(
                                    'type' => 'text',
                                    'name' => 'cashier_lastname_update',
                                    'id' => 'cashier_lastname_update',
                                    'class' => 'form-control'
                                );
                                echo form_input($cashier_lastname); 
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size lastnameRefresh loading-margin-top"/>
                        </div>
                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Username', 'cashier_username_update');?>
                                <div class="text-red username_error_update"></div>
                                <?php 
                                $cashier_username = array(
                                    'type' => 'text',
                                    'name' => 'cashier_username_update',
                                    'id' => 'cashier_username_update',
                                    'class' => 'form-control'
                                );
                                echo form_input($cashier_username); 
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size usernameRefresh loading-margin-top"/>
                        </div>
                        
                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Password', 'cashier_password_update');?>
                                <div class="text-red password_error_update"></div>
                                <?php 
                                $cashier_password = array(
                                    'type' => 'text',
                                    'name' => 'cashier_password_update',
                                    'id' => 'cashier_password_update',
                                    'class' => 'form-control'
                                );
                                echo form_input($cashier_password); 
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size passwordRefresh loading-margin-top"/>
                        </div>

                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Address', 'cashier_address_update');?>
                                <div class="text-red address_error_update"></div>
                                <?php 
                                $cashier_address = array(
                                    'type' => 'text',
                                    'name' => 'cashier_address_update',
                                    'id' => 'cashier_address_update',
                                    'class' => 'form-control'
                                );
                                echo form_input($cashier_address);
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size addressRefresh loading-margin-top" />
                        </div>
                        
                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Gender', 'cashier_gender_update'); ?>
                                <div class="text-red gender_error_update"></div>
                                <?php
                                $cashier_gender = array(
                                    '' => 'Select Gender',
                                    '1' => 'Male',
                                    '2' => 'Female'
                                );
                                echo form_dropdown('cashier_gender_update', $cashier_gender, '', 'class="form-control" id="cashier_gender_update"');
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size genderRefresh loading-margin-top"/>
                        </div>
                    </form>
                </div>


            </div>
            <div class="modal-footer">
                <?php 
                $refresh_button = array(
                    'class' => 'btn btn-success',
                    'id' => 'cashierUpdateRefreshBtn',
                    'value' => '',
                    'content' => '<i class="glyphicon glyphicon-refresh"></i> Refresh Data'
                );
                echo form_button($refresh_button);
                
                $update_button = array(
                    'class' => 'btn btn-primary',
                    'id' => 'cashierUpdateSubmitBtn',
                    'value' => '',
                    'content' => '<i class="glyphicon glyphicon-send"></i> Update'
                );
                echo form_button($update_button);
                ?>
            </div>
        </div>
    </div>
</div>