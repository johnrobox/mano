<?php

class AdminUser extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = "admin_users";
    }
    
    public function register($data) {
        $this->db->insert($this->table, $data);
        $result = ($this->db->affected_rows() != 0) ? $this->db->insert_id() : 0;
        return $result;
    }
}
