<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Post extends CI_Model{
    public function getAllData($table){
        $res=$this->db->get($table);
        return $res->result();
    }

    public function getDataLimit($table,$limit){
        $res = $this->db->get($table,$limit,0);
        return $res->result();
    }
    
    public function getDataLimitDesc($table,$limit){
        $res = $this->db->order_by("update_at", "desc")->get($table,$limit,0);
        return $res->result();
    }

    public function getAllDataDesc($table){
        $res = $this->db->order_by("update_at", "desc")->get($table);
        return $res->result();
    }
 
    public function insert($table,$data){
        $res = $this->db->insert($table, $data);
        return $res;
    }
 
    public function update($table, $data, $where){
        $res = $this->db->update($table, $data, $where);
        return $res;
    }

    public function getData($where,$table){
        $res = $this->db->get_where($table,$where);
        return $res->result();
    }
 
    public function delete($table, $id){
        $this->db->where('id',$id);
        $this->db->delete($table);
    }
}
?>