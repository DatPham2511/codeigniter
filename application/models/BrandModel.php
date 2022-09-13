<?php
    class BrandModel extends CI_Model{
        public function insertBrand($data){
            return $this->db->insert('brands',$data);
        }
        public function selectbrand(){
            $query=$this->db->get('brands');
            return $query->result();
        }
        public function selectbrandbyid($id){
            $query=$this->db->get_where('brands',['id'=>$id]);
            return $query->row();
        }
        public function updateBrand($id,$data){
            $query=$this->db->update('brands',$data,['id'=>$id]);
           
        }
        public function deletebrand($id){
            $query=$this->db->delete('brands',['id'=>$id]);
           
        }
    }
?>