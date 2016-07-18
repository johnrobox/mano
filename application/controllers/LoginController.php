<?php

/*
 * Login Controller ( login )
 * Author : Robert
 * Date : July 18 , 2016
 */

class LoginController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $data = array(
            'page_title' => 'Login'
        );
        $this->load->view('backend/common/header-link', $data);
        $this->load->view('backend/login');
        $this->load->view('backend/common/footer-link');
    }
    
    /*
     * login exec
     * @param 
     * @return void
     */
    public function login_exec() {
        $validate = array(
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'valid_email|required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ),
            array(
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'required'
            )
        );
        
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $email = trim($this->input->post('email'));
            $password = trim($this->input->post('password'));
            $role = $this->input->post('role');
            
        }
    }
    
}
