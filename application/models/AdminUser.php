<?php

class AdminUser extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->table = "admin_users";
        $this->table_join = "admin_user_logs";
    }
    
    public function register($data) {
        $this->db->insert($this->table, $data);
        if ($this->db->affected_rows() != 0) {
            $response = array(
                'success' => true,
                'last_id' => $this->db->insert_id()
            );
        } else {
            $response = array('success' => false);
        }
        return $response;
    }
    
    public function getList() {
        $query = $this->db->query(
                'SELECT '
                . $this->table.'.`id`, '
                . $this->table.'.`admin_firstname`, '
                . $this->table.'.`admin_lastname`, '
                . $this->table.'.`admin_email`, '
                . $this->table.'.`admin_gender`, '
                . $this->table.'.`admin_image`, '
                . $this->table_join.'.`admin_status`, '
                . $this->table_join.'.`admin_last_login`, '
                . $this->table_join.'.`admin_last_logout` '
                . ' FROM '
                . $this->table
                . ' JOIN '
                . $this->table_join
                . ' WHERE '
                . $this->table.'.`id` = '.$this->table_join.'.`admin_id`');
        return $query->result();
    }
    
    
    public function login($data) {
        $check = $this->db->get_where($this->table, $data);
        if ($check->num_rows() > 0) {
            $row = $check->row();
            $result = array(
                'valid' => true,
                'data' => $row
            );
        } else {
            $result['valid'] = false;
        }
        return $result;
    }
    
    public function logout($id, $data) {
        $this->db->where("admin_id", $id);
        $this->db->update($this->table_join, $data);
        return ($this->db->affected_rows()) ? true : false;
    }
    
    public function getById($id) {
        $this->db->where("id", $id);
        $query = $this->db->get($this->table);
        return $query->result();
    }
    
}