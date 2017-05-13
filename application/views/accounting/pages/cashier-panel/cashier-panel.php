<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/accounting/auto-select/auto-select.css" />
<div class="row">
    <div class="col-sm-6">
        <div class="content-box-header">
            <div class="panel-title">SALE ITEM PANEL</div>

            <div class="panel-options">
                <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
            </div>
        </div>
        <div class="content-box-large box-with-header">
            <div ng-app="Demo">
                <div ng-controller="DemoController">
                    
                    <form name="addtoReciept">
                        <label for="product_quantity">Select Product Item</label>
                        <div ng-change="change()" custom-select="s as s.product_complete_name for s in products | filter: { product_complete_name: $searchTerm } track by s.id" ng-model="productSelected"></div>
                        <br>
                        <br>
                        <div ng-if="productSelected.product_info.product_sold_in == 1">
                            <b>NUMBER OF ITEM : </b>
                        </div>
                        <div ng-if="productSelected.product_info.product_sold_in == 2">
                            <b>NUMBER OF KILO : </b>
                        </div>
                        <div ng-if="productSelected.product_info.product_sold_in == 3">
                            <b>NUMBER OF METER : </b>
                        </div>
                        <div class="form-group" ng-if="productSelected.product_info.id != null">
                            <input type="number" value="" class="form-control" placeholder="Enter quantity" ng-value="productSelected.product_info.product_sold_in" ng-model="productQuantity" name="product_quantity" id="product_quantity"  required=""/>
                        </div>

                        <!-- this is the product info -->
                        <div ng-if="productSelected.product_info.id != null">
                            <div class="alert alert-info">
                            <p><b>Product Name : </b>{{ productSelected.product_complete_name}}</p>
                            <p>
                                <b>Product Price : </b>
                                <b style="font-size: 20px;">
                                    {{ productSelected.product_info.product_price }}
                                    per 
                                    <span ng-if="productSelected.product_info.product_sold_in == 1">ITEM</span>
                                    <span ng-if="productSelected.product_info.product_sold_in == 2">KILO</span>
                                    <span ng-if="productSelected.product_info.product_sold_in == 3">METER</span>
                                </b>
                            </p>
                            </div>
                            <button class="btn btn-primary" ng-disabled="addtoReciept.$pristine|| addtoReciept.$invalid" ng-click="addProduct()">Submit</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        RECEIPT
    </div>
</div>


