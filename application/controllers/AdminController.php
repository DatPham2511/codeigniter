<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

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

		$this->load->model('AdminModel');
		$data['admin']=$this->AdminModel->selectadmin();

		$this->load->view('admin/list',$data);
		$this->load->view('admin_template/footer');
		
	}
    public function create()
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		$this->load->view('admin/create');
		$this->load->view('admin_template/footer');
		
	}
	public function store()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required',['required'=>'Bạn phải điền tên']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required',['required'=>'Bạn phải điền email']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',['required'=>'Bạn phải điền mật khẩu']);
		if ($this->form_validation->run()==TRUE)
        {
		
				$data=[
					'username'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'password'=>$this->input->post('password'),
				];
				$this->load->model('AdminModel');
				$this->AdminModel->insertAdmin($data);
				$this->session->set_flashdata('success','Thêm thành công');
				redirect(base_url('admin/list'));
		}else{
			$this->create();
		}
		
		
	}
	public function edit($id)
	{
		$this->checkLogin();
		$this->load->view('admin_template/header');
		$this->load->view('admin_template/navbar');
		
		$this->load->model('AdminModel');
		$data['admin']=$this->AdminModel->selectadminbyid($id);

		$this->load->view('admin/edit',$data);
		$this->load->view('admin_template/footer');
		
	}
	public function update($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required',['required'=>'Bạn phải điền tên']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required',['required'=>'Bạn phải điền email']);
		$this->form_validation->set_rules('password', 'Password', 'trim|required',['required'=>'Bạn phải điền mật khẩu']);
		if ($this->form_validation->run()==TRUE)
        {
			
			$data=[
				'username'=>$this->input->post('name'),
					'email'=>$this->input->post('email'),
					'password'=>$this->input->post('password'),
			];
			$this->load->model('AdminModel');
				$this->AdminModel->updateAdmin($data,$id);
				$this->session->set_flashdata('success','Cập nhật thành công');
				redirect(base_url('admin/list'));
		}else{
			$this->edit($id);
		}
		
	}
	public function delete($id)
	{
        if($this->session->userdata('LoggedIn')['id']==$id){
            redirect(base_url('admin/list'));
        }else{
            $this->load->model('AdminModel');
		$data['admin']=$this->AdminModel->deleteadmin($id);
		$this->session->set_flashdata('success','Xóa thành công');
		redirect(base_url('admin/list'));
        }
		
	}


}