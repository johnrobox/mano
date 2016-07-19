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
     * update ]
     * @param $id (int), $data (string)
     * @return $response (boolean)
     */
    public function update_by_user_id($id, $data) {
        $this->db->where('user_id', $id);
        $response['updated'] = ($this->db->update($this->table, $data)) ? true : false;
        return $response;
    }
    
}

