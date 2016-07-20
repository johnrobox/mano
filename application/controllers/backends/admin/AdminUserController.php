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

