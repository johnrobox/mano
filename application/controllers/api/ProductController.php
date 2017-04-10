<?php

class ProductController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Product");
    }
    
    public function getProductList() {
        $response = array();
        $products = $this->Product->getListAPI();
        foreach($products as $product) {
            $prod_size_measure = $product->product_size_measure;
            
            if ($prod_size_measure == 1) {
                $size_measure = "inch)";
            } else if ($prod_size_measure == 2) {
                $size_measure =  "centemeter)";
            } else if ($prod_size_measure == 3) {
                $size_measure =  "meter)";
            } else if ($prod_size_measure == 4) {
                $size_measure =  "liter)";
            } else {
                $size_measure =  "";
            }
            
            if ($product->product_size_number != 0.00){
                $prod_size_number = "(".$product->product_size_number."-";
            } else {
                $prod_size_number = "";
            }
            
            $product_complete_name = $product->product_name. " ".$prod_size_number .$size_measure;
            $response[] = array(
                'id' => $product->id,
                'product_name' => $product,
                'product_complete_name' => $product_complete_name
            );
        }
        echo json_encode($response);
    }
    
}