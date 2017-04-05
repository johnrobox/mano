
<button class="btn btn-primary" id="AddProductButton">ADD PRODUCT</button>
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
        <table class="table table-bordered" id="product-list-datatable">
            <thead>
                <tr style="background-color: #eee">
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Sold In</th>
                    <th>Stock</th>
                    <th>Product Size</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { 
                    $id = $product->id; ?>
                <tr>
                    <td id="productNameTD<?php echo $id;?>"><?php echo ucwords(strtolower($product->product_name));?></td>
                    <td id="productPriceTD<?php echo $id;?>"><?php echo $product->product_price;?></td>
                    <td id="productSoldInTD<?php echo $id;?>">
                        <?php 
                        $sold_in = $product->product_sold_in;
                        if ($sold_in == 1) 
                            echo "ITEM";
                        else if ($sold_in == 2) 
                            echo "KILO";
                        else if ($sold_in == 3)
                            echo "METER";
                        else 
                            echo "....";
                        ?>
                    </td>
                    <td id="productQuantityTD<?php echo $id;?>"><?php echo $product->product_quantity; ?></td>
                    <td id="productSizeNumberMeasureTD<?php echo $id;?>">
                        <?php 
                        echo ($product->product_size_number=="0.00") ? " " : $product->product_size_number." "; 
                        $measure =  $product->product_size_measure;
                        if ($measure == 1) 
                            echo "inch";
                        else if ($measure == 2)
                            echo "centemeter";
                        else if ($measure == 3)
                            echo "meter";
                        else if ($measure == 4)
                            echo "liter";
                        else 
                            echo ".....";
                        ?>
                    </td>
                    <td id="productStatusTD<?php echo $id;?>"><?php echo ($product->product_status == 1) ? "Active" : "....."; ?></td>
                    <td>
                        <?php
                        $view_info_button = array(
                            'value' => $id,
                            'class' => 'btn btn-info btn-xs viewProductInfoButton',
                            'content' => '<i class="glyphicon glyphicon-eye-open"></i> View Info',
                            'title' => 'View Product Information'
                        );
                        echo form_button($view_info_button);
                        
                        $edit_button = array(
                            'value' => $id,
                            'class' => 'btn btn-success btn-xs editProductButton',
                            'content' => '<i class="glyphicon glyphicon-pencil"></i> Edit',
                            'title' => 'Edit Product Information'
                        );
                        echo form_button($edit_button);
                        
                        $status = $product->product_status;
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
                        <button class="btn btn-<?php echo $btn_type;?> btn-xs changeStatusProductButton" id="changeStatusButton<?php echo $id;?>" value="<?php echo $id;?>" status="<?php echo $status;?>" title="Change Product Status">
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
        $('#product-list-datatable').DataTable({
            responsive: true
        });
    });
</script>