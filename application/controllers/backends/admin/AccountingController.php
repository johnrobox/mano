<?php

/* 
 * Accounting Controller
 * Author : Robert
 * Date : July 25 2016
 */

class AccountingController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('SystemUser');
        $this->load->model('SystemUserLog');
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
            'page_title' => 'Register Accounting User',
            'account' => $this->accountInfo
        );
        $this->load->view('backend/common/header-link', $data);
        $this->load->view('backend/admin/navbar-top-link');
        $this->load->view('backend/admin/navbar-side-link');
        $this->load->view('backend/admin/register-accounting-user');
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
        } else {
            $firstname = trim($this->input->post('firstname'));
            $lastname = trim($this->input->post('lastname'));
            $username = trim($this->input->post('username'));
            $password = $this->input->post('password');
            $gender = $this->input->post('gender');
            $admin_data = array(
                'user_firstname' => $firstname,
                'user_lastname' => $lastname,
                'user_username' => $username,
                'user_password' => password_hash($password, PASSWORD_BCRYPT),
                'user_gender' => $gender,
                'user_role' => 2
            );
            
            $insert = $this->SystemUser->insert($admin_data);
            if (!$insert['registered']) {
                $this->session->set_flashdata('error', $this->alert->show('Cannot register account!', 0));
            } else {
                $admin_data_log = array(
                    'user_id' => $insert['registered_id'],
                    'user_created' => date('Y-m-d H:i:s')
                );
                $insert_log = $this->SystemUserLog->insert($admin_data_log);
                if (!$insert_log['inserted']) {
                    $this->session->set_flashdata('error', $this->alert->show('Cannot complete account registration!', 0));
                } else {
                    $this->session->set_flashdata('success', $this->alert->show('Admin user added success!', 1));
                }
            }
            redirect(base_url().'admin/register-accounting-user');
            exit();
        }
    }
    
    
}

