

$(document).ready(function(){
    var loginButton = $("#loginButton");
    var loginLoadingImage = $("#loginLoadingImage");
    var login_form = $("#loginForm")
    var usernameError = $("#usernameError");
    var passwordError = $("#passwordError");
    
    loginLoadingImage.hide();
    
    loginButton.click(function() {
        usernameError.text("");
        passwordError.text("");
        loginLoadingImage.show();
        $.ajax({
            type: "POST",
            url: window.base_url + "index.php/accounting/LoginLogoutController/loginExec",
            dataType: "json",
            data: login_form.serialize(),
            success: function(data){
                console.log(data);
                if (data.error == true) {
                    if (data.type == "required") {
                        usernameError.text(data.message.username);
                        passwordError.text(data.message.password);
                    } else if (data.type == "common") {
                        usernameError.text(data.message);
                    } else {
                        console.log("[ERROR] : error type not set!"); 
                    }
                } else {
                    window.location.href = window.base_url + "index.php/accounting/DashboardController/index";
                }
                loginLoadingImage.hide();
            },
            error: function(error){
                console.log(error);
            }
	});
    });
    
    
});
