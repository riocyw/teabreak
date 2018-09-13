<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Produk extends CI_Model{

    

    public function getAllData($table){
        $res=$this->db->get($table);
        return $res->result();
    }

    public function getRowCount($table,$where){
        $res = $this->db->get_where($table,$where);
        return $res->num_rows();
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

        $listpk = array("stan"=>"id_stan","produk"=>"id_produk","nota"=>"id_nota","diskon"=>"id_diskon","detail_nota"=>"id_detail_nota","detail_stan_diskon"=>"id_diskon","detail_barang_diskon"=>"id_diskon");

        $this->db->where($listpk[$table.""],$id);
        $this->db->delete($table);
    }
}
?>