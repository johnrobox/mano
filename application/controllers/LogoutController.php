<?php

/* 
 * Logout Controller
 * Author : Robert
 * Date : JUly 20 2016
 */

class LogoutController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('SystemUserLog');
    }
    
    /*
     * index (logout link)
     * @param 
     * @return void
     */
    public function index() {
        $id = $this->session->userdata('system_logged_in')['SYSTEM_LOGIN_ID'];
        $log_data = array(
            'user_lastlogout' => date('Y-m-d H:i:s'),
            'user_flag' => 0
        );
        $update = $this->SystemUserLog->update_by_user_id($id, $log_data);
        if (!$update['updated']) {
            redirect(base_url().'logout');
            exit();
        } else {
            $this->session->unset_userdata('system_logged_in');
            $this->session->sess_destroy();
            redirect(base_url().'login');
            exit();
        }
    }
    
}

