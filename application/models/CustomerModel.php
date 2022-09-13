<?php
    class CustomerModel extends CI_Model{

        public function selectcustomerbyid($id){
            $query=$this->db->get_where('customers',['id'=>$id]);
            return $query->result();
        }
        public function updateCustomer($data,$id){
            $query=$this->db->update('customers',$data,['id'=>$id]);
        }
    }
?>