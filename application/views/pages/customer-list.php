<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Thông tin khách hàng</h2>
						<?php 
						$id=$this->session->userdata('LoggedInCustomer')['id'];
						if($this->session->flashdata('error')){  
						?>
						<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
						<?php 
						}elseif($this->session->flashdata('success')){
						?>
						<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
						<?php
						}
						?>
						
						<form method="POST" action="<?php echo base_url('customer/update/'.$id)?>" enctype="multipart/form-data">
									<?php
								foreach($customer as $key => $cus){
								?>
                            <label for="">Tên:</label>
							<input value="<?php echo $cus->name?>" type="text" name="name" placeholder="Tên" />
                            <?php echo '<span class="text text-danger">'.form_error('name').'</span>'?>   

							<label for="">Địa chỉ:</label>
                            <input value="<?php echo $cus->address?>"  type="text" name="address" placeholder="Địa chỉ" />
                            <?php echo '<span class="text text-danger">'.form_error('address').'</span>'?>   

							<label for="">Số điện thoại:</label>
                            <input value="<?php echo $cus->phone?>" type="text" name="phone" placeholder="Số điện thoại" />
                            <?php echo '<span class="text text-danger">'.form_error('phone').'</span>'?>   

							<label for="">Email:</label>
                            <input value="<?php echo $cus->email?>" type="email" name="email" placeholder="Email" />
                            <?php echo '<span class="text text-danger">'.form_error('email').'</span>'?>   

							<label for="">Mật khẩu:</label>
                            <input value="<?php echo $cus->password?>" type="text" name="password" placeholder="Mật khẩu" />
                            <?php echo '<span class="text text-danger">'.form_error('password').'</span>'?>   
							<?php
							}?>
			
							<button type="submit" class="btn btn-default">Cập nhật</button>
						</form>
					</div><!--/login form-->
				</div>
				
			</div>
		</div>