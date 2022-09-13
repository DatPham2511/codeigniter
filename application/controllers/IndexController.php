<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('IndexModel');
		$this->data['category']=$this->IndexModel->getCategoryHome();
		$this->data['brand']=$this->IndexModel->getBrandHome();
		
	}
	public function index()
	{
		$this->data['allproduct']=$this->IndexModel->getAllProduct();
		$this->load->view('pages/template/header',$this->data);
		$this->load->view('pages/template/slider');
		$this->load->view('pages/home',$this->data);
		$this->load->view('pages/template/footer');
	}
	public function category($id)
	{
		$this->data['category_product']=$this->IndexModel->getcategoryproduct($id);
		$this->data['title']=$this->IndexModel->getcategorytitle($id);
		
		$this->load->view('pages/template/header',$this->data);
	
		$this->load->view('pages/category',$this->data);
		$this->load->view('pages/template/footer');
		
	}
	public function brand($id)
	{
		$this->data['brand_product']=$this->IndexModel->getbrandproduct($id);
		$this->data['title']=$this->IndexModel->getbrandtitle($id);
		$this->load->view('pages/template/header',$this->data);
		
		$this->load->view('pages/brand',$this->data);
		$this->load->view('pages/template/footer');
		
	}
	public function cart()
	{
		$this->load->view('pages/template/header',$this->data);
		
		$this->load->view('pages/cart');
		$this->load->view('pages/template/footer');		
	}
	public function delete_item($rowid)
	{
		$this->cart->remove($rowid);
		redirect(base_url().'gio-hang','refresh');	
	}
	public function checkout()
	{
		
		if($this->session->userdata('LoggedInCustomer') && $this->cart->contents())
		{		
		$this->load->view('pages/template/header',$this->data);
		
		$this->load->view('pages/checkout');
		$this->load->view('pages/template/footer');
		}else{
			redirect(base_url('/gio-hang'));
		}
	}
	public function update_cart_item()
	{
		$rowid=$this->input->post('rowid');
		$quantity=$this->input->post('quantity');
		foreach ($this->cart->contents() as $items){ 
			if($rowid==$items['rowid']){
				$cart= array(
					'rowid'     => $rowid,
					'qty'     => $quantity
			);
			}
		}
		$this->cart->update($cart);
		redirect($_SERVER['HTTP_REFERER']);	
	}
	public function add_to_cart()
	{
		$product_id=$this->input->post('product_id');
		$quantity=$this->input->post('quantity');
		$this->data['product_details']=$this->IndexModel->getProductDetails($product_id);
		//dat hang
		foreach($this->data['product_details'] as $key => $pro){
		$cart= array(
			'id'      => $pro->id,
			'qty'     => $quantity,
			'price'   => $pro->price,
			'name'    => $pro->title,
			'options' => array('image' => $pro->image)
	);
		}
		$this->cart->insert($cart);
		redirect(base_url().'gio-hang','refresh');
	}
	public function product($id)
	{
		$this->data['product_details']=$this->IndexModel->getProductDetails($id);

		$this->load->view('pages/template/header',$this->data);
		
		$this->load->view('pages/product-details',$this->data);
		$this->load->view('pages/template/footer');
		
	}
	public function login()
	{
		$this->load->view('pages/template/header');
		
		$this->load->view('pages/login');
		$this->load->view('pages/template/footer');
		
	}
	public function login_customer()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required',['required'=>'Bạn phải điền email']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',['required'=>'Bạn phải điền mật khẩu']);
		if ($this->form_validation->run()==TRUE)
        {
			$email=$this->input->post('email');
			$password=$this->input->post('password');
            $this->load->model('LoginModel');
			$result=$this->LoginModel->checkLoginCustomer($email,$password); 
			if(count($result)>0){
				$session_array=array(
					'id'=>$result[0]->id,
					'name'=>$result[0]->name,
					'email'=>$result[0]->email,
					'phone'=>$result[0]->phone,
					'address'=>$result[0]->address,
					'password'=>$result[0]->password

					
									
				);
				$this->session->set_userdata('LoggedInCustomer',$session_array);
				//$this->session->set_flashdata('success','Đăng nhập thành công');
				redirect(base_url('/checkout'));
			}
			else{
				$this->session->set_flashdata('error','Đăng nhập thất bại');
				redirect(base_url('/dang-nhap'));
			}
        }
        else
	    {
				$this->login();
			              
		}
	}
	public function dang_ky()
	{
		$this->form_validation->set_rules('emaill', 'Emaill', 'trim|required',['required'=>'Bạn phải điền email']);
		$this->form_validation->set_rules('passwordd', 'Passwordd', 'trim|required',['required'=>'Bạn phải điền mật khẩu']);
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required',['required'=>'Bạn phải điền số điện thoại']);
		$this->form_validation->set_rules('address', 'Adress', 'trim|required',['required'=>'Bạn phải điền địa chỉ']);
		$this->form_validation->set_rules('name', 'Name', 'trim|required',['required'=>'Bạn phải điền tên']);
		if ($this->form_validation->run()==TRUE)
        {
			$email=$this->input->post('emaill');
			$password=$this->input->post('passwordd');
			$name=$this->input->post('name');
			$address=$this->input->post('address');
			$phone=$this->input->post('phone');
			$data=array(
				'name'=>$name,
				'phone'=>$phone,
				'email'=>$email,
				'address'=>$address,
				'password'=>$password,

			);
            $this->load->model('LoginModel');
			$result=$this->LoginModel->newCustomer($data); 
			if($result){
				$session_array=array(
					'id'=>$id,
					'name'=>$name,
					'email'=>$email,
					'phone'=>$phone,
					'address'=>$address,
					'password'=>$password
					
					
				);
				$this->session->set_userdata('LoggedInCustomer',$session_array);
				redirect(base_url('/checkout'));
			}
			else{
				redirect(base_url('/dang-nhap'));
			}
        }
        else
	    {
				$this->login();
			              
		}
	}
	public function dang_xuat()
	{
		$this->session->unset_userdata('LoggedInCustomer');	
		redirect(base_url('/dang-nhap'));

	}
	public function confirm_checkout()
	{
		
		date_default_timezone_set('asia/ho_chi_minh');
		$date = date("d-m-Y");
        $hour = date("h:i:sa");
		$order_date = $date . $hour;
		$this->form_validation->set_rules('email', 'Email', 'trim|required',['required'=>'Bạn phải điền email']);
		
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required',['required'=>'Bạn phải điền số điện thoại']);
		$this->form_validation->set_rules('address', 'Adress', 'trim|required',['required'=>'Bạn phải điền địa chỉ']);
		$this->form_validation->set_rules('name', 'Name', 'trim|required',['required'=>'Bạn phải điền tên']);
        if ($this->form_validation->run()==TRUE)
        {
			$email=$this->input->post('email');
			$name=$this->input->post('name');
			$address=$this->input->post('address');
			$phone=$this->input->post('phone');
			$shipping_method=$this->input->post('shipping_method');

			$data=array(
				'name'=>$name,
				'phone'=>$phone,
				'email'=>$email,
				'address'=>$address,
				'method'=>$shipping_method

			);
			$this->load->model('LoginModel');
			$result=$this->LoginModel->newShipping($data); 
			if($result){
				//order
				$order_code=rand(00,999);
				$data_order=array(
					'order_code'=>$order_code,
					'ship_id'=>$result,
					'status'=> 1,
					'date' => $date . ' ' . $hour,
					'cus_id'=>$this->session->userdata('LoggedInCustomer')['id']
		
				);
				$result=$this->LoginModel->insert_order($data_order);
				//order details
				foreach ($this->cart->contents() as $items){ 
					$data_order_details=array(
						'order_code'=>$order_code,
						'product_id'=>$items['id'],
						'quantity'=> $items['qty']
					);
				$insert_order_details=$this->LoginModel->insert_order_details($data_order_details);

				}
				$this->session->set_flashdata('success','Thanh toán thành công');
				$this->cart->destroy();
				redirect(base_url('/thanks'));
			}
			else{
				$this->session->set_flashdata('error','Thanh toán thất bại');
				redirect(base_url('/checkout'));
			}

		}else{
			$this->checkout();
			              
		}
		
	}
	public function thanks()
	{
		$this->load->view('pages/template/header',$this->data);
		
		$this->load->view('pages/thanks');
		$this->load->view('pages/template/footer');		
	}
	public function tim_kiem()
	{
		if(isset($_GET['keyword']) && $_GET['keyword']!=''){
			$keyword=$_GET['keyword'];
		}else{
			$keyword='';
		}
		$this->data['product']=$this->IndexModel->getproductkey($keyword);
		$this->data['title']=$keyword;
		
		$this->load->view('pages/template/header',$this->data);
	
		$this->load->view('pages/timkiem',$this->data);
		$this->load->view('pages/template/footer');
	}
	public function list()
	{
		$cust_id=$this->session->userdata('LoggedInCustomer')['id'];
		$this->load->view('pages/template/header',$this->data);

		$this->load->model('OrderModel');
		$data['order']=$this->OrderModel->selectOrderbyid($cust_id);

		$this->load->view('pages/history-order',$data);
		$this->load->view('pages/template/footer');		
		
	}
	public function view($order_code)
	{
	
		$this->load->view('pages/template/header',$this->data);

		$this->load->model('OrderModel');
		$data['order_details']=$this->OrderModel->selectOrderDetails($order_code);

		$this->load->view('pages/history-details',$data);
		$this->load->view('pages/template/footer');		
		
	}
	public function list_customer()
	{
		$id=$this->session->userdata('LoggedInCustomer')['id'];
		$this->load->view('pages/template/header',$this->data);

		$this->load->model('CustomerModel');
		$data['customer']=$this->CustomerModel->selectcustomerbyid($id);
		
		$this->load->view('pages/customer-list',$data);
		$this->load->view('pages/template/footer');		
		
	}
	public function update_customer($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required',['required'=>'Bạn phải điền tên']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required',['required'=>'Bạn phải điền email']);
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required',['required'=>'Bạn phải điền số điện thoại']);
		$this->form_validation->set_rules('address', 'Address', 'trim|required',['required'=>'Bạn phải điền địa chỉ']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',['required'=>'Bạn phải điền mật khẩu']);

		if ($this->form_validation->run()==TRUE)
        {
				
			$data=[
				'name'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'phone'=>$this->input->post('phone'),
					'address'=>$this->input->post('address'),
					'password'=>$this->input->post('password'),
					

			];
			$this->load->model('CustomerModel');
				$this->CustomerModel->updateCustomer($data,$id);
				$this->session->set_flashdata('success','Cập nhật thành công');
				redirect(base_url('customer/list'));

        }
        else
	    {
				$this->list_customer();
			              
		}
		
	}
}
