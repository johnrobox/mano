
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Register Employee</h1>
                    <?php echo $this->session->flashdata('error'); ?>
                    <?php echo $this->session->flashdata('success'); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">Register</div>
                        <div class="panel-body">
                            <?php echo form_open(base_url().'admin/register-employee-exec'); ?>
                            <!-- for firstname -->
                            <div class="form-group">
                                <label for="firstname">Firstname</label>
                                <?php
                                echo form_error('firstname', '<br><small class="text-red">', '</small>');
                                $employee_firstname = array(
                                    'type' => 'text',
                                    'name' => 'firstname',
                                    'id' => 'firstname',
                                    'class' => 'form-control',
                                    'value' => set_value('firstname')
                                );
                                echo form_input($employee_firstname);
                                ?>
                            </div>
                            
                            <!-- for lastname -->
                            <div class="form-group">
                                <label for="lastname">Lastname</label>
                                <?php
                                echo form_error('lastname', '<br><small class="text-red">', '</small>');
                                $employee_lastname = array(
                                    'type' => 'text',
                                    'name' => 'lastname',
                                    'id' => 'lastname',
                                    'class' => 'form-control',
                                    'value' => set_value('lastname')
                                );
                                echo form_input($employee_lastname);
                                ?>
                            </div>
                            
                            <!-- for address -->
                            <div class="form-group">
                                <label for="address">Address</label>
                                <?php
                                echo form_error('address', '<br><small class="text-red">', '</small>');
                                $employee_address = array(
                                    'type' => 'text',
                                    'name' => 'address',
                                    'id' => 'address',
                                    'class' => 'form-control',
                                    'value' => set_value('address')
                                );
                                echo form_input($employee_address);
                                ?>
                            </div>
                            
                            <!-- for gender -->
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <?php
                                echo form_error('gender', '<br><small class="text-red">', '</small>');
                                $employee_gender = array(
                                    '' => 'Select Gender',
                                    '1' => 'Male',
                                    '2' => 'Female'
                                );
                                echo form_dropdown('gender', $employee_gender, '', 'class="form-control" id="gender"');
                                ?>
                                
                            </div>
                            
                            <!-- for birth date -->
                            <div class="form-group">
                                <label for="birthdate">Birthdate</label>
                                <?php echo form_error('birthdate', '<br><small class="text-red">', '</small>'); ?>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?php
                                    $birthdate = array(
                                        'class' => 'form-control',
                                        'id' => 'birthdate',
                                        'name' => 'birthdate',
                                        'placeholder' => 'MM/DD/YYYY',
                                        'type' => 'text'
                                    );
                                    echo form_input($birthdate);
                                    ?>
                                </div>
                            </div>
                            
                            <!-- for date employed -->
                            <div class="form-group">
                                <label for="date_employed">Date Employed</label>
                                <?php echo form_error('date_employed', '<br><small class="text-red">', '</small>'); ?>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?php 
                                    $date_employed = array(
                                        'class' => 'form-control',
                                        'id' => 'date_employed',
                                        'name' => 'date_employed',
                                        'placeholder' => 'MM/DD/YYYY',
                                        'type' => 'text'
                                    );
                                    echo form_input($date_employed);
                                    ?>
                                </div>
                            </div>
                            
                            <?php
                            $submit_button = array(
                                'type' => 'submit',
                                'class' => 'btn btn-primary',
                                'content' => '<span class="glyphicon glyphicon-plus"></span> Add'
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
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>

        <!-- Include Date Range Picker -->
<script type="text/javascript" src="<?php echo base_url();?>js/datepicker/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/datepicker/bootstrap-datepicker3.css"/>
<script>
    $(document).ready(function(){
        // datepicker
        var birthdate = $('input[name="birthdate"]'); //our date input has the name "date"
            birthdate.datepicker({
                    format: 'mm/dd/yyyy',
                    todayHighlight: true,
                    autoclose: true,
        })
        var date_employed = $('input[name="date_employed"]'); // our date input has the name "date"
            date_employed.datepicker({
                format : 'mm/dd/yyyy',
                todayHighlight: true,
                autoclose: true,
        })
    })    
</script>

