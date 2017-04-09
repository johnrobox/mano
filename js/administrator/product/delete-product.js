
$(document).ready(function(){
   var deleteProductButton = $('.deleteProductButton');
   var ProductDeleteModal = $("#ProductDeleteModal");
   
   var loadingImageDeleteProduct = $("#loadingImageDeleteProduct");
   loadingImageDeleteProduct.hide();
   
   var productDeleteSubmitBtn = $('#productDeleteSubmitBtn');
   
   var productID = 0;
   
   var successCommonAlert = $('.successCommonAlert');
   var errorCommonAlert = $('.errorCommonAlert');
     
   deleteProductButton.click(function(){
       successCommonAlert.hide();
       errorCommonAlert.hide();
       ProductDeleteModal.modal("show");
       productID = this.getAttribute('value');
   });
   
   productDeleteSubmitBtn.click(function(){
       loadingImageDeleteProduct.show();
       $.ajax({
            type: "POST",
            url: window.base_url + "ProductController/deleteProduct",
            dataType: "json",
            data: {
                id : productID
            },
            success: function(data){
                if (data.delete == false) {
                    errorCommonAlert.text(data.message);
                    errorCommonAlert.show();
                } else {
                    successCommonAlert.text(data.message);
                    successCommonAlert.show();
                }
                loadingImageDeleteProduct.hide();
                ProductDeleteModal.modal("hide");
                $("#productItemTR"+productID).hide();
            },
            error: function(error){
                console.log(error);
            }
	});
   });
   
});