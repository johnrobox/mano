
$(document).ready(function() {
    
    var changeStatusCashierButton = $(".changeStatusCashierButton");
    var successCommonAlert = $(".successCommonAlert");
    var errorCommonAlert = $(".errorCommonAlert");
    errorCommonAlert.hide();
    
    changeStatusCashierButton.click(function() {
        successCommonAlert.hide();
        errorCommonAlert.hide();
        
        var cashierID = this.getAttribute('value'); 
        var cashierStatus = this.getAttribute('status');
        var loadingChangeStatus = $("#changeStatusLoading"+cashierID);
        var changeStatusButton = $("#changeStatusButton"+cashierID);
        var changeStatusText = $("#changeStatusText"+cashierID);
        var statusTD = $("#statusTD"+cashierID);
        loadingChangeStatus.show();
        cashierStatus = (cashierStatus == 1) ? 0 : 1;
        $.ajax({
            type: "POST",
            url: window.base_url + "CashierController/changeStatus",
            dataType: "json",
            data: {
                id : cashierID,
                status : cashierStatus
            },
            success: function(data){
                if (data.error == false) {
                    changeStatusButton.attr("status", cashierStatus);
                    if (cashierStatus ==1) {
                        changeStatusButton.addClass("btn-danger");
                        changeStatusButton.removeClass("btn-primary");
                        changeStatusText.text("Disable");
                        statusTD.text("Active");
                    } else {
                        changeStatusButton.addClass("btn-primary");
                        changeStatusButton.removeClass("btn-danger");
                        changeStatusText.text("Enable");
                        statusTD.text(".....");
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