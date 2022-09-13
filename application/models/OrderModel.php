<?php
    class OrderModel extends CI_Model{
        public function selectOrder(){
            $query=$this->db->select('orders.*,shipping.*')
            ->from('orders')
            ->join('shipping','orders.ship_id=shipping.id')
            ->get();
            return $query->result();
        }
        public function selectOrderDetails($order_code){
            $query=$this->db->select('orders.order_code,orders.status as order_status,order_details.quantity as qty,order_details.order_code,order_details.product_id ,product.*')
            ->from('order_details')
            ->join('product','order_details.product_id=product.id')
            ->join('orders','orders.order_code=order_details.order_code')
            ->where('order_details.order_code',$order_code)
            ->get();
            return $query->result();
        }
        public function deleteOrder($order_code){
           return $this->db->delete('orders',['order_code'=>$order_code]);
        }
        public function deleteOrderDetails($order_code){
            $this->db->where_in('order_code',$order_code);
            return $this->db->delete('order_details');
         }
         public function updateOrder($data,$order_code) {
            return $this->db->update('orders',$data,['order_code'=>$order_code]);

         }
         public function selectallimport(){
            $query=$this->db->select('import_orders.*,product.title as tensanpham,user.username')
            ->from('import_orders')
            ->join('product','product.id=import_orders.product_id')
            ->join('user','user.id=import_orders.id_admin')
            ->get();
            return $query->result();
        }
        public function selectOrderbyid($cust_id){
            $query=$this->db->select('orders.*,shipping.*')
            ->from('orders')
            ->join('shipping','orders.ship_id=shipping.id')
            ->where('orders.cus_id',$cust_id)
            ->get();
            return $query->result();
        }
        
        
    }
?>