<?php

/* 
 * DashboardController
 * Author : Robert
 * Date : July 18 2016
 */

class DashboardController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->load->view('backend/common/header-link');
        $this->load->view('backend/admin/navbar-top-link');
        $this->load->view('backend/admin/navbar-side-link');
        $this->load->view('backend/admin/dashboard');
        $this->load->view('backend/common/footer-link');
    }
    
}
