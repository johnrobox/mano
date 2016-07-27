<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EmployeeController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('SystemUser');
        $this->load->model('SystemUserLog');
        $this->load->library('alert');
        $this->account = $this->session->userdata('system_logged_in');
        $this->accountInfo = $this->SystemUser->get_by_id($this->account['SYSTEM_LOGIN_ID']);
    }
    
    public function register() {
        $data = array(
            'page_title' => 'Register Employee',
            'account' => $this->accountInfo
        );
        $this->load->view('backend/common/header-link', $data);
        $this->load->view('backend/admin/navbar-top-link');
        $this->load->view('backend/admin/navbar-side-link');
        $this->load->view('backend/admin/register-employee');
        $this->load->view('backend/common/footer-link');
    }
}