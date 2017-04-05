<?php

class ProductController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // check login authentication
        $this->auth->checkLogin();
        
        $this->load->model("AdminUser");
        $this->load->model("Product");
        // get Login account info
        $this->login_id = $this->session->userdata("AdminId");
        $this->accountInfo = $this->AdminUser->getById($this->login_id);
        
        $this->load->library("Alert");
    }
    
    public function index() {
        $data = array(
            'page_title' => 'Admin - Product',
            'account' => $this->accountInfo,
            'products' => $this->Product->getAll(),
            'script' => array(
                'product/register-product', 
                'product/update-product',
                'product/view-info-product',
                'product/change-status-product'
                ),
            'page_header' => 'Products'
        );
        $this->load->view('administrator/default/header-link', $data);
        $this->load->view('administrator/default/navbar-top-link');
        $this->load->view('administrator/default/navbar-side-link');
        $this->load->view('administrator/pages/product/product');
        $this->load->view('administrator/modals/product/register-product');
        $this->load->view('administrator/modals/product/update-product');
        $this->load->view("administrator/modals/product/view-info-product");
        $this->load->view("administrator/modals/my_account/change-profile");
        $this->load->view("administrator/modals/common/logout-confirmation");
        $this->load->view('administrator/default/footer-link');
    }
    
    public function registerExec() {
        $validate = array(
            array(
                'field' => 'product_name',
                'label' => 'Product Name',
                'rules' => 'required'
            ), 
            array(
                'field' => 'product_price',
                'label' => 'Product Price',
                'rules' => 'required'
            ),
            array(
                'field' => 'product_sold',
                'label' => 'Sold in : ',
                'rules' => 'required'
            ),
            array(
                'field' => 'product_quantity',
                'label' => 'Quantity',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $response = array(
                'error' => true,
                'type' => 'required',
                'message' => $this->form_validation->error_array()
            );
        } else {
            $product_name = $this->input->post("product_name");
            $product_price = $this->input->post("product_price");
            $product_sold = $this->input->post("product_sold");
            $product_quantity = $this->input->post("product_quantity");
            $product_size_number = $this->input->post("product_size_number");
            $product_size_measure = $this->input->post("product_size_measure");
            date_default_timezone_set("Asia/Manila");
            $product_info = array(
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_sold_in' => $product_sold,
                'product_quantity' => $product_quantity,
                'product_size_number' => $product_size_number,
                'product_size_measure' => $product_size_measure,
                'product_created' => date('Y-m-d h:i:s')
            );
            $result = $this->Product->insertData($product_info);
            if ($result == false) {
                $response = array(
                    'error' => true,
                    'type' => 'common',
                    'message' => 'ERROR : Cannot process your request! Please try again!'
                );
            } else {
                $response = array('error' => false);
                $this->session->set_flashdata('success', $this->alert->successAlert('Product successfully added.'));
            }
        }
        echo json_encode($response);
    }
    
    public function updateExec() {
        $validate = array(
            array(
                'field' => 'product_name',
                'label' => 'Product Name',
                'rules' => 'required'
            ),
            array(
                'field' => 'product_price',
                'label' => 'Product Price',
                'rules' => 'required'
            ),
            array(
                'field' => 'product_sold',
                'label' => 'Sold In',
                'rules' => 'required'
            ),
            array(
                'field' => 'product_quantity',
                'label' => 'Product Quantity',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $response = array(
                'error' => true,
                'is_common' => true,
                'message' => $this->form_validation->error_array()
            ); 
        } else {
            $id = $this->input->post("id");
            $name = $this->input->post("product_name");
            $price = $this->input->post("product_price");
            $sold = $this->input->post("product_sold");
            $quantity = $this->input->post("product_quantity");
            $size_number = $this->input->post("product_number");
            $size_measure = $this->input->post("product_measure");
            $data = array(
                'product_name' => $name,
                'product_price' => $price,
                'product_sold_in' => $sold,
                'product_quantity' => $quantity,
                'product_size_number' => $size_number,
                'product_size_measure' => $size_measure
            );
            $result = $this->Product->updateById($id, $data);
            if ($result) {
                date_default_timezone_set("Asia/Manila");
                $this->Product->updateById($id, array('product_modified' => date('Y-m-d h:i:s')));
                $response = array(
                    'error' => false
                );
            } else {
                $response = array(
                    'error' => true,
                    'is_common' => false,
                    'message' => 'Cannot update product information! Maybe, nothing change, please try it again'
                );
            }
        }
        echo json_encode($response);
    }
    
    public function getProductInfo() {
        $id = $this->input->post('id');
        $state = $this->input->post('state');
        $previous = $this->Product->getFirstLastId("min");
        $next = $this->Product->getFirstLastId("max");
        if ($state == 0){
            $result['product'] = $this->Product->getSingleData($id);
            $result['previous'] = $previous;
            $result['next'] = $next;
        } else if ($state == 1) {
            $result = $this->Product->findPreviousNextById($id, "max", "<");
            $result['previous'] = $previous;
        } else if ($state == 2) {
            $result = $this->Product->findPreviousNextById($id, "min", ">");
            $result['next'] = $next;
        }
        
        echo json_encode($result);
    }
    
    public function changeStatus() {
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        $result = $this->Product->changeStatus($id, array('product_status' => $status));
        if ($result) {
            $response = array(
                'error' => false,
                'message' => 'Product status change successfully!'
            );
        } else {
            $response = array(
                'error' => true,
                'message' => 'Cannot change status! Please try it again!'
            );
        }
        echo json_encode($response);
    }
    
}