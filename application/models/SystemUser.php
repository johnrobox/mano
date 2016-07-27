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
        $this->table_joined = 'system_user_logs';
    }
    
    /*
     * get all join
     * @param $role (int)
     * @return object
     */
    public function get_all_join($role) {
        $field = array(
            'system_users.id',
            'user_firstname',
            'user_lastname',
            'user_username',
            'user_gender',
            'user_image',
            'user_created',
            'user_modified',
            'user_lastlogin',
            'user_lastlogout',
            'user_flag',
            'user_status'
        );
        $this->db->select($field);
        $this->db->from($this->table);
        $this->db->where('user_role', $role);
        $this->db->join($this->table_joined, $this->table_joined.'.user_id = '.$this->table.'.id');
        $query = $this->db->get();
        return $query->result();
    }
    
    /*
     * delete by id
     * @param $id (id)
     * @return $response (array)
     */
    public function delete_by_id($id) {
        $this->db->where('id', $id);
        $response['deleted'] = ($this->db->delete($this->table)) ? true : false;
        return $response;
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
     * update by id
     * @param $id (int), $data (array)
     * @return $response (array)
     */
    public function update_by_id($id, $data) {
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update($this->table, $data)) ? true : false;
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

