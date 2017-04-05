<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class AdminUserController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model("AdminUser");
        $this->load->model("AdminUserLog");
        $this->load->library("Alert");
        
        // get Login account info
        $login_id = $this->session->userdata("AdminId");
        $this->accountInfo = $this->AdminUser->getById($login_id);
    }
    
    public function register() {
        $data = array(
            'page_title' => 'Register Admin User',
            'account' => $this->accountInfo,
            'page_header' => 'Register Administrator'
        );
        $this->load->view('administrator/default/header-link', $data);
        $this->load->view('administrator/default/navbar-top-link');
        $this->load->view('administrator/default/navbar-side-link');
        $this->load->view('administrator/pages/admin_user/register-admin');
        $this->load->view("administrator/modals/my_account/change-profile");
        $this->load->view("administrator/modals/common/logout-confirmation");
        $this->load->view('administrator/default/footer-link');
    }
    
    public function registerExec() {
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
                'rules' => 'required|is_unique[admin_users.admin_username]'
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[6]'
            ),
            array(
                'field' => 'password_conf',
                'label' => 'Repeat Password',
                'rules' => 'required|matches[password]'
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required|is_unique[admin_users.admin_email]|valid_email'
            ),
            array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false) {
             $this->register();
        } else {
            $firstname = $this->input->post("firstname");
            $lastname = $this->input->post("lastname");
            $username = $this->input->post("username");
            $password = $this->input->post("password");
            $email = $this->input->post("email");
            $gender = $this->input->post("gender");
            $data = array(
                'admin_firstname' => $firstname,
                'admin_lastname' => $lastname,
                'admin_username' => $username,
                'admin_email' => $email,
                'admin_password' => md5(md5($password)),
                'admin_gender' => $gender
            );
            $result = $this->AdminUser->register($data);
            if ($result['success']) {
                $last_id = $result['last_id'];
                date_default_timezone_set("Asia/Manila");
                $log_data = array(
                    'admin_id' => $last_id,
                    'admin_created' => date('Y-m-d h:i:s')
                );
                $result_log = $this->AdminUserLog->insertLog($log_data);
                if ($result_log)
                    $this->session->set_flashdata('success', $this->alert->successAlert('Admin user successfully added.'));
                else
                    $this->session->set_flashdata('error', $this->alert->warningAlert('Account created but cannot create log!'));
            } else {
                $this->session->set_flashdata('error', $this->alert->dangerAlert('Cannot complete actions!'));
            }
            redirect(base_url()."index.php/administrator/AdminUserController/register");
        }
    }
    
    public function adminList() {
        $data = array(
            'page_title' => 'Register Admin User',
            'account' => $this->accountInfo,
            'page_header' => 'Admin User List',
            'admin_list' => $this->AdminUser->getList()
        );
        $this->load->view('administrator/default/header-link', $data);
        $this->load->view('administrator/default/navbar-top-link');
        $this->load->view('administrator/default/navbar-side-link');
        $this->load->view('administrator/pages/admin_user/admin-user-list');
        $this->load->view("administrator/modals/my_account/change-profile");
        $this->load->view("administrator/modals/common/logout-confirmation");
        $this->load->view('administrator/default/footer-link');
    }
    
}
