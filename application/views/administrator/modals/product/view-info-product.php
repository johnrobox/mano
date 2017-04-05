
<div class="modal fade" id="productViewInfoModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                PRODUCT INFORMATION
                <img id="productViewInfoLoadingImage" style="height: 30px; width:30px;" src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="center-block">
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>Product Name</td>
                        <td>
                            <?php 
                            echo form_input(array(
                                'type' => 'text',
                                'id' => 'productNameViewInfo',
                                'class' => 'form-control',
                                'disabled' => ''
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Price</td>
                        <td>
                            <?php 
                            echo form_input(array(
                                'type' => 'text',
                                'id' => 'productPriceViewInfo',
                                'class' => 'form-control',
                                'disabled' => ''
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Sold In</td>
                        <td>
                            <?php 
                            echo form_input(array(
                                'type' => 'text',
                                'id' => 'productSoldInViewInfo',
                                'class' => 'form-control',
                                'disabled' => ''
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Quantity</td>
                        <td>
                            <?php 
                            echo form_input(array(
                                'type' => 'text',
                                'id' => 'productQuantityViewInfo',
                                'class' => 'form-control',
                                'disabled' => ''
                            )); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Product Size</td>
                        <td>
                            <?php 
                            echo form_input(array(
                                'type' => 'text',
                                'id' => 'productSizeViewInfo',
                                'class' => 'form-control',
                                'disabled' => ''
                            )); ?>
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