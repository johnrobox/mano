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
                    
                    <label for="product_quantity">Select Product Item</label>
                    <p>Selected state: {{ state }}</p>
                    <div custom-select="s.id as s.product_complete_name for s in states | filter: { product_complete_name: $searchTerm } track by s.id" ng-model="state"></div>
                    
                    <br>
                    
                    <div class="form-group">
                        <label for="product_quantity">Enter Quantity</label>
                        
                        <input type="number" class="form-control" name="product_quantity" id="product_quantiy"/>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        RECEIPT
    </div>
</div>


