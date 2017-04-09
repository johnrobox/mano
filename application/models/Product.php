<?php

class Product extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = 'products';
    }
    
    public function deleteById($id) {
        $this->db->delete($this->table, array('id' => $id));
        return ($this->db->affected_rows()) ? true : false;
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
        $result['product'] = $query->result();
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
    
}

