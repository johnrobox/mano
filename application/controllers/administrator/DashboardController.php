<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // check login authentication
        $this->auth->checkLogin();
        
        $this->load->model("AdminUser");
        // get Login account info
        $login_id = $this->session->userdata("AdminId");
        $this->accountInfo = $this->AdminUser->getById($login_id);
    }
    
    public function index() {
        $prefs['template'] = array(
                'table_open'           => '<table class="calendar table table-bordered table-hover">', 
                'cal_cell_start'       => '<td class="day">',
                'cal_cell_start_today' => '<td class="today" style="color: blue; font-size : 15px">'
        );

        $this->load->library('Calendar', $prefs);
        $data = array(
            'page_title' => 'Register Admin User',
            'account' => $this->accountInfo,
            'page_header' => 'Dashboard',
        );
        $this->load->view('administrator/default/header-link', $data);
        $this->load->view('administrator/default/navbar-top-link');
        $this->load->view('administrator/default/navbar-side-link');
        $this->load->view('administrator/pages/dashboard/index');
        $this->load->view("administrator/modals/my_account/change-profile");
        $this->load->view("administrator/modals/common/logout-confirmation");
        $this->load->view('administrator/default/footer-link');
    }
    
    
}
