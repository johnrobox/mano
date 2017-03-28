<?php

class DashboardController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data = array(
            'page_title' => 'Accounting Dashboard'
        );
        $this->load->view("accounting/default/header", $data);
        $this->load->view("accounting/default/top");
        $this->load->view("accounting/default/menu");
        $this->load->view("accounting/pages/dashboard");
        $this->load->view("accounting/default/footer");
    }
    
}
