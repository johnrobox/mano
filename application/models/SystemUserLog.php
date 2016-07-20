<?php

/* 
 * SystemUserLog
 * Author : Robert
 * Date : July 19 2016
 */

class SystemUserLog extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = 'system_user_logs';
    }
    
    /*
     * insert
     * @param $data (array)
     * @return $response (boolean)
     */
    public function insert($data) {
        $response['inserted'] = ($this->db->insert($this->table, $data)) ? true : false;
        return $response;
    }
    
    /*
     * update by user id
     * @param $id (int), $data (string)
     * @return $response (boolean)
     */
    public function update_by_user_id($id, $data) {
        $this->db->where('user_id', $id);
        $response['updated'] = ($this->db->update($this->table, $data)) ? true : false;
        return $response;
    }
    
    /*
     * get token by user id
     * @param $token (String)
     * @return $response (array)
     */
    public function get_token_by_user_id($id) {
        $this->db->where('user_id', $id);
        $this->db->select(array('user_token'));
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0) {
            $response = array(
                'has_token' => true,
                'token' => $query->row()
            );
        } else {
            $response['has_token'] = false;
        }
        return $response;
    }
    
}

