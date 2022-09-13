<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng nhập</h2>
                        <?php 
    if($this->session->flashdata('error')){  
      ?>
      <div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
    <?php 
     }
    ?>
						<form action="<?php echo base_url('login-customer')?>" method="POST">
                            <label for="">
                                Email:
                            </label>
							<input type="email" name="email" placeholder="Email" />
                            <?php echo '<span class="text text-danger">'.form_error('email').'</span>'?>   
                            <label for="">
                                Mật khẩu:
                            </label>
							<input type="password" name="password" placeholder="Mật khẩu" />
                            <?php echo '<span class="text text-danger">'.form_error('password').'</span>'?>   
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Đăng ký</h2>
						<form action="<?php echo base_url('dang-ky')?>" method="POST">
                            <label for="">
                                Tên:
                            </label>
							<input type="text" name="name" placeholder="Tên"/>
                            <?php echo '<span class="text text-danger">'.form_error('name').'</span>'?>   

							<label for="">
                                Email:
                            </label>
							<input type="email" name="emaill" placeholder="Email"/>
                            <?php echo '<span class="text text-danger">'.form_error('email').'</span>'?>   

							<label for="">
                                Điện thoại:
                            </label>
							<input type="text" name="phone" placeholder="Điện thoại"/>
                            <?php echo '<span class="text text-danger">'.form_error('phone').'</span>'?>   

    
							<label for="">
                                Địa chỉ:
                            </label>
							<input type="text" name="address" placeholder="Đia chỉ"/>
                            <?php echo '<span class="text text-danger">'.form_error('address').'</span>'?>   

                           
							<label for="">
                                Mật khẩu:
                            </label>
							<input type="password" name="passwordd" placeholder="Mật khẩu"/>
                            <?php echo '<span class="text text-danger">'.form_error('passwordd').'</span>'?>   

							<button type="submit" class="btn btn-default">Đăng ký</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->