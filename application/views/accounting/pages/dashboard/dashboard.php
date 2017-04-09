
<div class="row">
    <div class="col-sm-8">
        <img src="<?php echo base_url();?>images/common/mano/logo.png" class="img-responsive"/>
    </div>
    <div class="col-sm-4">
        <div class="content-box-header">
            <div class="panel-title">CALENDAR</div>
        </div>
        <div class="content-box-large box-with-header">
            <?php echo $this->calendar->generate();?>
            <br /><br />
        </div>
    </div>
</div>