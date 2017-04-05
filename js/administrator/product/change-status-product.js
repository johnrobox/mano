
$(document).ready(function() {
    var changeStatusProductButton = $(".changeStatusProductButton");
    var successCommonAlert = $(".successCommonAlert");
    var errorCommonAlert = $(".errorCommonAlert");
    errorCommonAlert.hide();
    
    changeStatusProductButton.click(function() {
        successCommonAlert.hide();
        errorCommonAlert.hide();
        
        var productID = this.getAttribute('value'); 
        var productStatus = this.getAttribute('status');
        var loadingChangeStatus = $("#changeStatusLoading"+productID);
        var changeStatusButton = $("#changeStatusButton"+productID);
        var changeStatusText = $("#changeStatusText"+productID);
        var productStatusTD = $("#productStatusTD"+productID);
        loadingChangeStatus.show();
        productStatus = (productStatus == 1) ? 0 : 1;
        $.ajax({
            type: "POST",
            url: window.base_url + "ProductController/changeStatus",
            dataType: "json",
            data: {
                id : productID,
                status : productStatus
            },
            success: function(data){
                if (data.error == false) {
                    changeStatusButton.attr("status", productStatus);
                    if (productStatus ==1) {
                        changeStatusButton.addClass("btn-danger");
                        changeStatusButton.removeClass("btn-primary");
                        changeStatusText.text("Disable");
                        productStatusTD.text("Active");
                    } else {
                        changeStatusButton.addClass("btn-primary");
                        changeStatusButton.removeClass("btn-danger");
                        changeStatusText.text("Enable");
                        productStatusTD.text(".....");
                    }
                    successCommonAlert.text(data.message);
                    successCommonAlert.show();
                } else {
                    errorCommonAlert.text(data.message);
                    errorCommonAlert.show();
                }
                loadingChangeStatus.hide();
                console.log(data);
            },
            error: function(error){
                console.log(error);
            }
	});
    });
    
});