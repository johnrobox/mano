<div class="row">
    <div class="col-sm-12">
        <div class="col-md-12">
            <div class="content-box-large">
                <div class="panel-heading">
                    <div class="panel-title">MY ACCOUNT INFORMATION</div>
                    <?php
                    echo form_button(
                            array(
                                'class' => 'btn btn-info pull-right',
                                'id' => 'updatePasswordButton',
                                'content' => 'CHANGE PASSWORD'
                            ));
                    ?>
                    <img id="updateMyAccountLoadingImage" style="height: 30px; width:30px; display: none" src="<?php echo base_url();?>images/common/loading/loading_apple.gif">
                </div>
                <div class="panel-body">
                    <div class="col-sm-2">
                        <?php
                        if ($account->cashier_gender == 1) {
                            $image_name = "male.png";
                        } else if ($account->cashier_gender == 2) {
                            $image_name = "female.png";
                        } else {
                            $image_name = "not-set.png";
                        }
                        ?>
                        <img src="<?php echo base_url();?>images/administrator/cashier/<?php echo $image_name; ?>" style="" class="img-responsive"/>
                    </div>
                    <div class="col-sm-10">
                        <div class="alert alert-success success_common_alert" style="display: none"></div>
                        <div class="alert alert-danger error_common_alert" style="display: none"></div>
                        <form class="form-horizontal" role="form" id="updateCashierForm">
                            <div class="form-group">
                                <label for="cashierFirstname" class="col-sm-2 control-label">Firstname</label>
                                <div class="col-sm-10">
                                    <span class="firstname_error text-red"></span>
                                    <?php
                                    $cashier_firstname = array(
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'name' => 'cashier_firstname',
                                        'id' => 'cashierFirstname',
                                        'placeholder' => 'Enter firstname',
                                        'value' => $account->cashier_firstname
                                    );
                                    echo form_input($cashier_firstname);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cashierLastname" class="col-sm-2 control-label">Lastname</label>
                                <div class="col-sm-10">
                                    <span class="lastname_error text-red"></span>
                                    <?php
                                    $cashier_lastname = array(
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'name' => 'cashier_lastname',
                                        'id' => 'cashierLastname',
                                        'placeholder' => 'Enter lastname',
                                        'value' => $account->cashier_lastname
                                    );
                                    echo form_input($cashier_lastname);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cashierUsername" class="col-sm-2 control-label">Username</label>
                                <div class="col-sm-10">
                                    <span class="username_error text-red"></span>
                                    <?php
                                    $cashier_username = array(
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'name' => 'cashier_username',
                                        'id' => 'cashierUsername',
                                        'placeholder' => 'Enter username',
                                        'value' => $account->cashier_username
                                    );
                                    echo form_input($cashier_username);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cashierAddress" class="col-sm-2 control-label">Address</label>
                                <div class="col-sm-10">
                                    <span class="address_error text-red"></span>
                                    <?php
                                    $cashier_address = array(
                                        'type' => 'text',
                                        'class' => 'form-control',
                                        'name' => 'cashier_address',
                                        'id' => 'cashierAddress',
                                        'placeholder' => 'Enter address',
                                        'value' => $account->cashier_address
                                    );
                                    echo form_input($cashier_address);
                                    ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cashierGender" class="col-sm-2 control-label">Gender</label>
                                <div class="col-sm-10">
                                    <span class="gender_error text-red"></span>
                                    <?php
                                    $cashier_gender = array(
                                        '' => 'Select Gender',
                                        '1' => 'Male',
                                        '2' => 'Female'
                                    );
                                    echo form_dropdown('cashier_gender', $cashier_gender, $account->cashier_gender, 'class="form-control" id="cashierGender"');
                                    ?>
                                </div>
                            </div>

                            <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-8">
                                  <?php
                                  echo form_button(
                                          array(
                                              'class' => 'btn btn-success',
                                              'id' => 'cashierAccountRefreshButton',
                                              'content' => 'REFRESH'
                                          ));   

                                  echo form_button(
                                          array(
                                              'class' => 'btn btn-primary',
                                              'id' => 'cashierUpdateButton',
                                              'content' => 'UPDATE'
                                          ));
                                  ?>    
                              </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>