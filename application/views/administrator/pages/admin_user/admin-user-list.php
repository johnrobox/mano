<?php 
echo $this->session->flashdata("success"); 
echo $this->session->flashdata("error"); 
?>
<div class="panel panel-default">
    <div class="panel-heading">List</div>
    <div class="panel-body">
        <table class="table table-bordered" id="admin-users-datatable">
            <thead>
                <tr style="background-color: #eee">
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <th>Last Login</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($admin_list as $admin) { ?>
                <?php $gender = $admin->admin_gender; ?>
                <tr>
                    <td>
                        <?php
                        if (empty($admin->admin_image)) {
                            if ($gender == 1) 
                                $image_name = "male.png";
                            else if ($gender == 2)
                                $image_name = "female.png";
                            else 
                                $image_name = "not-set.png";
                            $image_link = "default/" . $image_name;
                        } else {
                            $image_link = "uploads/" . $admin->admin_image;
                        }
                        ?>
                        <img src="<?php echo base_url();?>images/administrator/admin_users/<?php echo $image_link; ?>" style="width: 50px; height: 50px;"/>
                    </td>
                    <td><?php echo ucwords(strtolower($admin->admin_firstname." ".$admin->admin_lastname)); ?></td>
                    <td><?php echo $admin->admin_email; ?></td>
                    <td>
                    <?php 
                        if ($gender ==1) 
                           echo "MALE";
                        else if ($gender == 2) 
                            echo "FEMALE";
                        else 
                            echo "not set";
                    ?>
                    </td>
                    <td><?php echo ($admin->admin_status == 0) ? "Online" : "Offline"; ?></td>
                    <td><?php echo ($admin->admin_last_login != "0000-00-00") ? $admin->admin_last_login : "-----"; ?></td>
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
        $('#admin-users-datatable').DataTable({
            responsive: true
        });
    });
</script>