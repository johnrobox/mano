
$(document).ready(function(){
   
    var cashierLogoutModal = $("#cashierLogoutModal");
    var logout = $(".logout");
    
    var loadingProcessLogout = $("#loadingProcessLogout");
    
    var confirm = $("#confirm");
    
    logout.click(function(){
        cashierLogoutModal.modal("show");
    });
    
    var logoutConfirmError = $("#logoutConfirmError");
    
    confirm.click(function(){
        loadingProcessLogout.show();
        $.ajax({
            type: "POST",
            url: window.base_url_accounting + "LoginLogoutController/logoutExec",
            dataType: "json",
            success: function(data){
                console.log(data);
                if (data.logout == false) {
                    logoutConfirmError.show();
                    logoutConfirmError.text("Cannot process request! Please refresh the page and try the action again!");
                } else {
                    window.location.href = window.server_url + "accounting";
                }
                loadingProcessLogout.hide();
            },
            error: function(error){
                logoutConfirmError.text("Cannot process request! Please refresh the page and try the action again!");
                logoutConfirmError.show();
            }
	});
    });
    
});