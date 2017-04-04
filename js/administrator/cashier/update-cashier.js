
$(document).ready(function(){
    
    var editCashierButton = $(".editCashierButton");
    var CashierUpdateModal = $("#CashierUpdateModal");
    
    var loadingImageUpdateCashier = $("#loadingImageUpdateCashier");
    
    var updateCommonError = $(".updateCommonError");
    
    var successCommonAlert = $(".successCommonAlert");
    
    // form fields
    var firstnameForm = $("#cashier_firstname_update");
    var lastnameForm = $("#cashier_lastname_update");
    var usernameForm = $("#cashier_username_update");
    var passwordForm = $("#cashier_password_update");
    var addressForm = $("#cashier_address_update");
    var genderForm = $("#cashier_gender_update");
    
    // loading images
    var firstnameRefresh = $('.firstnameRefresh');
    var lastnameRefresh = $('.lastnameRefresh');
    var usernameRefresh = $('.usernameRefresh');
    var passwordRefresh = $('.passwordRefresh');
    var addressRefresh = $('.addressRefresh');
    var genderRefresh = $('.genderRefresh');
    
    // error container
    var firstname_error_update = $(".firstname_error_update");
    var lastname_error_update = $(".lastname_error_update");
    var username_error_update = $(".username_error_update");
    var password_error_update = $(".password_error_update");
    var address_error_update = $(".address_error_update");
    var gender_error_update = $(".gender_error_update");
    
    var cashierUpdateSubmitBtn = $("#cashierUpdateSubmitBtn");
    
    var cashierUpdateRefreshBtn = $("#cashierUpdateRefreshBtn");
    
    var cashier_id = 0;
    
    loadingImageUpdateCashier.hide();
    updateCommonError.hide();
    successCommonAlert.hide();
    
    editCashierButton.click(function(){
        
        updateCommonError.hide();
        
        firstname_error_update.text("");
        lastname_error_update.text("");
        username_error_update.text("");
        password_error_update.text("");
        address_error_update.text("");
        gender_error_update.text("");
        
        CashierUpdateModal.modal("show");
        cashier_id = this.getAttribute('value');  
        // get data
        GetCashierInfo(function(data) {  
            console.log(data);
            var ch = data.cashier;
            firstnameForm.val(ch.cashier_firstname);
            lastnameForm.val(ch.cashier_lastname);
            usernameForm.val(ch.cashier_username);
            passwordForm.val(ch.cashier_password);
            addressForm.val(ch.cashier_address);
            genderForm.val(ch.cashier_gender);
            
            firstnameRefresh.hide();
            lastnameRefresh.hide();
            usernameRefresh.hide();
            passwordRefresh.hide();
            addressRefresh.hide();
            genderRefresh.hide();
        }, cashier_id, 0); 
        
    });
    
    cashierUpdateSubmitBtn.click(function() {
        updateCommonError.hide();
        loadingImageUpdateCashier.show();
        // clear error message
        firstname_error_update.text("");
        lastname_error_update.text("");
        username_error_update.text("");
        password_error_update.text("");
        address_error_update.text("");
        gender_error_update.text("");
        var firstnameValue = firstnameForm.val();
        var lastnameValue = lastnameForm.val();
        var usernameValue = usernameForm.val();
        var passwordValue = passwordForm.val();
        var addressValue = addressForm.val();
        var genderValue = genderForm.val();
        console.log(cashier_id);
        $.ajax({
            type: "POST",
            url: window.base_url + "CashierController/updateExec",
            dataType: "json",
            data: {
                id : cashier_id,
                firstname : firstnameValue,
                lastname : lastnameValue,
                username : usernameValue,
                password : passwordValue,
                address : addressValue,
                gender : genderValue
            },
            success: function(data){
                if (data.error == true) {
                    if (data.is_common == true) {
                        // set error message
                        firstname_error_update.text(data.message.firstname);
                        lastname_error_update.text(data.message.lastname);
                        username_error_update.text(data.message.username);
                        password_error_update.text(data.message.password);
                        address_error_update.text(data.message.address);
                        gender_error_update.text(data.message.gender);
                    } else {
                        updateCommonError.text(data.message);
                        updateCommonError.show();
                    }
                } else {
                    successCommonAlert.text("Employee sucessfully updated.");
                    $("#firstnameTD"+cashier_id).text(firstnameValue);
                    $("#lastnameTD"+cashier_id).text(lastnameValue);
                    $("#usernameTD"+cashier_id).text(usernameValue);
                    $("#addressTD"+cashier_id).text(addressValue);
                    $("#genderTD"+cashier_id).text((genderValue == 1) ? "MALE" : "FEMALE");
                    successCommonAlert.show();
                    CashierUpdateModal.modal("hide");
                }
                loadingImageUpdateCashier.hide();
                console.log(data);
            },
            error: function(error){
                console.log(error);
            }
	});
    });
    
    // Refresh employee information
    cashierUpdateRefreshBtn.click(function(){
        firstnameRefresh.show();
        lastnameRefresh.show();
        usernameRefresh.show();
        passwordRefresh.show();
        addressRefresh.show();
        genderRefresh.show();
        
        updateCommonError.hide();
        
        // clear error message
        firstname_error_update.text("");
        lastname_error_update.text("");
        username_error_update.text("");
        password_error_update.text("");
        address_error_update.text("");
        gender_error_update.text("");
        
        GetCashierInfo(function(data) {  
            console.log(data);
            var ch = data.cashier;
            firstnameForm.val(ch.cashier_firstname);
            lastnameForm.val(ch.cashier_lastname);
            usernameForm.val(ch.cashier_username);
            passwordForm.val(ch.cashier_password);
            addressForm.val(ch.cashier_address);
            genderForm.val(ch.cashier_gender);
            
            firstnameRefresh.hide();
            lastnameRefresh.hide();
            usernameRefresh.hide();
            passwordRefresh.hide();
            addressRefresh.hide();
            genderRefresh.hide();
        }, cashier_id, 0); 
    });
    
});

function GetCashierInfo(callback, id, state) {
    $.ajax({
        type: "POST",
        url: window.base_url + "CashierController/getCashierInfo",
        dataType: "json",
        data: {
            id : id,
            state : state
        },
        success: function(data){
            callback(data);
        },
        error: function(error){
            console.log(error);
        }
    });
}