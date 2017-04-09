        
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4" style="margin-top: 100px;">
                    <img src="<?php echo base_url();?>images/common/mano/logo2.png" class="center-block img-responsive" />
                    <br>
                    
                    <div class="login-panel panel panel-default" style="margin-top: 20px;">
                        <div class="panel-body">
                            <div class="panel-title text-center">ACCOUNTING LOGIN</div>
                            <br>
                            <img id="loginLoadingImage" src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="center-block" style="height: 25px; margin-bottom: 10px;"/>
                            
                            <fieldset>
                                <form id="accountingLoginForm" style="text-align: center">
                                <div class="form-group">
                                    <span class="text-red" id="usernameError"></span>
                                    <?php 
                                    $login_email = array(
                                        'type' => 'text',
                                        'name' => 'username',
                                        'class' => 'form-control',
                                        'placeholder' => 'Username',
                                        'autofocus' => ''
                                    ); 
                                    echo form_input($login_email);
                                    ?>
                                </div>
                                <div class="form-group">
                                    <span class="text-red" id="passwordError"></span>
                                    <?php
                                    $login_password = array(
                                        'type' => 'password',
                                        'name' => 'password',
                                        'placeholder' => 'Password',
                                        'class' => 'form-control'
                                    );
                                    echo form_input($login_password);
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
                                    'class' => 'btn btn-lg btn-primary btn-block',
                                    'content' => 'Login',
                                    'id' => 'loginButton'
                                );
                                echo form_button($login_submit);
                                ?>
                                </form>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>