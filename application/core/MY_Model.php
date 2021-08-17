<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class MY_Model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    protected $table = null;
    protected $primary = null;
    protected $order = 'ASC';
    
    function get_all()
    {
        $this->db->order_by($this->primary, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    function get_cond($cond){
        //$cond is array condition
        $this->db->where($cond);
        $this->db->order_by($this->primary, $this->order);
        return $this->db->get($this->table)->result();
    }
    
    
    function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
    
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        return $this->db->update($this->table, $data);
    }
    
    function delete($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->delete($this->table);
    }
}