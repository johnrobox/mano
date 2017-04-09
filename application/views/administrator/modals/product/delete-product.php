<div class="modal fade" id="ProductDeleteModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
                <i class="glyphicon glyphicon-trash"></i> DELETE
            </div>
            <div class="modal-body">
                Are you sure, You wan to delete this product in list ?
                <img id="loadingImageDeleteProduct" src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size">
            </div>
            <div class="modal-footer">
                <?php 
                $close_button = array(
                    'class' => 'btn btn-default',
                    'data-dismiss' => 'modal',
                    'value' => '',
                    'content' => 'Close'
                );
                echo form_button($close_button);
                
                $delete_button = array(
                    'class' => 'btn btn-primary',
                    'id' => 'productDeleteSubmitBtn',
                    'value' => '',
                    'content' => '<i class="glyphicon glyphicon-trash"></i> Delete'
                );
                echo form_button($delete_button);
                ?>
            </div>
        </div>
    </div>
</div>