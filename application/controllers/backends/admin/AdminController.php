<?php

/* 
 * AdminController
 * Author : Robert
 * Date : July 16, 2016
 */

class AdminController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    /*
     * Regiter admin user
     * @param 
     * @return void
     */
    public function register() {
        $data = array(
            'page_title' => 'Register Admin User'
        );
        
        $this->load->view('backend/common/header-link', $data);
        $this->load->view('backend/admin/navbar-top-link');
        $this->load->view('backend/admin/navbar-side-link');
        $this->load->view('backend/admin/register-admin');
        $this->load->view('backend/common/footer-link');
    }
    
    /*
     * Register admin user exec
     * @param 
     * @return void
     */
    public function register_exec() {
        $validate = array(
            array(
                'field' => 'firstname', 
                'label' => 'Firstname',
                'rules' => 'required'
            ),
            array(
                'field' => 'lastname',
                'label' => 'Lastname',
                'rules' => 'required'
            ),
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|is_unique[system_users.user_username]|min_length[5]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]'
            ),
            array(
                'field' => 'password_conf',
                'label' => 'Confirm Password',
                'rules' => 'required|matches[password]'
            ),
            array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required|in_list[1,2]'
            )
        );
        
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $this->register();
        }
    }
    
}

