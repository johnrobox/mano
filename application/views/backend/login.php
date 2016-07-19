<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo $this->session->flashdata('error'); ?>
                        <?php echo form_open(base_url().'login-exec'); ?>
                            <fieldset>
                                <div class="form-group">
                                    <?php 
                                    echo form_error('username', '<small class="text-red">', '</small>');
                                    $login_email = array(
                                        'type' => 'text',
                                        'name' => 'username',
                                        'value' => set_value('email'),
                                        'class' => 'form-control',
                                        'placeholder' => 'Username',
                                        'autofocus' => ''
                                    ); 
                                    echo form_input($login_email);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php
                                    echo form_error('password', '<small class="text-red">', '</small>');
                                    $login_password = array(
                                        'type' => 'password',
                                        'name' => 'password',
                                        'placeholder' => 'Password',
                                        'value' => '',
                                        'class' => 'form-control'
                                    );
                                    echo form_input($login_password);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <?php 
                                    echo form_error('role', '<small class="text-red">', '</small>');
                                    $login_role = array(
                                        '' => 'Select Role',
                                        '1' => 'Administrator',
                                        '2' => 'Accounting'
                                    );
                                    echo form_dropdown('role', $login_role, '', 'class="form-control"');
                                    ?>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <?php 
                                $login_submit = array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-lg btn-success btn-block',
                                    'content' => 'Login'
                                );
                                echo form_button($login_submit);
                                ?>
                            </fieldset>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

