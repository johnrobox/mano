
<div class="modal fade" id="cashierViewInfoModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-user"></i>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                CASHIER INFORMATION
                <img id="cashierViewInfoLoadingImage" style="height: 30px; width:30px;" src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="center-block">
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Firstname</td>
                        <td>
                            <?php 
                            echo form_input(array(
                                'type' => 'text',
                                'id' => 'cashierFirstnameViewInfo',
                                'class' => 'form-control',
                                'disabled' => ''
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Lastname</td>
                        <td>
                            <?php 
                            echo form_input(array(
                                'type' => 'text',
                                'id' => 'cashierLastnameViewInfo',
                                'class' => 'form-control',
                                'disabled' => ''
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>
                            <?php 
                            echo form_input(array(
                                'type' => 'text',
                                'id' => 'cashierUsernameViewInfo',
                                'class' => 'form-control',
                                'disabled' => ''
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td>
                            <?php 
                            echo form_input(array(
                                'type' => 'text',
                                'id' => 'cashierPasswordViewInfo',
                                'class' => 'form-control',
                                'disabled' => ''
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <?php 
                            echo form_input(array(
                                'type' => 'text',
                                'id' => 'cashierAddressViewInfo',
                                'class' => 'form-control',
                                'disabled' => ''
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <?php 
                            $cashier_gender = array(
                                    '' => 'Select Gender',
                                    '1' => 'Male',
                                    '2' => 'Female'
                                );
                            echo form_dropdown('cashierGenderViewInfo', $cashier_gender, '', 'class="form-control" id="cashierGenderViewInfo"');
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <ul class="pager">
                    <li class="previous nextAndPrevButtonInModal" id="viewPreviousButtonInModal" state="previous" value="">
                        <a href="#">
                            <i class="glyphicon glyphicon-arrow-left"></i> Previous
                        </a>
                    </li>
                    <li class="next nextAndPrevButtonInModal"  id="viewNextButtonInModal" state="next" value="">
                        <a href="#">
                            <i class="glyphicon glyphicon-arrow-right"></i> Next
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>