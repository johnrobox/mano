<?php

class CashierPanelController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data = array(
            'page_title' => 'Accounting Cashier Panel',
            'page' => 2
        );
        $this->load->view("accounting/default/header", $data);
        $this->load->view("accounting/default/top");
        $this->load->view("accounting/default/menu");
        $this->load->view("accounting/pages/cashier-panel/cashier-panel");
        $this->load->view("accounting/default/footer");
    }
    
}