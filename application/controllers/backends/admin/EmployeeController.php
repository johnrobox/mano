<?php

/* 
 * Employee controller
 * Author : Robert
 * Date : July 28 2016
 */

class EmployeeController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('SystemUser');
        $this->load->model('Employee');
        $this->load->library('alert');
        $this->account = $this->session->userdata('system_logged_in');
        $this->accountInfo = $this->SystemUser->get_by_id($this->account['SYSTEM_LOGIN_ID']);
    }
    
    /*
     * register
     * @params 
     * @return void
     */
    public function register() {
        $data = array(
            'page_title' => 'Register Employee',
            'account' => $this->accountInfo
        );
        $this->load->view('backend/common/header-link', $data);
        $this->load->view('backend/admin/navbar-top-link');
        $this->load->view('backend/admin/navbar-side-link');
        $this->load->view('backend/admin/register-employee');
        $this->load->view('backend/common/footer-link');
    }
    
    /*
     * register exec
     * @params
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
                'field' => 'address',
                'label' => 'Address',
                'rules' => 'required'
            ),
            array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            ),
            array(
                'field' => 'birthdate',
                'label' => 'Birthdate',
                'rules' => 'required'
            ),
            array(
                'field' => 'date_employed',
                'label' => 'Date Employed',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
            $this->register();
        } else {
            $firstname = trim($this->input->post('firstname'));
            $lastname = trim($this->input->post('lastname'));
            $address = trim($this->input->post('address'));
            $gender = $this->input->post('gender');
            $birthdate = $this->input->post('birthdate');
            $date_employed = $this->input->post('date_employed');
            $employee =  array(
                'employee_firstname' => $firstname,
                'employee_lastname' => $lastname,
                'employee_address' => $address,
                'employee_gender' => $gender,
                'employee_birthdate' => $birthdate,
                'employee_date_employed' => $date_employed,
                'employee_status' => 1
            );
            $insert = $this->Employee->insert($employee);
            if (!$insert['added']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot add employee!', 0));
            } else {
                $this->session->set_flashdata('success', $this->alert->show('Employee add success!', 1));
            }
            redirect(base_url().'admin/register-employee');
            exit();
        }
    } 
    
    /*
     * employee list
     * @param
     * @return void
     */
    public function employee_list() {
        $employess = $this->Employee->get_all();
        $data = array(
            'page_title' => 'Employee List',
            'account' => $this->accountInfo,
            'employees' => $employess
        );
        $this->load->view('backend/common/header-link', $data);
        $this->load->view('backend/admin/navbar-top-link');
        $this->load->view('backend/admin/navbar-side-link');
        $this->load->view('backend/admin/employee-list');
        $this->load->view('backend/modal/change-status');
        $this->load->view('backend/modal/delete');
        $this->load->view('backend/modal/update-employee');
        $this->load->view('backend/common/footer-link');
    }
    
    /*
     * change status
     * @params 
     * @return 
     */
    public function change_status() {
        $id = $this->input->post('id');
        $current_status = $this->input->post('status');
        $new_status = ($current_status == 1) ? 0 : 1;
        $change_status = $this->Employee->change_status_by_id($id, $new_status);
        if (!$change_status['changed']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot change status!', 0));
        } else {
            $this->session->set_flashdata('success', $this->alert->show('Change status success!', 1));
        }
    }
    
    /*
     * delete
     * @params
     * @return 
     */
    public function delete() {
        $id = $this->input->post('id');
        $delete = $this->Employee->delete_by_id($id);
        if (!$delete['deleted']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot delete!', 0));
        } else {
            $this->session->set_flashdata('success', $this->alert->show('Delete success!', 1));
        }
    }
    
    /*
     * single
     * @params
     * @return json
     */
    public function single() {
        $id = $this->input->post('id');
        $get = $this->Employee->get_by_id($id);
        echo json_encode($get);
    }
    
    /*
     * update
     * @params
     * @return void
     */
    public function update() {
        $id = $this->input->post('id');
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $address = $this->input->post('address');
        $gender = $this->input->post('gender');
        $birthdate = $this->input->post('birthdate');
        $date_employed = $this->input->post('date_employed');
        $data = array(
            'employee_firstname' => $firstname,
            'employee_lastname' => $lastname,
            'employee_address' => $address,
            'employee_gender' => $gender,
            'employee_birthdate' => $birthdate,
            'employee_date_employed' => $date_employed
        );
        $update = $this->Employee->update_by_id($id, $data);
        if (!$update['updated']) {
            $this->session->set_flashdata('error', $this->alert->show('Cannot update employee!', 0));
        } else {
            $this->session->set_flashdata('success', $this->alert->show('Update success!', 1));
        }
    }
    
}