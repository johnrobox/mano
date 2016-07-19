<?php

/*
 * Login Controller ( login )
 * Author : Robert
 * Date : July 18 , 2016
 */

class LoginController extends CI_Controller {
    
    private $login_error_msg = 'Invalid Email / Password';
    
    public function __construct() {
        parent::__construct();
        $this->load->model('SystemUser');
        $this->load->model('SystemUserLog');
        $this->load->library('alert');
        $this->load->library('generate');
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
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
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
            $username = trim($this->input->post('username'));
            $password = trim($this->input->post('password'));
            $role = $this->input->post('role');
            $check_username = $this->SystemUser->get_by_username($username);
            if (!$check_username['valid']) {
                $this->session->set_flashdata('error', $this->alert->show($this->login_error_msg, 0));
                redirect(base_url().'login');
                exit();
            } else {
                $account_password = $check_username['data'][0]->user_password;
                if (!password_verify($password, $account_password)) {
                    $this->session->set_flashdata('error', $this->alert->show($this->login_error_msg, 0));
                    redirect(base_url().'login');
                    exit();
                } else {
                    $account_role = $check_username['data'][0]->user_role;
                    if ($account_role != $role) {
                        $this->session->set_flashdata('error', $this->alert->show($this->login_error_msg .' role', 0));
                        redirect(base_url().'login');
                        exit();
                    } else {
                        $account_id = $check_username['data'][0]->id;
                        $token = $this->generate->getString(88);
                        // construct data in array to logs
                        $login_data_log = array(
                            'user_token' => $token,
                            'user_lastlogin' => date('Y-m-d H:i:s'),
                            'user_flag' => 1
                        );
                        $update_log = $this->SystemUserLog->update_by_user_id($account_id, $login_data_log);
                        if (!$update_log['updated']) {
                            $this->session->set_flashdata('error', $this->alert->show($this->login_error_msg, 0));
                            redirect(base_url().'login');
                            exit();
                        } else {
                            $ready_to_session = array(
                                'SYSTEM_LOGIN_STATUS' => true,
                                'SYSTEM_LOGIN_TOKEN' => $token,
                                'SYSTEM_LOGIN_ID' => $account_id,
                                'SYSTEM_LOGIN_ROLE' => $role
                            );
                            $this->session->set_userdata('system_logged_in', $ready_to_session);
                            redirect(base_url().'admin/dashboard');
                            exit();
                        }
                    }
                }
            }
        }
    }
    
}
