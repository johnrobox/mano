<?php 
echo $this->session->flashdata("success"); 
echo $this->session->flashdata("error"); 
?>
<div class="jumbotron">
    <b>FIRST NAME :  </b>
        <?php echo $account[0]->admin_firstname; ?>
    <br>
    <b>LAST NAME  :  </b>
        <?php echo $account[0]->admin_lastname; ?>
    <br>
    <b>USERNAME : </b>
        <?php echo $account[0]->admin_username; ?>
    <br>
    <b>EMAIL : </b>
        <?php echo $account[0]->admin_email; ?>
    <br>
    <b>GENDER : </b>
        <?php echo ($account[0]->admin_gender == 1) ? "MALE" : "FEMALE"; ?>
    <br>
    <b>LAST LOGIN : </b>
        <?php echo $account[0]->admin_last_login; ?>
    <br>
    <b>LAST LOGOUT : </b>
        <?php echo $account[0]->admin_last_logout; ?>
    <br>
    <b>DATE CREATED : </b>
        <?php echo $account[0]->admin_created; ?>
    <br>
    <b>DATE MODIFIED : </b>
        <?php echo $account[0]->admin_modified; ?>
</div>