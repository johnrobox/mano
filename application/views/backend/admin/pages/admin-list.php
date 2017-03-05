
                    
    <table class="table table-bordered" id="administrator-datatable">
        <thead>
        <tr>
            <th>Profile</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Last Login</th>
            <th>Last Logout</th>
            <th>Created</th>
            <th>Modified</th>
        </tr>
        </thead>
        <tbody>
    <?php foreach($all_admin as $row) { ?>
        <tr>
            <td>
                <?php
                if (empty($row->user_image)) {
                    $profile = ($row->user_gender == 1) ? "default/male.png" : "default/female.png";
                } else {
                    $profile = $row->user_image;
                }
                ?>

                <img src="<?php echo base_url();?>images/admin/admin_users/<?php echo $profile;?>"  style="width: 80px; height: 80px;">
            </td>
            <td><?php echo $row->user_firstname. " ". $row->user_lastname; ?></td>
            <td><?php echo ($row->user_gender == 1) ? 'Male' : 'Female'; ?> </td>
            <td><?php echo ($row->user_status) ? "Enable" : "Disable"; ?></td>
            <td><?php echo $row->user_lastlogin; ?></td>
            <td><?php echo $row->user_lastlogout; ?></td>
            <td><?php echo $row->user_created; ?></td>
            <td><?php echo $row->user_modified; ?></td>
        </tr>
    <?php } ?>
        </tbody>
    </table>
<script>
    $(document).ready(function(){
        $('#administrator-datatable').DataTable({
            responsive: true
        });
    });
</script>