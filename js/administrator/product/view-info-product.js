/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    var viewEmployeeInfoButton = $(".viewProductInfoButton");
    
    // modal
    var employeeViewInfoModal = $("#productViewInfoModal");
    
    var employee_id = 0;
    
    var employeeViewInfoLoadingImage = $("#productViewInfoLoadingImage");
    
    // form field
    var employeeFirstnameViewInfo = $("#employeeFirstnameViewInfo");
    var employeeLastnameViewInfo = $("#employeeLastnameViewInfo");
    var employeeAddressViewInfo = $("#employeeAddressViewInfo");
    var employeeGenderViewInfo = $("#employeeGenderViewInfo");
    
    // previous and next button
    var nextAndPreviousButton = $('.nextAndPrevButtonInModal');
    // previous and next button ID
    var infoCustPreviousButton = $('#viewPreviousButtonInModal');
    var infoCustNextButton = $('#viewNextButtonInModal');  
    
    viewEmployeeInfoButton.click(function(){
        employeeViewInfoLoadingImage.show();
        employeeViewInfoModal.modal("show");
        employee_id = this.getAttribute('value'); 
        console.log(employee_id);
        GetEmployeeInfo(function(data) {  
            console.log(data);
            var em = data.employee;
            if (data.previous == em.id)
                infoCustPreviousButton.hide();
            else
                infoCustPreviousButton.show();
            if (data.next == em.id)
                infoCustNextButton.hide();
            else 
                infoCustNextButton.show();
            
            employeeFirstnameViewInfo.val(em.employee_firstname);
            employeeLastnameViewInfo.val(em.employee_lastname);
            employeeAddressViewInfo.val(em.employee_address);
            employeeGenderViewInfo.val(em.employee_gender);
            
            nextAndPreviousButton.attr("value", em.id);
            
            employeeViewInfoLoadingImage.hide();
            
        }, employee_id, 0); 
    });
    
    
    nextAndPreviousButton.click(function(){
        var employee_id_PR = this.getAttribute("value");
        var click_state = this.getAttribute("state");    
        var clicked = '';
        
        if (click_state == "previous") 
            clicked = 1;
        else if (click_state == "next") 
            clicked = 2;
        else 
            clicked = 0;
        
        employeeViewInfoLoadingImage.show();
        
        employeeFirstnameViewInfo.val('');
        employeeLastnameViewInfo.val('');
        employeeAddressViewInfo.val('');
        employeeGenderViewInfo.val('');
        
        GetEmployeeInfo(function(data){ 
            console.log(data);
            var em = data.employee[0];
            if (data.previous == em.id)
                infoCustPreviousButton.hide();
            else
                infoCustPreviousButton.show();
            if (data.next == em.id)
                infoCustNextButton.hide();
            else 
                infoCustNextButton.show();
            
            if (data.select == true) {
                employeeFirstnameViewInfo.val(em.employee_firstname);
                employeeLastnameViewInfo.val(em.employee_lastname);
                employeeAddressViewInfo.val(em.employee_address);
                employeeGenderViewInfo.val(em.employee_gender);
            }
            
            nextAndPreviousButton.attr("value", em.id);
            employeeViewInfoLoadingImage.hide();
        }, employee_id_PR, clicked);
        
    });
    
});