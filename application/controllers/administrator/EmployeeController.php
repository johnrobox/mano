<?php

class EmployeeController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // check login authentication
        $this->auth->checkLogin();
        
        $this->load->model("AdminUser");
        $this->load->model("Employee");
        // get Login account info
        $this->login_id = $this->session->userdata("AdminId");
        $this->accountInfo = $this->AdminUser->getById($this->login_id);
        
        $this->load->library("Alert");
    }
    
    public function index() {
        $data = array(
            'page_title' => 'Register Employee',
            'account' => $this->accountInfo,
            'employees' => $this->Employee->getAll(),
            'script' => array('register-employee', 'update-employee'),
            'page_header' => 'Employees'
        );
        $this->load->view('administrator/default/header-link', $data);
        $this->load->view('administrator/default/navbar-top-link');
        $this->load->view('administrator/default/navbar-side-link');
        $this->load->view('administrator/pages/employee/employee');
        $this->load->view('administrator/modals/employee/register-employee');
        $this->load->view('administrator/modals/employee/update-employee');
        $this->load->view("administrator/modals/my_account/change-profile");
        $this->load->view('administrator/default/footer-link');
    }
    
    public function registerExec() {
        $validate = array(
            array(
                'field' => 'employee_firstname',
                'label' => 'Firstname',
                'rules' => 'required'
            ), 
            array(
                'field' => 'employee_lastname',
                'label' => 'Lastname',
                'rules' => 'required'
            ),
            array(
                'field' => 'employee_address',
                'label' => 'Address',
                'rules' => 'required'
            ),
            array(
                'field' => 'employee_gender',
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
            $firstname = $this->input->post("employee_firstname");
            $lastname = $this->input->post("employee_lastname");
            $address = $this->input->post("employee_address");
            $gender = $this->input->post("employee_gender");
            date_default_timezone_set("Asia/Manila");
            $employee_info = array(
                'employee_firstname' => $firstname,
                'employee_lastname' => $lastname,
                'employee_address' => $address,
                'employee_gender' => $gender,
                'employee_date_created' => date('Y-m-d h:i:s')
            );
            $result = $this->Employee->insertData($employee_info);
            if ($result == false) {
                $response = array(
                    'error' => true,
                    'type' => 'common',
                    'message' => 'ERROR : Cannot process your request! Please try again!'
                );
            } else {
                $response = array('error' => false);
                $this->session->set_flashdata('success', $this->alert->successAlert('Admin user successfully added.'));
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
            $address = $this->input->post("address");
            $gender = $this->input->post("gender");
            $data = array(
                'employee_firstname' => $firstname,
                'employee_lastname' => $lastname,
                'employee_address' => $address,
                'employee_gender' => $gender
            );
            $result = $this->Employee->updateById($id, $data);
            if ($result) {
                $response = array(
                    'error' => false
                );
            } else {
                $response = array(
                    'error' => true,
                    'is_common' => false,
                    'message' => 'Cannot update employee information! Maybe, nothing change, please try it again'
                );
            }
        }
        echo json_encode($response);
    }
    
    public function getEmployeeInfo() {
        $id = $this->input->post('id');
        $state = $this->input->post('state');
        $previous = $this->Employee->getFirstLastId("min");
        $next = $this->Employee->getFirstLastId("max");
        if ($state == 0){
            $result['customer'] = $this->Employee->getSingleData($id);
            $result['previous'] = $previous;
            $result['next'] = $next;
        } else if ($state == 1) {
            $result = $this->Employee->findPreviousNextById($id, "max", "<");
            $result['previous'] = $previous;
        } else if ($state == 2) {
            $result = $this->Employee->findPreviousNextById($id, "min", ">");
            $result['next'] = $next;
        }
        
        echo json_encode($result);
    }
    
}