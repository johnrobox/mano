<?php

class LoginLogoutController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function login() {
        $data["page_title"] = "Accounting Login";
        $this->load->view("accounting/default/header-login", $data);
        $this->load->view("accounting/pages/login");
        $this->load->view("accounting/default/footer-login");
    }
    
    public function loginExec() {
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
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false){
            $response = array(
                'error' => true,
                'type' => 'required',
                'message' => $this->form_validation->error_array()
            );
        } else {
            $loginData = array(
                'admin_username' => $this->input->post('username'),
                'admin_password' => md5(md5($this->input->post('password')))
            );
            $login = $this->AdminUser->login($loginData);
            if ($login['valid'] == false) {
                $response = array(
                    'error' => true,
                    'type' => 'common',
                    'message' => 'Invalid Email / Password'
                );
            } else {
                $row = $login['data'];
                $id = $row->id;
                $login_token = $this->random->generateRandomString(88);
                date_default_timezone_set("Asia/Manila");
                $log_data = array(
                    'admin_last_login' => date('Y-m-d h:i:s'),
                    'admin_token' => $login_token,
                    'admin_status' => 1
                );
                $response = $this->AdminUserLog->update($id, $log_data);
                if ($response ==  true) {
                    $session = array(
                        'AdminId' => $id,
                        'AdminFirstname' => $row->admin_firstname,
                        'AdminLastname' => $row->admin_lastname,
                        'AdminEmail' => $row->admin_email,
                        'AdminToken' => $login_token
                    );
                    $response = array(
                        'error' => false
                    );
                    $this->session->set_userdata($session);
                } else {
                    $response = array(
                        'error' => true,
                        'type' => 'common',
                        'message' => 'Cannot login your account'
                    );
                }
            }
        }
        echo json_encode($response);
    }
    
}
