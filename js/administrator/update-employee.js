

$(document).ready(function(){
    
    var editEmployeeButton = $(".editEmployeeButton");
    var EmployeeUpdateModal = $("#EmployeeUpdateModal");
    
    // refresh images
    var firstnameRefresh = $('.firstnameRefresh');
    var lastnameRefresh = $('.lastnameRefresh');
    var addressRefresh = $('.addressRefresh');
    var genderRefresh = $('.genderRefresh');
    
    editEmployeeButton.click(function(){
        EmployeeUpdateModal.modal("show");
        var employee_id = this.getAttribute('value');  
        
        // get data
        GetEmployeeInfo(function(data) {  
            console.log(data);
//            var cust = data.customer;
//            firstnameField.val(cust.customer_firstname);
//            middlenameField.val(cust.customer_middlename);
//            lastnameField.val(cust.customer_lastname);
//            meterNumberField.val(cust.customer_meter_no);
//            contactField.val(cust.customer_contact);
//            addressField.val(cust.customer_address);
//
//            fnameRefreshImage.hide();
//            mnameRefreshImage.hide();
//            lnameRefreshImage.hide();
//            meterNumberRefreshImage.hide();
//            contactRefreshImage.hide();
//            addressRefreshImage.hide();

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