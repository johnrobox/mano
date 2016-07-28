<div class="modal fade" id="updateEmployeeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="firstname">Firstname</label>
                    <div class="text-red" id="firstname_err"></div>
                    <?php 
                    $firstname = array(
                        'type' => 'text',
                        'name' => 'firstname',
                        'id' => 'firstname',
                        'class' => 'form-control'
                    );
                    echo form_input($firstname);
                    ?>
                </div>
                
                <div class="form-group">
                    <label for="lastname">Lastname</label>
                    <div class="text-red" id="lastname_err"></div>
                    <?php
                    $lastname = array(
                        'type' => 'text',
                        'name' => 'lastname',
                        'id' => 'lastname',
                        'class' => 'form-control'
                    );
                    echo form_input($lastname);
                    ?>
                </div>
                
                <div class="form-group">
                    <label for="address">Address</label>
                    <div class="text-red" id="address_err"></div>
                    <?php 
                    $address = array(
                        'type' => 'text',
                        'name' => 'address',
                        'id' => 'address',
                        'class' => 'form-control'
                    );
                    echo form_input($address);
                    ?>
                </div>
                
                <!-- for gender -->
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <div class="text-red" id="gender_err"></div>
                    <?php
                    $gender = array(
                        '' => 'Select Gender',
                        '1' => 'Male',
                        '2' => 'Female'
                    );
                    echo form_dropdown('gender', $gender, '', 'class="form-control" id="gender"');
                    ?>
                </div>
                
                <!-- for birth date -->
                <div class="form-group">
                    <label for="birthdate">Birthdate</label>
                    <div class="text-red" id="birth_err"></div>
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
                    <div class="text-red" id="employed_err"></div>
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
                $update_button = array(
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
                    'id' => 'UpdateButton',
                    'content' => '<span class="glyphicon glyphicon-plus"></span> Update'
                );
                echo form_button($update_button);
                ?>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
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