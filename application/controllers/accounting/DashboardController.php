<?php

class DashboardController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // check login authentication
        $this->cashauth->checkLogin();
    }
    
    public function index() {
        $prefs['template'] = array(
                'table_open'           => '<table class="calendar table table-bordered table-hover">', 
                'cal_cell_start'       => '<td class="day">',
                'cal_cell_start_today' => '<td class="today" style="color: blue; font-size : 15px">'
        );

        $this->load->library('Calendar', $prefs);
        $data = array(
            'page_title' => 'Accounting Dashboard',
            'page' => 1
        );
        $this->load->view("accounting/default/header", $data);
        $this->load->view("accounting/default/top");
        $this->load->view("accounting/default/menu");
        $this->load->view("accounting/pages/dashboard/dashboard");
        $this->load->view("accounting/default/footer");
    }
    
}
