$(document).ready(function(){
    var AddCashierButton = $("#AddCashierButton");
    var registerCashierFormModal = $("#registerCashierFormModal");
    var submitRegisterCashierButton = $("#submitRegisterCashierButton");
    var register_cashier_form = $("#register_cashier_form");
    
    var registerCashierCommonErrorDisplay = $("#registerCashierCommonErrorDisplay");
    registerCashierCommonErrorDisplay.hide();
    
    var registerCashierLoadingImage = $("#registerCashierLoadingImage");
    registerCashierLoadingImage.hide();
    
    // set error container
    var firstname_error = $(".firstname_error");
    var lastname_error = $(".lastname_error");
    var username_error = $(".username_error");
    var address_error = $(".address_error");
    var gender_error = $(".gender_error");
    
    AddCashierButton.click(function(){
        registerCashierFormModal.modal("show");
        firstname_error.text("");
        lastname_error.text("");
        username_error.text("");
        address_error.text("");
        gender_error.text("");
        registerCashierCommonErrorDisplay.hide();
    });
    
    submitRegisterCashierButton.click(function(){
        registerCashierLoadingImage.show();
        firstname_error.text("");
        lastname_error.text("");
        username_error.text("");
        address_error.text("");
        gender_error.text("");
        registerCashierCommonErrorDisplay.hide();
        $.ajax({
            type: "POST",
            url: window.base_url + "CashierController/registerExec",
            dataType: "json",
            data: register_cashier_form.serialize(),
            success: function(data){
                console.log(data);
                if (data.error == true) {
                    if (data.type == "required") {
                        firstname_error.text(data.message.cashier_firstname);
                        lastname_error.text(data.message.cashier_lastname);
                        username_error.text(data.message.cashier_username)
                        address_error.text(data.message.cashier_address);
                        gender_error.text(data.message.cashier_gender);
                    } else if (data.type == "common") {
                        registerCashierCommonErrorDisplay.show();
                        registerCashierCommonErrorDisplay.text(data.message);
                    } else {
                        registerCashierCommonErrorDisplay.show();
                        registerCashierCommonErrorDisplay.text("ERROR : Cannot register employee. Please try it again!");
                    }
                } else {
                    location.reload();
                }
                registerCashierLoadingImage.hide();
            },
            error: function(error){
                console.log(error);
            }
	});
    });
    
});