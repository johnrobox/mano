<?php

class LoginLogoutController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("Cashier");
        $this->load->library("Random");
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
                'cashier_username' => $this->input->post('username'),
                'cashier_password' => $this->input->post('password')
            );
            $login = $this->Cashier->checkExistWithReturn($loginData);
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
                    'cashier_last_login' => date('Y-m-d h:i:s'),
                    'cashier_token' => $login_token,
                    'cashier_login_status' => 1
                );
                $response = $this->Cashier->updateById($id, $log_data);
                if ($response ==  true) {
                    $session = array(
                        'CashierId' => $id,
                        'CashierFirstname' => $row->cashier_firstname,
                        'CashierLastname' => $row->cashier_lastname,
                        'CashierToken' => $login_token
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
    
    public function logoutExec() {
        date_default_timezone_set("Asia/Manila");
        $cashier_id = $this->session->userdata('CashierId');
        $cashier_last_logout = date('Y-m-d h:i:s');

        $data = array(
            "cashier_login_status" => 0,
            "cashier_last_logout" => $cashier_last_logout
        );
        $result = $this->Cashier->updateById($cashier_id, $data);
        if ($result) {
             $this->auth->forceLogout();
             $response = array("logout" => true);
        } else {
             $response = array("logout" => false);
        }
    }
    
}
