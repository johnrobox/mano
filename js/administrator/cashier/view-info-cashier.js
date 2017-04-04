/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
    var viewCashierInfoButton = $(".viewCashierInfoButton");
    
    // modal
    var cashierViewInfoModal = $("#cashierViewInfoModal");
    
    var cashier_id = 0;
    
    var cashierViewInfoLoadingImage = $("#cashierViewInfoLoadingImage");
    
    // form field
    var cashierFirstnameViewInfo = $("#cashierFirstnameViewInfo");
    var cashierLastnameViewInfo = $("#cashierLastnameViewInfo");
    var cashierUsernameViewInfo = $("#cashierUsernameViewInfo");
    var cashierPasswordViewInfo = $("#cashierPasswordViewInfo");
    var cashierAddressViewInfo = $("#cashierAddressViewInfo");
    var cashierGenderViewInfo = $("#cashierGenderViewInfo");
    
    // previous and next button
    var nextAndPreviousButton = $('.nextAndPrevButtonInModal');
    // previous and next button ID
    var infoCustPreviousButton = $('#viewPreviousButtonInModal');
    var infoCustNextButton = $('#viewNextButtonInModal');  
    
    viewCashierInfoButton.click(function(){
        cashierViewInfoLoadingImage.show();
        cashierViewInfoModal.modal("show");
        cashier_id = this.getAttribute('value'); 
        console.log(cashier_id);
        GetCashierInfo(function(data) {  
            console.log(data);
            var ch = data.cashier;
            if (data.previous == ch.id)
                infoCustPreviousButton.hide();
            else
                infoCustPreviousButton.show();
            if (data.next == ch.id)
                infoCustNextButton.hide();
            else 
                infoCustNextButton.show();
            
            cashierFirstnameViewInfo.val(ch.cashier_firstname);
            cashierLastnameViewInfo.val(ch.cashier_lastname);
            cashierUsernameViewInfo.val(ch.cashier_username);
            cashierPasswordViewInfo.val(ch.cashier_password);
            cashierAddressViewInfo.val(ch.cashier_address);
            cashierGenderViewInfo.val(ch.cashier_gender);
            
            nextAndPreviousButton.attr("value", ch.id);
            
            cashierViewInfoLoadingImage.hide();
            
        }, cashier_id, 0); 
    });
    
    
    nextAndPreviousButton.click(function(){
        var cashier_id_PR = this.getAttribute("value");
        var click_state = this.getAttribute("state");    
        var clicked = '';
        
        if (click_state == "previous") 
            clicked = 1;
        else if (click_state == "next") 
            clicked = 2;
        else 
            clicked = 0;
        
        cashierViewInfoLoadingImage.show();
        
        cashierFirstnameViewInfo.val('');
        cashierLastnameViewInfo.val('');
        cashierUsernameViewInfo.val('');
        cashierPasswordViewInfo.val('');
        cashierAddressViewInfo.val('');
        cashierGenderViewInfo.val('');
        
        GetCashierInfo(function(data){ 
            console.log(data);
            var ch = data.cashier[0];
            if (data.previous == ch.id)
                infoCustPreviousButton.hide();
            else
                infoCustPreviousButton.show();
            if (data.next == ch.id)
                infoCustNextButton.hide();
            else 
                infoCustNextButton.show();
            
            if (data.select == true) {
                cashierFirstnameViewInfo.val(ch.cashier_firstname);
                cashierLastnameViewInfo.val(ch.cashier_lastname);
                cashierUsernameViewInfo.val(ch.cashier_username);
                cashierPasswordViewInfo.val(ch.cashier_password);
                cashierAddressViewInfo.val(ch.cashier_address);
                cashierGenderViewInfo.val(ch.cashier_gender);
            }
            
            nextAndPreviousButton.attr("value", ch.id);
            cashierViewInfoLoadingImage.hide();
        }, cashier_id_PR, clicked);
        
    });
    
});