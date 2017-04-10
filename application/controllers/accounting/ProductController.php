<?php

class ProductController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data = array(
            'page_title' => 'Accounting Products'
        );
        $this->load->view("accounting/default/header", $data);
        $this->load->view("accounting/default/top");
        $this->load->view("accounting/default/menu");
        $this->load->view("accounting/pages/products");
        $this->load->view("accounting/default/footer");
    }
    
    
}