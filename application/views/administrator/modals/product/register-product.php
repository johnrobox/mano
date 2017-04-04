<div class="modal fade" id="registerProductFormModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
                ADD PRODUCT 
                <img id="registerProductLoadingImage" style="height: 25px; width:25px;" src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="center-block">
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" id="registerProductCommonErrorDisplay"></div>
                <?php 
                echo form_open('', 'id="register_product_form" class="register_product_form" method="post"');
                ?>
                <div class="form-group">
                    <?php echo form_label('Product Name', 'product_name'); ?>
                    <div class="text-red product_name_error"></div>
                    <?php
                    $product_name = array(
                        'type' => 'text',
                        'class' => 'form-control',
                        'name' => 'product_name',
                        'id' => 'product_name'
                    );
                    echo form_input($product_name);
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Price', 'product_price'); ?>
                    <div class="text-red product_price_error"></div>
                    <?php
                    $product_price = array(
                        'type' => 'number',
                        'class' => 'form-control',
                        'name' => 'product_price',
                        'id' => 'product_price'
                    );
                    echo form_input($product_price);
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Sold In : ', 'product_sold'); ?>
                    <div class="text-red product_sold_error"></div>
                    <?php
                    $product_sold = array(
                        '' => 'Select',
                        '1' => 'Per ITEM',
                        '2' => 'Per KILO',
                        '3' => 'Per SQ. METER / METER'
                    );
                    echo form_dropdown('product_sold', $product_sold, '', 'class="form-control" id="product_sold"');
                    ?>
                </div>
                <div class="form-group">
                    <?php echo form_label('Quantity', 'product_quantity'); ?>
                    <div class="text-red product_quantity_error"></div>
                    <?php
                    $product_quantity = array(
                        'type' => 'number',
                        'class' => 'form-control',
                        'name' => 'product_quantity',
                        'id' => 'product_quantity'
                    );
                    echo form_input($product_quantity);
                    ?>
                </div>
                
                <div class="form-group">
                    <?php echo form_label('Size', 'product_size_number'); ?>
                    <small>( Optional )</small>
                    <div class="row">
                        <div class="col-xs-3">
                            <?php
                            $product_size_number = array(
                                'type' => 'number',
                                'class' => 'form-control',
                                'name' => 'product_size_number',
                                'id' => 'product_size_number'
                            );
                            echo form_input($product_size_number);
                            ?>
                        </div>
                        <div class="col-xs-3">
                            <?php
                            $product_size_measure = array(
                                '' => 'Select',
                                '1' => 'INCH',
                                '2' => 'CENTE METER',
                                '3' => 'METER',
                                '4' => 'LITER'
                            );
                            echo form_dropdown('product_size_measure', $product_size_measure, '', 'class="form-control" id="product_size_measure"');
                            ?>
                        </div>
                    </div>
                    
                </div>
             
                <?php
                $reset_button = array(
                    'type' => 'reset',
                    'id' => 'clear_button',
                    'class' => 'btn btn-default',
                    'content' => 'Clear Fields'
                );
                echo form_button($reset_button);
                
                $submit_button = array(
                    'id' => 'submitRegisterProductButton',
                    'class' => 'btn btn-primary',
                    'content' => '<i class="glyphicon glyphicon-pencil"></i> Register'
                );
                echo form_button($submit_button);
                
                ?>
                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>