<div class="modal fade" id="ProductUpdateModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <i class="pull-right fa fa-times" data-dismiss="modal"></i>
                <i class="glyphicon glyphicon-pencil"></i> EDIT PRODUCT INFORMATION
                <br><br>
                <div class="updateCommonError alert alert-danger"></div>
                <img id="loadingImageUpdateProduct" src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="center-block loading-fixed-size">
            </div>
            <div class="modal-body">
                <div class="row">
                    <form>
                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Product Name', 'product_name_update'); ?>
                                <div class="text-red product_name_error_update"></div>
                                <?php
                                $product_name = array(
                                    'type' => 'text',
                                    'name' => 'product_name_update',
                                    'id' => 'product_name_update',
                                    'class' => 'form-control'
                                );
                                echo form_input($product_name);
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size productNameRefresh loading-margin-top"/>
                        </div>
                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Product Price', 'product_price_update');?>
                                <div class="text-red product_price_error_update"></div>
                                <?php 
                                $product_price = array(
                                    'type' => 'number',
                                    'name' => 'product_price_update',
                                    'id' => 'product_price_update',
                                    'class' => 'form-control'
                                );
                                echo form_input($product_price); 
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size productPriceRefresh loading-margin-top"/>
                        </div>
                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Sold In : ', 'product_sold_in_update'); ?>
                                    <div class="text-red product_sold_in_error_update"></div>
                                    <?php
                                    $product_sold = array(
                                        '' => 'Select',
                                        '1' => 'Per ITEM',
                                        '2' => 'Per KILO',
                                        '3' => 'Per SQ. METER / METER'
                                    );
                                    echo form_dropdown('product_sold_in_update', $product_sold, '', 'class="form-control" id="product_sold_in_update"');
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size productSoldInRefresh loading-margin-top"/>
                        </div>
                        
                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Product Quantity', 'product_quantity_update');?>
                                <div class="text-red product_quantity_error_update"></div>
                                <?php 
                                $product_quantity = array(
                                    'type' => 'number',
                                    'name' => 'product_quantity_update',
                                    'id' => 'product_quantity_update',
                                    'class' => 'form-control'
                                );
                                echo form_input($product_quantity); 
                                ?>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size productQuantityRefresh loading-margin-top"/>
                        </div>

                        <div class="col-sm-11">
                            <div class="form-group">
                                <?php echo form_label('Size', 'product_size_number_update'); ?>
                                <small>( Optional )</small>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <?php
                                        $product_size_number = array(
                                            'type' => 'number',
                                            'class' => 'form-control',
                                            'name' => 'product_size_number_update',
                                            'id' => 'product_size_number_update'
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
                                        echo form_dropdown('product_size_measure_update', $product_size_measure, '', 'class="form-control" id="product_size_measure_update"');
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <img src="<?php echo base_url();?>images/common/loading/loading_apple.gif" class="loading-fixed-size productSizeRefresh loading-margin-top" />
                        </div>
                        
                    </form>
                </div>


            </div>
            <div class="modal-footer">
                <?php 
                $refresh_button = array(
                    'class' => 'btn btn-success',
                    'id' => 'productUpdateRefreshBtn',
                    'value' => '',
                    'content' => '<i class="glyphicon glyphicon-refresh"></i> Refresh Data'
                );
                echo form_button($refresh_button);
                
                $update_button = array(
                    'class' => 'btn btn-primary',
                    'id' => 'productUpdateSubmitBtn',
                    'value' => '',
                    'content' => '<i class="glyphicon glyphicon-send"></i> Update'
                );
                echo form_button($update_button);
                ?>
            </div>
        </div>
    </div>
</div>