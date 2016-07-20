<?php

/* 
 * DashboardController
 * Author : Robert
 * Date : July 18 2016
 */

class DashboardController extends CI_Controller {
    
    /*
     * Date : July 20 2016
     */
    public function __construct() {
        parent::__construct();
        if (!$this->session->has_userdata('system_logged_in') && !$this->session->userdata('system_logged_in')) 
            redirect(base_url().'login');
        if ($this->session->userdata('system_logged_in')['SYSTEM_LOGIN_ROLE'] != 1)
            redirect(base_url().'login');
        $this->load->model('SystemUser');
        $this->accountInfo = $this->SystemUser->get_by_id($this->session->userdata('system_logged_in')['SYSTEM_LOGIN_ID']);
    }
    
    /*
     * index (for administrator dashboard)
     * @param
     * @return void
     */
    public function index() {
        $data = array(
            'page_title' => 'Administrator Dashboard',
            'account' => $this->accountInfo
        );
        $this->load->view('backend/common/header-link', $data);
        $this->load->view('backend/admin/navbar-top-link');
        $this->load->view('backend/admin/navbar-side-link');
        $this->load->view('backend/admin/dashboard');
        $this->load->view('backend/modal/update-profile');
        $this->load->view('backend/common/footer-link');
    }
    
}
