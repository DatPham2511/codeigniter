<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url('/')?>">Trang chủ</a></li>
				  <li class="active">Thanh toán</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
                <?php
                if($this->cart->contents()){
                ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Tên sản phẩm</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                    <?php 
                    $subtotal=0;
                    $total=0;

                    foreach ($this->cart->contents() as $items){ 
                        $subtotal=$items['qty']*$items['price'];
                        $total+=$subtotal;
                        ?>
						<tr>
							<td class="cart_image">
								<a href=""><img src="<?php echo base_url('uploads/product/'.$items['options']['image'])?>" width="150" height="150" alt="<?php echo $items['name']?>"></a>
							</td>
							<td class="cart_price">
								<h4><a href="" style="color:#696763"><?php echo $items['name']?></a></h4>
							</td>
							<td class="cart_price">
								<p><?php echo number_format($items['price'],0,',','.')?>VNĐ</p>
							</td>
							<td class="cart_quantity">
								<form action="<?php echo base_url('update-cart-item')?>" method="POST">
								<div class="cart_quantity_button">
									<input type="hidden" value="<?php echo $items['rowid']?>" name="rowid">
									<input class="cart_quantity_input" type="number" min="1" name="quantity" value="<?php echo $items['qty']?>" autocomplete="off" size="2">
									<input type="submit" name="capnhat" class="btn btn-warning" value="Cập nhật" style="margin-left:5px">
								</div>
								</form>
							</td>
							<td class="cart_total">
								<p class="cart_total_price"><?php echo number_format($subtotal,0,',','.')?>VNĐ</p>
							</td>
							
						</tr>
                    <?php
                    }
                        ?>
                        <tr>
                            <td colspan="5" >Tổng tiền: <p class="cart_total_price"><?php echo number_format($total,0,',','.')?>VNĐ</p></td>
						
                        </tr>
					</tbody>
				</table>
                <?php
                }else{
                    echo '<span class="text text-danger">Chưa thêm sản phẩm vào giỏ hàng</span>';
                }
                ?>
			</div>
            <section><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Điền thông tin thanh toán</h2>
						<?php 
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
						
						<form onsubmit="return confirm('Xác nhận đặt hàng')" method="POST" action="<?php echo base_url('confirm-checkout')?>">
                            <label for="">Tên:</label>
							<input value="<?php echo $this->session->userdata('LoggedInCustomer')['name']?>" type="text" name="name" placeholder="Tên" />
                            <?php echo '<span class="text text-danger">'.form_error('name').'</span>'?>   

							<label for="">Địa chỉ:</label>
                            <input value="<?php echo $this->session->userdata('LoggedInCustomer')['address']?>"  type="text" name="address" placeholder="Địa chỉ" />
                            <?php echo '<span class="text text-danger">'.form_error('address').'</span>'?>   

							<label for="">Số điện thoại:</label>
                            <input value="<?php echo $this->session->userdata('LoggedInCustomer')['phone']?>" type="text" name="phone" placeholder="Số điện thoại" />
                            <?php echo '<span class="text text-danger">'.form_error('phone').'</span>'?>   

							<label for="">Email:</label>
                            <input value="<?php echo $this->session->userdata('LoggedInCustomer')['email']?>" type="email" name="email" placeholder="Email" />
                            <?php echo '<span class="text text-danger">'.form_error('email').'</span>'?>   
							
							<label for="">Hình thức thanh toán:</label>
                            <select name="shipping_method" >
                                <option value="cod">COD</option>
                                <option value="vnpay">VNPAY</option>
                            </select>
							<button type="submit" class="btn btn-default">Xác nhận thanh toán</button>
						</form>
					</div><!--/login form-->
				</div>
				
			</div>
		</div>
	</section><!--/form-->
	
		</div>
	</section> <!--/#cart_items-->