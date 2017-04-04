$(document).ready(function(){
    var AddEmployeeButton = $("#AddEmployeeButton");
    var registerEmployeeFormModal = $("#registerEmployeeFormModal");
    var submitRegisterEmployeeButton = $("#submitRegisterEmployeeButton");
    var register_employee_form = $("#register_employee_form");
    
    var registerEmployeeCommonErrorDisplay = $("#registerEmployeeCommonErrorDisplay");
    registerEmployeeCommonErrorDisplay.hide();
    
    var registerEmployeeLoadingImage = $("#registerEmployeeLoadingImage");
    registerEmployeeLoadingImage.hide();
    
    // set error container
    var firstname_error = $(".firstname_error");
    var lastname_error = $(".lastname_error");
    var address_error = $(".address_error");
    var gender_error = $(".gender_error");
    
    AddEmployeeButton.click(function(){
        registerEmployeeFormModal.modal("show");
        firstname_error.text("");
        lastname_error.text("");
        address_error.text("");
        gender_error.text("");
        registerEmployeeCommonErrorDisplay.hide();
    });
    
    submitRegisterEmployeeButton.click(function(){
        registerEmployeeLoadingImage.show();
        firstname_error.text("");
        lastname_error.text("");
        address_error.text("");
        gender_error.text("");
        registerEmployeeCommonErrorDisplay.hide();
        $.ajax({
            type: "POST",
            url: window.base_url + "EmployeeController/registerExec",
            dataType: "json",
            data: register_employee_form.serialize(),
            success: function(data){
                console.log(data);
                if (data.error == true) {
                    if (data.type == "required") {
                        firstname_error.text(data.message.employee_firstname);
                        lastname_error.text(data.message.employee_lastname);
                        address_error.text(data.message.employee_address);
                        gender_error.text(data.message.employee_gender);
                    } else if (data.type == "common") {
                        registerEmployeeCommonErrorDisplay.show();
                        registerEmployeeCommonErrorDisplay.text(data.message);
                    } else {
                        registerEmployeeCommonErrorDisplay.show();
                        registerEmployeeCommonErrorDisplay.text("ERROR : Cannot register employee. Please try it again!");
                    }
                } else {
                    location.reload();
                }
                registerEmployeeLoadingImage.hide();
            },
            error: function(error){
                console.log(error);
            }
	});
    });
    
});