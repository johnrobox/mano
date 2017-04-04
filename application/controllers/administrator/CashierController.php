<?php

class CashierController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // check login authentication
        $this->auth->checkLogin();
        
        $this->load->model("AdminUser");
        $this->load->model("Cashier");
        // get Login account info
        $this->login_id = $this->session->userdata("AdminId");
        $this->accountInfo = $this->AdminUser->getById($this->login_id);
        
        $this->load->library("Alert");
        $this->load->library("Random");
    }
    
    public function index() {
        $data = array(
            'page_title' => 'Admin - Cashier',
            'account' => $this->accountInfo,
            'cashiers' => $this->Cashier->getAll(),
            'script' => array(
                'cashier/register-cashier', 
                'cashier/update-cashier',
                'cashier/view-info-cashier',
                'cashier/change-status-cashier'
                ),
            'page_header' => 'cashier'
        );
        $this->load->view('administrator/default/header-link', $data);
        $this->load->view('administrator/default/navbar-top-link');
        $this->load->view('administrator/default/navbar-side-link');
        $this->load->view('administrator/pages/cashier/cashier');
        $this->load->view('administrator/modals/cashier/register-cashier');
        $this->load->view('administrator/modals/cashier/update-cashier');
        $this->load->view("administrator/modals/cashier/view-info-cashier");
        $this->load->view("administrator/modals/my_account/change-profile");
        $this->load->view('administrator/default/footer-link');
    }
    
    public function registerExec() {
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
                'rules' => 'required|is_unique[cashiers.cashier_username]'
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
            $firstname = $this->input->post("cashier_firstname");
            $lastname = $this->input->post("cashier_lastname");
            $username = $this->input->post("cashier_username");
            $address = $this->input->post("cashier_address");
            $gender = $this->input->post("cashier_gender");
            date_default_timezone_set("Asia/Manila");
            $cashier_info = array(
                'cashier_firstname' => $firstname,
                'cashier_lastname' => $lastname,
                'cashier_username' => $username,
                'cashier_password' => $this->random->generateRandomString(6),
                'cashier_address' => $address,
                'cashier_gender' => $gender,
                'cashier_created' => date('Y-m-d h:i:s')
            );
            $result = $this->Cashier->insertData($cashier_info);
            if ($result == false) {
                $response = array(
                    'error' => true,
                    'type' => 'common',
                    'message' => 'ERROR : Cannot process your request! Please try again!'
                );
            } else {
                $response = array('error' => false);
                $this->session->set_flashdata('success', $this->alert->successAlert('Cashier successfully added.'));
            }
        }
        echo json_encode($response);
    }
    
    public function updateExec() {
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
                'rules' => 'required'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ),
            array(
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required'
            ),
            array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $response = array(
                'error' => true,
                'is_common' => true,
                'message' => $this->form_validation->error_array()
            ); 
        } else {
            $id = $this->input->post("id");
            $firstname = $this->input->post("firstname");
            $lastname = $this->input->post("lastname");
            $username = $this->input->post('username');
            $password = $this->input->post("password");
            $address = $this->input->post("address");
            $gender = $this->input->post("gender");
            date_default_timezone_set("Asia/Manila");
            $data = array(
                'cashier_firstname' => $firstname,
                'cashier_lastname' => $lastname,
                'cashier_username' => $username,
                'cashier_password' => $password,
                'cashier_address' => $address,
                'cashier_gender' => $gender
            );
            $result = $this->Cashier->updateById($id, $data);
            if ($result) {
                $response = array(
                    'error' => false
                );
                $this->Cashier->updateById($id, array('cashier_modified' => date('Y-m-d h:i:s')));
            } else {
                $response = array(
                    'error' => true,
                    'is_common' => false,
                    'message' => 'Cannot update cashier information! Maybe, nothing change, please try it again'
                );
            }
        }
        echo json_encode($response);
    }
    
    public function getCashierInfo() {
        $id = $this->input->post('id');
        $state = $this->input->post('state');
        $previous = $this->Cashier->getFirstLastId("min");
        $next = $this->Cashier->getFirstLastId("max");
        if ($state == 0){
            $result['cashier'] = $this->Cashier->getSingleData($id);
            $result['previous'] = $previous;
            $result['next'] = $next;
        } else if ($state == 1) {
            $result = $this->Cashier->findPreviousNextById($id, "max", "<");
            $result['previous'] = $previous;
        } else if ($state == 2) {
            $result = $this->Cashier->findPreviousNextById($id, "min", ">");
            $result['next'] = $next;
        }
        
        echo json_encode($result);
    }
    
    public function changeStatus() {
        $id = $this->input->post("id");
        $status = $this->input->post("status");
        $result = $this->Cashier->changeStatus($id, array('cashier_status' => $status));
        if ($result) {
            $response = array(
                'error' => false,
                'message' => 'Cashier status change successfully!'
            );
        } else {
            $response = array(
                'error' => true,
                'message' => 'Cannot change status! Please try it again!'
            );
        }
        echo json_encode($response);
    }
    
}