<div class="modal fade" id="EmployeeUpdateModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
                <i class="glyphicon glyphicon-pencil"></i> EDIT EMPLOYEE INFORMATION
                <br><br>
                <div class="updateCommonError alert alert-danger"></div>
                <img id="loadingImageUpdateEmpoloyee" src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="center-block loading-fixed-size">
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Firstname', 'employee_firstname_update'); ?>
                                <div class="text-red firstname_error_update"></div>
                                <?php
                                $employee_firstname = array(
                                    'type' => 'text',
                                    'name' => 'employee_firstname_update',
                                    'id' => 'employee_firstname_update',
                                    'class' => 'form-control'
                                );
                                echo form_input($employee_firstname);
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size firstnameRefresh loading-margin-top"/>
                        </div>
                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Lastname', 'employee_lastname_update');?>
                                <div class="text-red lastname_error_update"></div>
                                <?php 
                                $employee_lastname = array(
                                    'type' => 'text',
                                    'name' => 'employee_lastname_update',
                                    'id' => 'employee_lastname_update',
                                    'class' => 'form-control'
                                );
                                echo form_input($employee_lastname); 
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size lastnameRefresh loading-margin-top"/>
                        </div>

                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Address', 'employee_address_update');?>
                                <div class="text-red address_error_update"></div>
                                <?php 
                                $employee_address = array(
                                    'type' => 'text',
                                    'name' => 'employee_address_update',
                                    'id' => 'employee_address_update',
                                    'class' => 'form-control'
                                );
                                echo form_input($employee_address);
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size addressRefresh loading-margin-top" />
                        </div>
                        
                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Gender', 'employee_gender_update'); ?>
                                <div class="text-red gender_error_update"></div>
                                <?php
                                $employee_gender = array(
                                    '' => 'Select Gender',
                                    '1' => 'Male',
                                    '2' => 'Female'
                                );
                                echo form_dropdown('employee_gender_update', $employee_gender, '', 'class="form-control" id="employee_gender_update"');
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
                    'id' => 'employeeUpdateRefreshBtn',
                    'value' => '',
                    'content' => '<i class="glyphicon glyphicon-refresh"></i> Refresh Data'
                );
                echo form_button($refresh_button);
                
                $update_button = array(
                    'class' => 'btn btn-primary',
                    'id' => 'employeeUpdateSubmitBtn',
                    'value' => '',
                    'content' => '<i class="glyphicon glyphicon-send"></i> Update'
                );
                echo form_button($update_button);
                ?>
            </div>
        </div>
    </div>
</div>