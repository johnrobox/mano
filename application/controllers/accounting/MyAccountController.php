<?php

class MyAccountController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->cashauth->checkLogin();
        $this->load->model("Cashier");
        $this->id = $this->session->userdata("CashierId");
    }
    
    public function index() {
        $data = array(
            'page_title' => 'Accounting Dashboard',
            'page' => 7,
            'account' => $this->Cashier->getSingleData($this->id),
            'script' => array(
                'account-update'
            )
        );
        $this->load->view("accounting/default/header", $data);
        $this->load->view("accounting/default/top");
        $this->load->view("accounting/default/menu");
        $this->load->view("accounting/pages/my_account/index");
        $this->load->view("accounting/modals/my_account/change-password");
        $this->load->view("accounting/modals/my_account/logout");
        $this->load->view("accounting/default/footer");
    }
    
    public function update() {
        $validate = array(
            array(
                'field' => 'cashier_firstname',
                'label' => 'Firstname',
                'rules' => 'required'
            ), 
            array(
                'field' => 'cashier_lastname',
                'label' => 'Lastname',
                'rules' => 'required'
            ),
            array(
                'field' => 'cashier_username',
                'label' => 'Username',
                'rules' => 'required|min_length[6]'
            ),
            array(
                'field' => 'cashier_address',
                'label' => 'Address',
                'rules' => 'required'
            ),
            array(
                'field' => 'cashier_gender',
                'label' => 'Gender',
                'rules' => 'required'
            ) 
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $response = array(
                'error' => true,
                'type' => 'required',
                'message' => $this->form_validation->error_array()
            );
        } else {
            $firstname = $this->input->post('cashier_firstname');
            $lastname = $this->input->post('cashier_lastname');
            $username = $this->input->post('cashier_username');
            $address = $this->input->post('cashier_address');
            $gender = $this->input->post('cashier_gender');
            date_default_timezone_set("Asia/Manila");
            $data = array(
                'cashier_firstname' => $firstname,
                'cashier_lastname' => $lastname,
                'cashier_username' => $username,
                'cashier_address' => $address,
                'cashier_gender' => $gender
            );
            $result = $this->Cashier->updateById($this->id, $data);
            if ($result) {
                $response = array(
                    'error' => false
                );
                $this->Cashier->updateById($this->id, array('cashier_modified' => date('Y-m-d h:i:s')));
            } else {
                $response = array(
                    'error' => true,
                    'type' => "common",
                    'message' => 'Cannot update cashier information! Maybe, nothing change, please try it again'
                );
            }
        }
        echo json_encode($response);
    }
    
    public function getMyInfo() {
        $response = $this->Cashier->getSingleData($this->id);
        echo json_encode($response);
    }
    
    public function changePassword() {
        $validate = array(
            array(
                'field' => 'old_password',
                'label' => 'Old Password',
                'rules' => 'required'
            ),
            array(
                'field' => 'new_password',
                'label' => 'New Password',
                'rules' => 'required|min_length[6]'
            ),
            array(
                'field' => 'repeat_new_password',
                'label' => 'Repeat New Password',
                'rules' => 'required|matches[new_password]'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $response = array(
                'error' => true,
                'type' => 'required',
                'message' => $this->form_validation->error_array()
            );
        } else {
            $old_password = $this->input->post("old_password");
            $new_password = $this->input->post("new_password");
            $result = $this->Cashier->checkExistWithReturn(array('cashier_password' => $old_password));
            if ($result['valid']) {
                $data = array(
                    'cashier_modified' => date('Y-m-d h:i:s'),
                    'cashier_password' => $new_password
                        );
                $result = $this->Cashier->updateById($this->id, $data);
                if ($result) {
                    $response['error'] = false;
                } else {
                    $response = array(
                        'error' => true,
                        'message' => 'Cannot process request! Please try it again'
                    );
                }
            } else {
                $response = array(
                    'error' =>  true,
                    'message' => 'Old Password not correct!'
                );
            }
        }
        echo json_encode($response);
    }
    
}