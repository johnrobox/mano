<?php

/* 
 * Employee
 * Author : Robert
 * Date : July 28 2016
 */

class Employee extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = 'employees';
    }
    
    /*
     * insert
     * @params $data (array)
     * @return $response (array)
     */
    public function insert($data){
        $response['added'] = ($this->db->insert($this->table, $data)) ? true : false;
        return $response;
    }
    
    /*
     * get all
     * @params
     * @return (object)
     */
    public function get_all() {
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    /*
     * change status by id
     * @params $id (int), $status (int)
     * @return response (array)
     */
    public function change_status_by_id($id, $status) {
        $this->db->where('id', $id);
        $response['changed'] = ($this->db->update($this->table, array('employee_status' => $status)));
        return $response;
    }
    
    /*
     * delete by id
     * @params $id(int)
     * @return $response (array)
     */
    public function delete_by_id($id) {
        $this->db->where('id', $id);
        $response['deleted'] = ($this->db->delete($this->table)) ? true : false;
        return $response;
    }
    
    /*
     * get by id
     * @params $id(int)
     * @return $response (object)
     */
    public function get_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    /*
     * update by id
     * @params $id (int), $data (array)
     * @return $response (object)
     */
    public function update_by_id($id, $data) {
        $this->db->where('id', $id);
        $response['updated'] = ($this->db->update($this->table, $data)) ? true : false;
        return $response;
    }
}


