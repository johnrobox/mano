<div class="row">
    <div class="col-sm-12">
        <div class="content-box-header">
            <div class="panel-title">PRODUCTS LIST</div>
        </div>
        <div class="content-box-large box-with-header">
            <table class="table table-bordered" id="product-list-datatable">
                <thead>
                    <tr style="background-color: #eee">
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Sold In</th>
                        <th>Stock</th>
                        <th>Product Size</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) { 
                        $id = $product->id; ?>
                    <tr id="productItemTR<?php echo $id; ?>">
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
                        
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#product-list-datatable').DataTable({
            responsive: true
        });
    });
</script>