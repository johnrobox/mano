<?php

class AccountController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        // check login authentication
        $this->auth->checkLogin();
        
        $this->load->model("AdminUser");
        $this->load->model("AdminUserLog");
        // get Login account info
        $this->login_id = $this->session->userdata("AdminId");
        $this->accountInfo = $this->AdminUser->getById($this->login_id);
        
        $this->load->library("Alert");
    }
    
    public function accountSetting() {
        $data = array(
            'page_title' => 'Register Admin User',
            'account' => $this->accountInfo,
            'script' => array('change-password'),
            'page_header' => 'Account settings',
        );
        $this->load->view('administrator/default/header-link', $data);
        $this->load->view('administrator/default/navbar-top-link');
        $this->load->view('administrator/default/navbar-side-link');
        $this->load->view('administrator/pages/my_account/settings');
        $this->load->view("administrator/modals/common/logout-confirmation");
        $this->load->view("administrator/modals/my_account/change-password");
        $this->load->view('administrator/default/footer-link');
    }
    
    public function accountProfile() {
        $data = array(
            'page_title' => 'Register Admin User',
            'account' => $this->accountInfo,
            'page_header' => 'Account profile',
        );
        $this->load->view('administrator/default/header-link', $data);
        $this->load->view('administrator/default/navbar-top-link');
        $this->load->view('administrator/default/navbar-side-link');
        $this->load->view('administrator/pages/my_account/profile');
        $this->load->view("administrator/modals/common/logout-confirmation");
        $this->load->view('administrator/default/footer-link');
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
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ),
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ),
            array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            )
        );
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() == false){
            $this->accountSetting();
        } else {
            $firstname = $this->input->post("firstname");
            $lastname = $this->input->post("lastname");
            $username = $this->input->post("username");
            $email = $this->input->post("email");
            $gender = $this->input->post("gender");
            $data = array(
                'admin_firstname' => $firstname,
                'admin_lastname' => $lastname,
                'admin_username' => $username,
                'admin_email' => $email,
                'admin_gender' => $gender
            );
            $result = $this->AdminUser->updateById($this->login_id, $data);
            if ($result) {
                date_default_timezone_set("Asia/Manila");
                $this->AdminUserLog->update($this->login_id, array('admin_modified' => date('Y-m-d h:i:s')));
                $this->session->set_flashdata('success', $this->alert->successAlert('Your account are successfully updated.'));
            } else {
                $this->session->set_flashdata('error', $this->alert->warningAlert('Cannot update your account! Please try it again!'));
            }
            redirect(base_url().'index.php/administrator/AccountController/accountSetting');
        }
    }
    
    
    public function changePasswordExec() {
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
        if ($this->form_validation->run() == false){
            $response = array(
                'error' => true,
                'type' => 'required',
                'message' => $this->form_validation->error_array()
            );
        } else {
            $old_password = $this->input->post("old_password");
            $new_password = $this->input->post("new_password");
            $result = $this->AdminUser->checkExistWithReturn(array('admin_password' => md5(md5($old_password))));
            if ($result['valid']) {
                $update_password = $this->AdminUser->updateById($this->login_id, array('admin_password' => md5(md5($new_password))));
                if ($update_password) 
                    $response = array('error' => false);
                else 
                    $response = array(
                        'error' => true,
                        'type' => 'common',
                        'message' => 'Cannot update password! Please try it again.'
                    );
            } else {
                $response = array(
                    'error' => true,
                    'type' => 'common',
                    'message' => 'Your old password is incorrect.'
                );
            }
        }
        echo json_encode($response);
    }
     
}