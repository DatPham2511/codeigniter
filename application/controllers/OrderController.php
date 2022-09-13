<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderController extends CI_Controller {

	public function checkLogin(){
		if(!$this->session->userdata('LoggedIn')){
			redirect(base_url('/login'));
		}
	}

	public function index()
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		$this->load->model('OrderModel');
		$data['order']=$this->OrderModel->selectOrder();

		$this->load->view('order/list',$data);
		$this->load->view('admin_template/footer');
		
	}
    public function view($order_code)
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		$this->load->model('OrderModel');
		$data['order_details']=$this->OrderModel->selectOrderDetails($order_code);

		$this->load->view('order/view',$data);
		$this->load->view('admin_template/footer');
		
	}
    public function delete_order($order_code)
	{
		$this->checkLogin();
		$this->load->model('OrderModel');
		$del_order_details=$this->OrderModel->deleteOrderDetails($order_code);
		$del=$this->OrderModel->deleteOrder($order_code);
        if($del){
            $this->session->set_flashdata('success','Xóa thành công');
			redirect(base_url('order/list'));
        }else{
			redirect(base_url('order/list'));
        }
		
    }
	//xu ly don hang
    public function process()
	{
		$this->load->model('OrderModel');
		$value= $this->input->post('value');
		$order_code= $this->input->post('order_code');
		$data=array(
			'status'=>$value
		);
		$this->OrderModel->updateOrder($data,$order_code);
 
    }
	public function list_order()
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		 //gọi đơn hàng
		 $this->load->model('OrderModel');
		 $data['import']=$this->OrderModel->selectallimport();

		$this->load->view('import_order/list',$data);
		$this->load->view('admin_template/footer');
		
	}
	public function create()
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

		 //gọi product
		 $this->load->model('ProductModel');
		 $data['product']=$this->ProductModel->selectallproduct();


		$this->load->view('import_order/create',$data);
		$this->load->view('admin_template/footer');
		
	}
	public function store()
	{
		date_default_timezone_set('asia/ho_chi_minh');
        $date = date("d-m-Y");
        $hour = date("h:i:sa");
        $order_date = $date . $hour;
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required',['required'=>'Bạn phải điền số lượng']);
		$this->form_validation->set_rules('price', 'Price', 'trim|required',['required'=>'Bạn phải điền giá']);
		if ($this->form_validation->run()==TRUE)
        {
				$data=[
					'date' => $date . ' ' . $hour,
					'id_admin'=>$this->session->userdata('LoggedIn')['id'],
                    'product_id'=>$this->input->post('product_id'),
                    'product_quantity'=>$this->input->post('quantity'),
					'product_price'=>$this->input->post('price'),
				];
				$this->load->model('ProductModel');
				$this->ProductModel->insertImport($data);
				$this->session->set_flashdata('success','Thêm thành công');
				redirect(base_url('import-order/list'));
		}else{
			$this->create();
		}
		
		
	}
   


}