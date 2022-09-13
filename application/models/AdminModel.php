<?php
    class AdminModel extends CI_Model{
        public function insertAdmin($data){
            return $this->db->insert('user',$data);
        }
        public function selectadmin(){
            $query=$this->db->get('user');
            return $query->result();
        }
        public function selectadminbyid($id){
            $query=$this->db->get_where('user',['id'=>$id]);
            return $query->row();
        }
        public function updateAdmin($data,$id){
            $query=$this->db->update('user',$data,['id'=>$id]);
           
        }
        public function deleteadmin($id){
            $query=$this->db->delete('user',['id'=>$id]);
        }
    }
?>