<?php

/* 
 * AdminUserController
 * Author : Robert
 * Date : July 20 2016
 */

class AdminUserController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->account = $this->session->userdata('system_logged_in');
        if (!$this->session->has_userdata('system_logged_in') && !$this->session->userdata('system_logged_in')) 
            redirect(base_url().'login');
        if ( $this->account['SYSTEM_LOGIN_ROLE'] != 1)
            redirect(base_url().'login');
        $this->load->model('SystemUser');
        $this->load->model('SystemUserLog');
        $this->load->library('alert');
        $this->accountInfo = $this->SystemUser->get_by_id($this->account['SYSTEM_LOGIN_ID']);
    }
    
    /*
     * settings
     * @param
     * @return void
     */
    public function settings() {
        $data = array(
            'page_title' => 'Administrator Settings',
            'account' => $this->accountInfo
        );
        $this->load->view('backend/common/header-link', $data);
        $this->load->view('backend/admin/navbar-top-link');
        $this->load->view('backend/admin/navbar-side-link');
        $this->load->view('backend/admin/user-settings');
        $this->load->view('backend/modal/update-profile');
        $this->load->view('backend/modal/update-password');
        $this->load->view('backend/common/footer-link');
    }
    
    /*
     * settings exec
     * @param
     * @return void
     * Date : July 21,  2016
     */
    public function settings_exec() {
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
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            )
        );
        
        $this->form_validation->set_rules($validate);
        if ($this->form_validation->run() ==  false) {
            $this->settings();
        } else {
            $error_msg = 'Cannot update your account, better to logout first and then login again!';
            //sanitize data
            $firstname = trim($this->input->post('firstname'));
            $lastname = trim($this->input->post('lastname'));
            $username = trim($this->input->post('username'));
            $gender = trim($this->input->post('gender'));
            // login id
            $id = $this->account['SYSTEM_LOGIN_ID'];
            // login token
            $loginToken = $this->account['SYSTEM_LOGIN_TOKEN'];
            // get save token
            $get_token = $this->SystemUserLog->get_token_by_user_id($id);
            if (!$get_token['has_token']) {
                $this->session->set_flashdata('error', $this->alert->show($error_msg, 0));
            } else {
                if ($loginToken != $get_token['token']->user_token){
                    $this->session->set_flashdata('error', $this->alert->show($error_msg, 0));
                } else {
                    $data_to_update = array(
                        'user_firstname' => $firstname,
                        'user_lastname' => $lastname,
                        'user_username' => $username,
                        'user_gender' => $gender
                    );
                    $update = $this->SystemUser->update_by_id($id, $data_to_update);
                    if (!$update['updated']) {
                        $this->session->set_flashdata('error', $this->alert->show($error_msg, 0));
                    } else {
                        $data_to_update_log = array(
                            'user_modified' => date('Y-m-d H:i:s')
                        );
                        $this->SystemUserLog->update_by_user_id($id, $data_to_update_log);
                        $this->session->set_flashdata('success', $this->alert->show('Account update successfully!', 1));
                    }
                }
            }
            redirect(base_url().'admin/admin-settings');
            exit();
        }
    }


    /*
     * change profile
     * @param 
     * @return 
     */
    public function change_profile() {
        $error_msg = 'Error In uploading profile image!';
        $id = $this->account['SYSTEM_LOGIN_ID'];
        $token = $this->account['SYSTEM_LOGIN_TOKEN'];
        // sanitize image
        $image = $_FILES['profile_image'];
        if (empty($image['name'])) {
            $response['error'] = $error_msg. 'no name';
        } else {
            // get old image 
            $old_profile = $this->SystemUser->get_old_profile($id);
            if(!$old_profile['had_profile']) {
                $response['error'] = $error_msg. ' cannot get old prof';
            } else{
                // ready to update
                $get_token = $this->SystemUserLog->get_token_by_user_id($id);
                if (!$get_token['has_token']) {
                    $response['error'] = $error_msg. ' connot get token';
                } else {
                    $save_token = $get_token['token']->user_token;
                    if ($save_token != $token) {
                        $response['error'] = $error_msg. ' token not equal';
                    } else {
                        $new_image_name = $id.'_profile_'.$image['name'];
                        $update_profile = $this->SystemUser->update_profile($id, $new_image_name);
                        if (!$update_profile['updated']) {
                            $response['error'] = $error_msg. 'Cannot update to database';
                        } else {
                            // check old file if exist
                            echo '<h1>'.$old_profile['image_profile']->user_image.'</h1>';
                            if (file_exists('images/admin/uploads/'.$old_profile['image_profile']->user_image)) {
                                unlink('images/admin/uploads/'.$old_profile['image_profile']->user_image);
                            }
                            move_uploaded_file($image['tmp_name'], 'images/admin/uploads/'.$new_image_name);
                            $this->session->set_flashdata('success', $this->alert->show('Profile image update success!', 1));
                        }
                    }
                }
            }
        }
        echo json_encode($response);
    }
    
}

