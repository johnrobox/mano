$(document).ready(function(){
    var AddProductButton = $("#AddProductButton");
    var registerProductFormModal = $("#registerProductFormModal");
    var submitRegisterProductButton = $("#submitRegisterProductButton");
    var register_product_form = $("#register_product_form");
    
    var registerProductCommonErrorDisplay = $("#registerProductCommonErrorDisplay");
    registerProductCommonErrorDisplay.hide();
    
    var registerProductLoadingImage = $("#registerProductLoadingImage");
    registerProductLoadingImage.hide();
    
    // set error container
    var product_name_error = $(".product_name_error");
    var product_price_error = $(".product_price_error");
    var product_sold_error = $(".product_sold_error");
    var product_quantity_error = $(".product_quantity_error");
    
    AddProductButton.click(function(){
        registerProductFormModal.modal("show");
        product_name_error.text("");
        product_price_error.text("");
        product_sold_error.text("");
        product_quantity_error.text("");
        registerProductCommonErrorDisplay.hide();
    });
    
    submitRegisterProductButton.click(function(){
        registerProductLoadingImage.show();
        product_name_error.text("");
        product_price_error.text("");
        product_sold_error.text("");
        product_quantity_error.text("");
        registerProductCommonErrorDisplay.hide();
        $.ajax({
            type: "POST",
            url: window.base_url + "ProductController/registerExec",
            dataType: "json",
            data: register_product_form.serialize(),
            success: function(data){
                console.log(data);
                if (data.error == true) {
                    if (data.type == "required") {
                        var msg = data.message;
                        product_name_error.text(msg.product_name);
                        product_price_error.text(msg.product_price);
                        product_sold_error.text(msg.product_sold);
                        product_quantity_error.text(msg.product_quantity);
                    } else if (data.type == "common") {
                        registerProductCommonErrorDisplay.show();
                        registerProductCommonErrorDisplay.text(data.message);
                    } else {
                        registerProductCommonErrorDisplay.show();
                        registerProductCommonErrorDisplay.text("ERROR : Cannot register product. Please try it again!");
                    }
                } else {
                    location.reload();
                }
                registerProductLoadingImage.hide();
            },
            error: function(error){
                console.log(error);
            }
	});
    });
    
});