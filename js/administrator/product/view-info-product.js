/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    var viewProductInfoButton = $(".viewProductInfoButton");
    
    // modal
    var productViewInfoModal = $("#productViewInfoModal");
    
    var product_id = 0;
    
    var productViewInfoLoadingImage = $("#productViewInfoLoadingImage");
    
    // form field
    var productNameViewInfo = $("#productNameViewInfo");
    var productPriceViewInfo = $("#productPriceViewInfo");
    var productSoldInViewInfo = $("#productSoldInViewInfo");
    var productQuantityViewInfo = $("#productQuantityViewInfo");
    var productSizeViewInfo = $("#productSizeViewInfo");
    
    // previous and next button
    var nextAndPreviousButton = $('.nextAndPrevButtonInModal');
    // previous and next button ID
    var infoCustPreviousButton = $('#viewPreviousButtonInModal');
    var infoCustNextButton = $('#viewNextButtonInModal');  
    
    viewProductInfoButton.click(function(){
        productViewInfoLoadingImage.show();
        productViewInfoModal.modal("show");
        product_id = this.getAttribute('value'); 
        console.log(product_id);
        GetProductInfo(function(data) {  
            console.log(data);
            var prod = data.product;
            if (data.previous == prod.id)
                infoCustPreviousButton.hide();
            else
                infoCustPreviousButton.show();
            if (data.next == prod.id)
                infoCustNextButton.hide();
            else 
                infoCustNextButton.show();
            
            productNameViewInfo.val(prod.product_name);
            productPriceViewInfo.val(prod.product_price);
            
            var sold_in = "";
            if (prod.product_sold_in == 1) 
                sold_in = "ITEM";
            else if (prod.product_sold_in == 2)
                sold_in = "KILO";
            else if (prod.product_sold_in == 3)
                sold_in = "METER";
            productSoldInViewInfo.val(sold_in);
            
            productQuantityViewInfo.val(prod.product_quantity);
            
            var size = "";
            if (prod.product_size_number != "0.00") {
                if (prod.product_size_measure == 1)
                    size = prod.product_size_number + " INCH";
                else if (prod.product_size_measure == 2)
                    size = prod.product_size_number + " CENTEMETER";
                else if (prod.product_size_measure == 3)
                    size = prod.product_size_number + " METER";
                else if (prod.product_size_measure == 4)
                    size = prod.product_size_number + " LITER";
            }
            productSizeViewInfo.val(size);
            nextAndPreviousButton.attr("value", prod.id);
            
            productViewInfoLoadingImage.hide();
            
        }, product_id, 0); 
    });
    
    
    nextAndPreviousButton.click(function(){
        var product_id_PR = this.getAttribute("value");
        var click_state = this.getAttribute("state");    
        var clicked = '';
        
        if (click_state == "previous") 
            clicked = 1;
        else if (click_state == "next") 
            clicked = 2;
        else 
            clicked = 0;
        
        productViewInfoLoadingImage.show();
        
        productNameViewInfo.val('');
        productPriceViewInfo.val('');
        productSoldInViewInfo.val('');
        productQuantityViewInfo.val('');
        productSizeViewInfo.val('');
        
        GetProductInfo(function(data){ 
            console.log(data);
            var prod = data.product[0];
            if (data.previous == prod.id)
                infoCustPreviousButton.hide();
            else
                infoCustPreviousButton.show();
            if (data.next == prod.id)
                infoCustNextButton.hide();
            else 
                infoCustNextButton.show();
            
            if (data.select == true) {
                productNameViewInfo.val(prod.product_name);
                productPriceViewInfo.val(prod.product_price);

                var sold_in = "";
                if (prod.product_sold_in == 1) 
                    sold_in = "ITEM";
                else if (prod.product_sold_in == 2)
                    sold_in = "KILO";
                else if (prod.product_sold_in == 3)
                    sold_in = "METER";
                productSoldInViewInfo.val(sold_in);

                productQuantityViewInfo.val(prod.product_quantity);

                var size = "";
                if (prod.product_size_number != "0.00") {
                    if (prod.product_size_measure == 1)
                        size = prod.product_size_number + " INCH";
                    else if (prod.product_size_measure == 2)
                        size = prod.product_size_number + " CENTEMETER";
                    else if (prod.product_size_measure == 3)
                        size = prod.product_size_number + " METER";
                    else if (prod.product_size_measure == 4)
                        size = prod.product_size_number + " LITER";
                }
                productSizeViewInfo.val(size);
            }
            
            nextAndPreviousButton.attr("value", prod.id);
            productViewInfoLoadingImage.hide();
        }, product_id_PR, clicked);
        
    });
    
});