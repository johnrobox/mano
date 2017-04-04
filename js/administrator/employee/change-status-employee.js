
$(document).ready(function() {
    
    var changeStatusEmployeeButton = $(".changeStatusEmployeeButton");
    var successCommonAlert = $(".successCommonAlert");
    var errorCommonAlert = $(".errorCommonAlert");
    errorCommonAlert.hide();
    
    changeStatusEmployeeButton.click(function() {
        successCommonAlert.hide();
        errorCommonAlert.hide();
        
        var employeeID = this.getAttribute('value'); 
        var employeeStatus = this.getAttribute('status');
        var loadingChangeStatus = $("#changeStatusLoading"+employeeID);
        var changeStatusButton = $("#changeStatusButton"+employeeID);
        var changeStatusText = $("#changeStatusText"+employeeID);
        var statusTD = $("#statusTD"+employeeID);
        loadingChangeStatus.show();
        employeeStatus = (employeeStatus == 1) ? 0 : 1;
        $.ajax({
            type: "POST",
            url: window.base_url + "EmployeeController/changeStatus",
            dataType: "json",
            data: {
                id : employeeID,
                status : employeeStatus
            },
            success: function(data){
                if (data.error == false) {
                    changeStatusButton.attr("status", employeeStatus);
                    if (employeeStatus ==1) {
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