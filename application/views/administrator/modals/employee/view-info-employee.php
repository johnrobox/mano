
<div class="modal fade" id="employeeViewInfoModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="glyphicon glyphicon-user"></i>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                EMPLOYEE INFORMATION
                <img id="employeeViewInfoLoadingImage" style="height: 30px; width:30px;" src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="center-block">
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Firstname</td>
                        <td>
                            <?php 
                            echo form_input(array(
                                'type' => 'text',
                                'id' => 'employeeFirstnameViewInfo',
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
                                'id' => 'employeeLastnameViewInfo',
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
                                'id' => 'employeeAddressViewInfo',
                                'class' => 'form-control',
                                'disabled' => ''
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <?php 
                            $employee_gender = array(
                                    '' => 'Select Gender',
                                    '1' => 'Male',
                                    '2' => 'Female'
                                );
                            echo form_dropdown('employeeGenderViewInfo', $employee_gender, '', 'class="form-control" id="employeeGenderViewInfo"');
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