<?php

class ProductController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Product");
    }
    
    public function index() {
        $data = array(
            'page_title' => 'Accounting Products',
            'page' => 3,
            'products' => $this->Product->getAll(),
            'datatable' => true
        );
        $this->load->view("accounting/default/header", $data);
        $this->load->view("accounting/default/top");
        $this->load->view("accounting/default/menu");
        $this->load->view("accounting/pages/product/products");
        $this->load->view("accounting/modals/my_account/logout");
        $this->load->view("accounting/default/footer");
    }
    
    
}