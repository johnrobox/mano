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
    
}

