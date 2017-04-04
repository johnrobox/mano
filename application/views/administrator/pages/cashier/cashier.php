
<button class="btn btn-primary" id="AddCashierButton">ADD CASHIER</button>
<br><br>
<?php 
echo $this->session->flashdata("success"); 
echo $this->session->flashdata("error"); 
?>

<div class="panel panel-default">
    <div class="panel-heading">List</div>
    <div class="panel-body">
        <div class="alert alert-success successCommonAlert"></div>
        <div class="alert alert-danger errorCommonAlert"></div>
        <table class="table table-bordered" id="employees-list-datatable">
            <thead>
                <tr style="background-color: #eee">
                    <th></th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cashiers as $cashier) { 
                    $id = $cashier->id;
                    $gender = $cashier->cashier_gender; ?>
                <tr>
                    <td>
                        <?php
                            if ($gender == 1) 
                                $image_name = "male.png";
                            else if ($gender == 2)
                                $image_name = "female.png";
                            else 
                                $image_name = "not-set.png";
                        ?>
                        <img src="<?php echo base_url();?>images/administrator/cashier/<?php echo $image_name; ?>" style="width: 50px; height: 50px;"/>
                    </td>
                    <td id="firstnameTD<?php echo $id;?>"><?php echo ucwords(strtolower($cashier->cashier_firstname));?></td>
                    <td id="lastnameTD<?php echo $id;?>"><?php echo ucwords(strtolower($cashier->cashier_lastname)); ?></td>
                    <td id="usernameTD<?php echo $id;?>"><?php echo $cashier->cashier_username; ?></td>
                    <td id="addressTD<?php echo $id;?>"><?php echo $cashier->cashier_address; ?></td>
                    <td id="genderTD<?php echo $id;?>">
                    <?php 
                        if ($gender ==1) 
                           echo "MALE";
                        else if ($gender == 2) 
                            echo "FEMALE";
                        else 
                            echo "not set";
                    ?>
                    </td>
                    <td id="statusTD<?php echo $id;?>"><?php echo ($cashier->cashier_status == 1) ? "Active" : "....."; ?></td>
                    <td>
                        <?php
                        $view_info_button = array(
                            'value' => $id,
                            'class' => 'btn btn-info btn-xs viewCashierInfoButton',
                            'content' => '<i class="glyphicon glyphicon-eye-open"></i> View Info',
                            'title' => 'View Cashier Information'
                        );
                        echo form_button($view_info_button);
                        
                        $edit_button = array(
                            'value' => $id,
                            'class' => 'btn btn-success btn-xs editCashierButton',
                            'content' => '<i class="glyphicon glyphicon-pencil"></i> Edit',
                            'title' => 'Edit Cashier Information'
                        );
                        echo form_button($edit_button);
                        
                        $status = $cashier->cashier_status;
                        if ($status) { 
                            $btn_type = "danger";
                            $btn_text = "Disable";
                            $tr_class = "bg-white";
                        } else {
                            $tr_class = "bg-eee";
                            $btn_type = "primary";
                            $btn_text = "Enable";
                        } 
                        ?>
                        <button class="btn btn-<?php echo $btn_type;?> btn-xs changeStatusCashierButton" id="changeStatusButton<?php echo $id;?>" value="<?php echo $id;?>" status="<?php echo $status;?>" title="Change Cashier Status">
                            <span id="changeStatusText<?php echo $id;?>"><?php echo $btn_text;?></span>
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" id="changeStatusLoading<?php echo $id;?>" style="width: 20px; height: 20px; display: none"/>
                        </button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="panel-footer">
        
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#employees-list-datatable').DataTable({
            responsive: true
        });
    });
</script>