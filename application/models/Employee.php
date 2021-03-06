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
    
    public function insertData($data){
        $this->db->insert($this->table, $data);
        return ($this->db->affected_rows()) ? true : false;
    }
    
    
    public function getAll() {
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
    public function getFirstLastId($states){
        $query = $this->db->query("SELECT id FROM ".$this->table." WHERE id=(SELECT ".$states."(id) FROM ".$this->table.")");
        $row = $query->row();
        return (isset($row)) ? $row->id : false;
    }
    
    public function getSingleData($customer_id) {
        $this->db->where('id', $customer_id);
        $query = $this->db->get($this->table);
        return $query->row();
    }
    
    public function findPreviousNextById($id, $states, $operator) {
        $query = $this->db->query("select * from ".$this->table." where id = (select $states(id) from ".$this->table." where id ".$operator." ".$id.")");
        $result['select'] = ($this->db->affected_rows() > 0 ) ? true : false;
        $result['employee'] = $query->result();
        return $result;
    }
        
    public function updateById($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return ($this->db->affected_rows() > 0 ) ? true : false;
    }
    
    public function changeStatus($id, $data) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
        return ($this->db->affected_rows() > 0 ) ? true : false;
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
    public function getById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    

}


