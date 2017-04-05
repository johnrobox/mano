
$(document).ready(function(){
    
    var editProductButton = $(".editProductButton");
    var ProductUpdateModal = $("#ProductUpdateModal");
    
    var loadingImageUpdateProduct = $("#loadingImageUpdateProduct");
    
    var updateCommonError = $(".updateCommonError");
    
    var successCommonAlert = $(".successCommonAlert");
    
    // form fields
    var productNameForm = $("#product_name_update");
    var productPriceForm = $("#product_price_update");
    var productSoldInForm = $("#product_sold_in_update");
    var productQuantityForm = $("#product_quantity_update");
    var productSizeNumberForm = $("#product_size_number_update");
    var productSizeMeasureForm = $("#product_size_measure_update");
    
    // loading images
    var productNameRefresh = $('.productNameRefresh');
    var productPriceRefresh = $('.productPriceRefresh');
    var productSoldInRefresh = $('.productSoldInRefresh');
    var productQuantityRefresh = $('.productQuantityRefresh');
    var productSizeRefresh = $(".productSizeRefresh");
    
    // error container
    var product_name_error_update = $(".product_name_error_update");
    var product_price_error_update = $(".product_price_error_update");
    var product_sold_in_error_update = $(".product_sold_in_error_update");
    var product_quantity_error_update = $(".product_quantity_error_update");
    
    var productUpdateSubmitBtn = $("#productUpdateSubmitBtn");
    
    var productUpdateRefreshBtn = $("#productUpdateRefreshBtn");
    
    var product_id = 0;
    
    loadingImageUpdateProduct.hide();
    updateCommonError.hide();
    successCommonAlert.hide();
    
    editProductButton.click(function(){
        updateCommonError.hide();
        product_name_error_update.text("");
        product_price_error_update.text("");
        product_sold_in_error_update.text("");
        product_quantity_error_update.text("");
        
        ProductUpdateModal.modal("show");
        product_id = this.getAttribute('value');  
        // get data
        GetProductInfo(function(data) {  
            console.log(data);
            var prod = data.product;
            productNameForm.val(prod.product_name);
            productPriceForm.val(prod.product_price);
            productSoldInForm.val(prod.product_sold_in);
            productQuantityForm.val(prod.product_quantity);
            productSizeNumberForm.val(prod.product_size_number);
            productSizeMeasureForm.val(prod.product_size_measure);
            
            productNameRefresh.hide();
            productPriceRefresh.hide();
            productSoldInRefresh.hide();
            productQuantityRefresh.hide();
            productSizeRefresh.hide();
            
        }, product_id, 0); 
        
    });
    
    productUpdateSubmitBtn.click(function() {
        updateCommonError.hide();
        loadingImageUpdateProduct.show();
        // clear error message
        product_name_error_update.text("");
        product_price_error_update.text("");
        product_sold_in_error_update.text("");
        product_quantity_error_update.text("");
        
        var productNameValue = productNameForm.val();
        var productPriceValue = productPriceForm.val();
        var productSoldInValue = productSoldInForm.val();
        var productQuantityValue = productQuantityForm.val();
        var productSizeNumberValue = productSizeNumberForm.val();
        var productSizeMeasureValue = productSizeMeasureForm.val();
        console.log(product_id);
        $.ajax({
            type: "POST",
            url: window.base_url + "ProductController/updateExec",
            dataType: "json",
            data: {
                id : product_id,
                product_name : productNameValue,
                product_price : productPriceValue,
                product_sold : productSoldInValue,
                product_quantity : productQuantityValue,
                product_number : productSizeNumberValue,
                product_measure : productSizeMeasureValue
            },
            success: function(data){
                console.log(data);
                if (data.error == true) {
                    if (data.is_common == true) {
                        // set error message
                        product_name_error_update.text(data.message.product_name);
                        product_price_error_update.text(data.message.product_price);
                        product_sold_in_error_update.text(data.message.product_sold);
                        product_quantity_error_update.text(data.message.product_quantity);
                    } else {
                        updateCommonError.text(data.message);
                        updateCommonError.show();
                    }
                } else {
                    successCommonAlert.text("Employee sucessfully updated.");
                    $("#productNameTD"+product_id).text(productNameValue);
                    $("#productPriceTD"+product_id).text(productPriceValue);
                    var sold_in = "";
                    if (productSoldInValue == 1)
                        sold_in = "ITEM";
                    else if (productSoldInValue == 2)
                        sold_in = "KILO";
                    else if (productSoldInValue == 3)
                        sold_in = "SQ. METER / METER";
                    else 
                        sold_in = "......";
                    $("#productSoldInTD"+product_id).text(sold_in);
                    $("#productQuantityTD"+product_id).text(productQuantityValue);
                    
                    var prod_size = 0;
                    if (productSizeNumberValue != "0.00" || productSizeNumberValue != "") {
                        if (productSizeMeasureValue == 1)
                            prod_size = productSizeNumberValue + " " + "inch";
                        else if (productSizeMeasureValue == 2)
                            prod_size = productSizeNumberValue + " " + "centemeter";
                        else if (productSizeMeasureValue == 3)
                            prod_size = productSizeNumberValue + " " + "meter";
                        else if (productSizeMeasureValue == 4)
                            prod_size = productSizeNumberValue + " " + "liter";
                        else 
                            prod_size = ".....";
                    }
                        
                    $("#productSizeNumberMeasureTD"+product_id).text(prod_size);
                    successCommonAlert.show();
                    ProductUpdateModal.modal("hide");
                }
                loadingImageUpdateProduct.hide();
                console.log(data);
            },
            error: function(error){
                console.log(error);
            }
	});
    });
    
    // Refresh employee information
    productUpdateRefreshBtn.click(function(){
        productNameRefresh.show();
        productPriceRefresh.show();
        productSoldInRefresh.show();
        productQuantityRefresh.show();
        productSizeRefresh.show();
        
        updateCommonError.hide();
        
        // clear error message
        product_name_error_update.text("");
        product_price_error_update.text("");
        product_sold_in_error_update.text("");
        product_quantity_error_update.text("");
        
        GetProductInfo(function(data) {  
            console.log(data);
            var prod = data.product;
            productNameForm.val(prod.product_name);
            productPriceForm.val(prod.product_price);
            productSoldInForm.val(prod.product_sold_in);
            productQuantityForm.val(prod.product_quantity);
            productSizeNumberForm.val(prod.product_size_number);
            productSizeMeasureForm.val(prod.product_size_measure);
            
            productNameRefresh.hide();
            productPriceRefresh.hide();
            productSoldInRefresh.hide();
            productQuantityRefresh.hide();
            productSizeRefresh.hide();
        }, product_id, 0); 
    });
    
});

function GetProductInfo(callback, id, state) {
    $.ajax({
        type: "POST",
        url: window.base_url + "ProductController/getProductInfo",
        dataType: "json",
        data: {
            id : id,
            state : state
        },
        success: function(data){
            callback(data);
        },
        error: function(error){
            console.log(error);
        }
    });
}