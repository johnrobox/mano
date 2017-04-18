$(document).ready(function() {
   var cashierUpdateButton = $("#cashierUpdateButton");
   var cashierAccountRefreshButton = $("#cashierAccountRefreshButton");
   var updateCashierForm = $("#updateCashierForm");
   
   var firstname_error = $(".firstname_error");
   var lastname_error = $(".lastname_error");
   var username_error = $(".username_error");
   var address_error = $(".address_error");
   var gender_error = $(".gender_error");
   
   //Form fields
   var cashierFirstname = $("#cashierFirstname");
   var cashierLastname = $("#cashierLastname");
   var cashierUsername = $("#cashierUsername");
   var cashierAddress = $("#cashierAddress");
   var cashierGender = $("#cashierGender");
   
   var success_common_alert = $(".success_common_alert");
   var error_common_alert = $(".error_common_alert");
   
   var updateMyAccountLoadingImage = $("#updateMyAccountLoadingImage");
   
   cashierUpdateButton.click(function() {
        // show loading image
        updateMyAccountLoadingImage.show();
        
        // clear error alert 
        firstname_error.text('');
        lastname_error.text('');
        username_error.text('');
        address_error.text('');
        gender_error.text('');
        success_common_alert.hide();
        error_common_alert.hide();
       
        $.ajax({
            type: "POST",
            url: window.base_url_accounting + "MyAccountController/update",
            dataType: "json",
            data: updateCashierForm.serialize(),
            success: function(data){
                if (data.error == true) {
                    var msg = data.message;
                    if (data.type == "required") {
                        firstname_error.text(msg.cashier_firstname);
                        lastname_error.text(msg.cashier_lastname);
                        username_error.text(msg.cashier_username);
                        address_error.text(msg.cashier_address);
                        gender_error.text(msg.cashier_gender);
                    } else {
                        error_common_alert.text(msg);
                        error_common_alert.show(); 
                    }
                } else {
                    success_common_alert.text("Account successfully updated");
                    success_common_alert.show();
                }
                updateMyAccountLoadingImage.hide();
            },
            error: function(error){
                error_common_alert.text("Proccess not complete, Please contact the programmer");
                error_common_alert.show();
                updateMyAccountLoadingImage.hide();
            }
	});
   });
   
   cashierAccountRefreshButton.click(function(){
       updateMyAccountLoadingImage.show();
       
       // clear error alert 
        firstname_error.text('');
        lastname_error.text('');
        username_error.text('');
        address_error.text('');
        gender_error.text('');
        success_common_alert.hide();
        error_common_alert.hide();
        
       $.ajax({
            type: "POST",
            url: window.base_url_accounting + "MyAccountController/getMyInfo",
            dataType: "json",
            success: function(data){
                cashierFirstname.val(data.cashier_firstname);
                cashierLastname.val(data.cashier_lastname);
                cashierUsername.val(data.cashier_username);
                cashierAddress.val(data.cashier_address);
                cashierGender.val(data.cashier_gender);
                updateMyAccountLoadingImage.hide();
            },
            error: function(error){
                error_common_alert.text("Proccess not complete, Please contact the programmer");
                error_common_alert.show();
                updateMyAccountLoadingImage.hide();
            }
	});
   });
   
    var updatePasswordButton = $("#updatePasswordButton");
    var accountChangePasswrordModal = $("#accountChangePasswrordModal");
    
    // clear error alert
    var old_password_err = $(".old_password_err");
    var new_password_err = $(".new_password_err");
    var repeat_new_password_err = $(".repeat_new_password_err");
   
    // common error alert
    var commonErrorModalDisplay = $("#commonErrorModalDisplay");
    updatePasswordButton.click(function(){
        // clear alerts
        old_password_err.text("");
        new_password_err.text("");
        repeat_new_password_err.text("");
        commonErrorModalDisplay.hide();
        accountChangePasswrordModal.modal("show");
    });
   
    var changePasswordSubmitButton = $("#changePasswordSubmitButton");
    var updatePasswordForm = $("#updatePasswordForm");
    var changePasswordLoadingImage = $("#changePasswordLoadingImage");
    
    changePasswordSubmitButton.click(function(){
        changePasswordLoadingImage.show();
        // clear alerts
        old_password_err.text("");
        new_password_err.text("");
        repeat_new_password_err.text("");
        commonErrorModalDisplay.hide();
        $.ajax({
            type: "POST",
            url: window.base_url_accounting + "MyAccountController/changePassword",
            dataType: "json",
            data: updatePasswordForm.serialize(),
            success: function(data){
                if (data.error == true) {
                    console.log(data);
                    var msg = data.message;
                    if (data.type == "required") {
                        old_password_err.text(msg.old_password);
                        new_password_err.text(msg.new_password);
                        repeat_new_password_err.text(msg.repeat_new_password);
                    } else {
                        commonErrorModalDisplay.text(msg);
                        commonErrorModalDisplay.show(); 
                    }
                } else {
                    success_common_alert.text("Password successfully updated");
                    success_common_alert.show();
                    accountChangePasswrordModal.modal("hide");
                }
                changePasswordLoadingImage.hide();
            },
            error: function(error){
                commonErrorModalDisplay.text("Proccess not complete, Please contact the programmer");
                commonErrorModalDisplay.show();
                changePasswordLoadingImage.hide();
            }
	});
    });
   
});