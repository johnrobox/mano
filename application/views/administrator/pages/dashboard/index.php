
<?php 
echo $this->session->flashdata("success"); 
echo $this->session->flashdata("error"); 
?>
<script>
$(document).ready(function(){
    setInterval(function(){ 
        var time = new Date();
        $("#displayTime").text(time.getHours() + ":" + time.getMinutes() + ":" + time.getSeconds());
    }, 1000);
});
</script>

<div class="row">
    <div class="col-sm-9">
        
    </div>
    <div class="col-sm-3 pull-right">
        <div style="font-size: 30px;" class="text-center">
            <span id="displayTime"></span>
        </div>
        <?php echo $this->calendar->generate();?>
    </div>
</div>