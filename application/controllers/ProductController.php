<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductController extends CI_Controller {

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

        //gọi product
		$this->load->model('ProductModel');
		$data['product']=$this->ProductModel->selectallproduct();
       
		$this->load->view('product/list',$data);
		$this->load->view('admin_template/footer');
		
	}
    public function create()
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');

        //gọi cate
		$this->load->model('CategoryModel');
		$data['category']=$this->CategoryModel->selectcategory();
        //gọi brand
        $this->load->model('BrandModel');
		$data['brand']=$this->BrandModel->selectbrand();
        
		$this->load->view('product/create',$data);
		$this->load->view('admin_template/footer');
		
	}
	public function store()
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required',['required'=>'Bạn phải điền tên sản phẩm']);
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required',['required'=>'Bạn phải điền slug']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required',['required'=>'Bạn phải điền mô tả']);
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required',['required'=>'Bạn phải điền số lượng']);
		$this->form_validation->set_rules('price', 'Price', 'trim|required',['required'=>'Bạn phải điền giá']);
		if ($this->form_validation->run()==TRUE)
        {
			$ori_filename=$_FILES['image']['name'];
			$new_name=time()."".str_replace(' ','-',$ori_filename);
			$config=[
				'upload_path'=>'./uploads/product',
				'allowed_types'=>'gif|jpg|png|jpeg',
				'file_name'=>$new_name,
			];
			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('image'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin_template/header');
				$this->load->view('admin_template/navbar');
				$this->load->view('product/create',$error);
				$this->load->view('admin_template/footer');
			}
			else
			{
				$cate_filename=$this->upload->data('file_name');
				$data=[
					'title'=>$this->input->post('title'),
					'description'=>$this->input->post('description'),
					'slug'=>$this->input->post('slug'),
					'status'=>$this->input->post('status'),
                    'category_id'=>$this->input->post('category_id'),
                    'brand_id'=>$this->input->post('brand_id'),
                    'quantity'=>$this->input->post('quantity'),
					'price'=>$this->input->post('price'),
					'image'=>$cate_filename,

				];
				$this->load->model('ProductModel');
				$this->ProductModel->insertProduct($data);
				$this->session->set_flashdata('success','Thêm thành công');
				redirect(base_url('product/list'));
			}
		}else{
			$this->create();
		}
		
		
	}
	public function edit($id)
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		//gọi product theo id
		$this->load->model('ProductModel');
		$data['product']=$this->ProductModel->selectproductbyid($id);
		//gọi cate
		$this->load->model('CategoryModel');
		$data['category']=$this->CategoryModel->selectcategory();
		//gọi brand
		$this->load->model('BrandModel');
		$data['brand']=$this->BrandModel->selectbrand();

		$this->load->view('product/edit',$data);
		$this->load->view('admin_template/footer');
		
	}
	public function update($id)
	{
		$this->form_validation->set_rules('title', 'Title', 'trim|required',['required'=>'Bạn phải điền tên sản phẩm']);
		$this->form_validation->set_rules('slug', 'Slug', 'trim|required',['required'=>'Bạn phải điền slug']);
		$this->form_validation->set_rules('description', 'Description', 'trim|required',['required'=>'Bạn phải điền mô tả']);
        $this->form_validation->set_rules('quantity', 'Quantity', 'trim|required',['required'=>'Bạn phải điền số lượng']);
		$this->form_validation->set_rules('price', 'Price', 'trim|required',['required'=>'Bạn phải điền giá']);
		if ($this->form_validation->run()==TRUE)
        {
			if (!empty($_FILES['image']['name'])){
			//upload img
			$ori_filename=$_FILES['image']['name'];
			$new_name=time()."".str_replace(' ','-',$ori_filename);
			$config=[
				'upload_path'=>'./uploads/product',
				'allowed_types'=>'gif|jpg|png|jpeg',
				'file_name'=>$new_name,
			];
			$this->load->library('upload',$config);
			if (!$this->upload->do_upload('image'))
			{
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin_template/header');
				$this->load->view('admin_template/navbar');
				$this->load->view('product/edit',$error);
				$this->load->view('admin_template/footer');
			}
			else
			{
				$product_filename=$this->upload->data('file_name');
				$data=[
					'title'=>$this->input->post('title'),
					'description'=>$this->input->post('description'),
					'slug'=>$this->input->post('slug'),
					'status'=>$this->input->post('status'),
                    'category_id'=>$this->input->post('category_id'),
                    'brand_id'=>$this->input->post('brand_id'),
                    'quantity'=>$this->input->post('quantity'),
					'price'=>$this->input->post('price'),
					'image'=>$product_filename,

				];
			}
		}else{
			$data=[
					'title'=>$this->input->post('title'),
					'description'=>$this->input->post('description'),
					'slug'=>$this->input->post('slug'),
					'status'=>$this->input->post('status'),
                    'category_id'=>$this->input->post('category_id'),
                    'brand_id'=>$this->input->post('brand_id'),
                    'quantity'=>$this->input->post('quantity'),
					'price'=>$this->input->post('price'),
			];
		}
			$this->load->model('ProductModel');
			$this->ProductModel->updateProduct($id,$data);
			$this->session->set_flashdata('success','Cập nhật thành công');
			redirect(base_url('product/list'));
		}else{
			$this->edit($id);
		}
		
	}
	public function delete($id)
	{
		$this->load->model('ProductModel');
		$data['product']=$this->ProductModel->deleteproduct($id);
		$this->session->set_flashdata('success','Xóa thành công');
		redirect(base_url('product/list'));
		
	}


}