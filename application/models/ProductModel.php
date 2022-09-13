<?php
    class ProductModel extends CI_Model{
        public function insertProduct($data){
            return $this->db->insert('product',$data);
        }
        public function insertImport($data){
            return $this->db->insert('import_orders',$data);
        }
        public function selectallproduct(){
            $query=$this->db->select('categories.title as tendanhmuc,product.*,brands.title as tenthuonghieu')
            ->from('categories')
            ->join('product','product.category_id=categories.id')
            ->join('brands','brands.id=product.brand_id')
            ->get();
            return $query->result();
        }
        public function selectproductbyid($id){
            $query=$this->db->get_where('product',['id'=>$id]);
            return $query->row();
        }
        public function updateProduct($id,$data){
            $query=$this->db->update('product',$data,['id'=>$id]);
           
        }
        public function deleteproduct($id){
            $query=$this->db->delete('product',['id'=>$id]);
           
        }
    }
?>