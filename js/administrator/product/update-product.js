
$(document).ready(function(){
    
    var editEmployeeButton = $(".editEmployeeButton");
    var EmployeeUpdateModal = $("#EmployeeUpdateModal");
    
    var loadingImageUpdateEmpoloyee = $("#loadingImageUpdateEmpoloyee");
    
    var updateCommonError = $(".updateCommonError");
    
    var successCommonAlert = $(".successCommonAlert");
    
    // form fields
    var firstnameForm = $("#employee_firstname_update");
    var lastnameForm = $("#employee_lastname_update");
    var addressForm = $("#employee_address_update");
    var genderForm = $("#employee_gender_update");
    
    // loading images
    var firstnameRefresh = $('.firstnameRefresh');
    var lastnameRefresh = $('.lastnameRefresh');
    var addressRefresh = $('.addressRefresh');
    var genderRefresh = $('.genderRefresh');
    
    // error container
    var firstname_error_update = $(".firstname_error_update");
    var lastname_error_update = $(".lastname_error_update");
    var address_error_update = $(".address_error_update");
    var gender_error_update = $(".gender_error_update");
    
    var employeeUpdateSubmitBtn = $("#employeeUpdateSubmitBtn");
    
    var employeeUpdateRefreshBtn = $("#employeeUpdateRefreshBtn");
    
    var employee_id = 0;
    
    loadingImageUpdateEmpoloyee.hide();
    updateCommonError.hide();
    successCommonAlert.hide();
    
    editEmployeeButton.click(function(){
        
        updateCommonError.hide();
        
        firstname_error_update.text("");
        lastname_error_update.text("");
        address_error_update.text("");
        gender_error_update.text("");
        
        EmployeeUpdateModal.modal("show");
        employee_id = this.getAttribute('value');  
        // get data
        GetEmployeeInfo(function(data) {  
            console.log(data);
            firstnameForm.val(data.employee.employee_firstname);
            firstnameRefresh.hide();
            lastnameForm.val(data.employee.employee_lastname);
            lastnameRefresh.hide();
            addressForm.val(data.employee.employee_address);
            addressRefresh.hide();
            genderForm.val(data.employee.employee_gender);
            genderRefresh.hide();
        }, employee_id, 0); 
        
    });
    
    employeeUpdateSubmitBtn.click(function() {
        updateCommonError.hide();
        loadingImageUpdateEmpoloyee.show();
        // clear error message
        firstname_error_update.text("");
        lastname_error_update.text("");
        address_error_update.text("");
        gender_error_update.text("");
        var firstnameValue = firstnameForm.val();
        var lastnameValue = lastnameForm.val();
        var addressValue = addressForm.val();
        var genderValue = genderForm.val();
        console.log(employee_id);
        $.ajax({
            type: "POST",
            url: window.base_url + "EmployeeController/updateExec",
            dataType: "json",
            data: {
                id : employee_id,
                firstname : firstnameValue,
                lastname : lastnameValue,
                address : addressValue,
                gender : genderValue
            },
            success: function(data){
                if (data.error == true) {
                    if (data.is_common == true) {
                        // set error message
                        firstname_error_update.text(data.message.firstname);
                        lastname_error_update.text(data.message.lastname);
                        address_error_update.text(data.message.address);
                        gender_error_update.text(data.message.gender);
                    } else {
                        updateCommonError.text(data.message);
                        updateCommonError.show();
                    }
                } else {
                    successCommonAlert.text("Employee sucessfully updated.");
                    $("#firstnameTD"+employee_id).text(firstnameValue);
                    $("#lastnameTD"+employee_id).text(lastnameValue);
                    $("#addressTD"+employee_id).text(addressValue);
                    $("#genderTD"+employee_id).text((genderValue == 1) ? "MALE" : "FEMALE");
                    successCommonAlert.show();
                    EmployeeUpdateModal.modal("hide");
                }
                loadingImageUpdateEmpoloyee.hide();
                console.log(data);
            },
            error: function(error){
                console.log(error);
            }
	});
    });
    
    // Refresh employee information
    employeeUpdateRefreshBtn.click(function(){
        firstnameRefresh.show();
        lastnameRefresh.show();
        addressRefresh.show();
        genderRefresh.show();
        
        updateCommonError.hide();
        
        // clear error message
        firstname_error_update.text("");
        lastname_error_update.text("");
        address_error_update.text("");
        gender_error_update.text("");
        
        GetEmployeeInfo(function(data) {  
            console.log(data);
            firstnameForm.val(data.employee.employee_firstname);
            firstnameRefresh.hide();
            lastnameForm.val(data.employee.employee_lastname);
            lastnameRefresh.hide();
            addressForm.val(data.employee.employee_address);
            addressRefresh.hide();
            genderForm.val(data.employee.employee_gender);
            genderRefresh.hide();
        }, employee_id, 0); 
    });
    
});

function GetEmployeeInfo(callback, id, state) {
    $.ajax({
        type: "POST",
        url: window.base_url + "EmployeeController/getEmployeeInfo",
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