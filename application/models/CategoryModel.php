<?php
    class CategoryModel extends CI_Model{
        public function insertCategory($data){
            return $this->db->insert('categories',$data);
        }
        public function selectcategory(){
            $query=$this->db->get('categories');
            return $query->result();
        }
        public function selectcatebyid($id){
            $query=$this->db->get_where('categories',['id'=>$id]);
            return $query->row();
        }
        public function updateCategory($id,$data){
            $query=$this->db->update('categories',$data,['id'=>$id]);
           
        }
        public function deletecategory($id){
            $query=$this->db->delete('categories',['id'=>$id]);
           
        }
    }
?>