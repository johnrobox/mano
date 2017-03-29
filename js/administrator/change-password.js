/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    var change_password = $("#change_password");
    var ownAccountChangePasswrordModal = $("#ownAccountChangePasswrordModal");
    
    var scriptSuccessAlert = $("#scriptSuccessAlert");
    scriptSuccessAlert.hide();
    
    var changePassLoadingImage = $("#changePassLoadingImage");
    
    var update_password_form = $("#update_password_form");
    
    var changePasswordSubmitButton = $("#changePasswordSubmitButton");
    
    var old_password_err = $(".old_password_err");
    var new_password_err = $(".new_password_err");
    var repeat_new_password_err = $(".repeat_new_password_err");
    
    var common_error_display = $("#common_error_display");
    common_error_display.hide();
    
    changePassLoadingImage.hide();
    
    change_password.click(function() {
        // clear all data in modal 
        update_password_form.trigger('reset');
        old_password_err.text("");
        new_password_err.text("");
        common_error_display.hide();
        repeat_new_password_err.text("");  
        ownAccountChangePasswrordModal.modal("show");
    });
    
    changePasswordSubmitButton.click(function(){
        changePassLoadingImage.show();
        old_password_err.text("");
        new_password_err.text("");
        common_error_display.hide();
        repeat_new_password_err.text("");  
        $.ajax({
            type: "POST",
            url: window.base_url + "index.php/administrator/AccountController/changePasswordExec",
            dataType: "json",
            data: update_password_form.serialize(),
            success: function(data){
                if (data.error == true) {
                    if (data.type == "required") {
                        old_password_err.text(data.message.old_password);
                        new_password_err.text(data.message.new_password);
                        repeat_new_password_err.text(data.message.repeat_new_password);
                    } else if (data.type == "common") {
                        common_error_display.show();
                        common_error_display.text(data.message);
                    } else {
                        common_error_display.show();
                        common_error_display.text("ERROR : Cannot update your password. Please logout and login your account again!");
                    }
                } else {
                    scriptSuccessAlert.show();
                    scriptSuccessAlert.text("Your password successfully updated.");
                    ownAccountChangePasswrordModal.modal("hide");
                }
                changePassLoadingImage.hide();
            },
            error: function(error){
                console.log(error);
            }
	});
    });
    
});