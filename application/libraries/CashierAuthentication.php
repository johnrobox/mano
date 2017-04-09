<?php

class CashierAuthentication {
    
    public function __construct() {
        $this->ses =& get_instance();
        $this->base = base_url().'index.php/accounting/';
    }
    
    public function checkLogin() {    
        if ( !$this->ses->session->has_userdata('CashierId') ||
             !$this->ses->session->has_userdata('CashierFirstname') ||
             !$this->ses->session->has_userdata('CashierLastname') ||
             !$this->ses->session->has_userdata('CashierToken')
            ) {
            $this->forceLogout();
            redirect(base_url().'accounting');
        }  
    }
    
    public function checkAuth(){
        if ( $this->ses->session->has_userdata('CashierId') &&
             $this->ses->session->has_userdata('CashierFirstname') &&
             $this->ses->session->has_userdata('CashierLastname') &&
             $this->ses->session->has_userdata('CashierToken')
            ) {
            redirect($this->base.'DashboardController/index');
        } 
    }
    
    public function forceLogout(){
        $adminUser = array(
            'CashierId' => '',
            'CashierFirstname' => '',
            'CashierLastname' => '',
            'CashierToken' => ''
        );
        $this->ses->session->unset_userdata($adminUser);
        $this->ses->session->sess_destroy();
    }   
}

?>
