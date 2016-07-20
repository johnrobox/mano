<?php

/* 
 * SystemUser
 * Author : Robert
 * Date : July 19 2016
 */

class SystemUser extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = 'system_users';
    }
    
    /*
     * Insert 
     * @param $data (array)
     * @return $response (array)
     */
    public function insert($data) {
        if ($this->db->insert($this->table, $data)) {
            $response = array(
                'registered' => true,
                'registered_id' => $this->db->insert_id()
            );
        } else {
            $response['registered'] = false;
        }
        return $response;
    }
    
    /*
     * Get by username
     * @param $username (String)
     * @return 
     */
    public function get_by_username($username) {
        $this->db->where('user_username', $username);
        $query = $this->db->get($this->table);
        if ($query->num_rows() <= 0) {
            $login['valid'] = false;
        } else {
            $login = array(
                'valid' => true,
                'data' => $query->result()
            );
        }
        return $login;
    }
    
    /*
     * Get by id
     * @param $id (int)
     * @return $response (object)
     */
    public function get_by_id($id) {
        $this->db->where('id', $id);
        $this->db->select(array('user_firstname', 'user_lastname', 'user_username', 'user_gender', 'user_image'));
        $query = $this->db->get($this->table);
        $response = $query->result();
        return $response;
    }
    
    /*
     * get old profile
     * @param $id (int)
     * @return $response (array)
     */
    public function get_old_profile($id) {
        $this->db->where('id', $id);
        $this->db->select(array('user_image'));
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            $response = array(
                'had_profile' => true,
                'image_profile' => $query->row()
            );
        } else {
            $response['had_profile'] = false;
        }
        return $response;
    }
    
    /*
     * update profile
     * @param $id(int), $token(string), $image(string)
     * @return 
     */
    public function update_profile($id, $image) {
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update($this->table, array('user_image' => $image))) ? true : false;
        return $response;
    }
    
}

