<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url('/')?> ">Trang chủ</a></li>
				  <li class="active">Giỏ hàng</li>
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
						<tr >
							<td class="cart_image">
								<a href=""><img src="<?php echo base_url('uploads/product/'.$items['options']['image'])?>" width="150" height="150" alt="<?php echo $items['name']?>"></a>
							</td>
							<td class="cart_price" >
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
							<td class="cart_delete" style="margin-top:60px">
								<a class="cart_quantity_delete" href="<?php echo base_url('delete-item/'.$items['rowid'])?>"><i class="fa fa-times"></i></a>
							</td>
						</tr>
                    <?php
                    }
                        ?>
                        <tr>
                            <td colspan="5" >Tổng tiền: <p class="cart_total_price"><?php echo number_format($total,0,',','.')?>VNĐ</p></td>
							<td><a href="<?php echo base_url('checkout')?>" class="btn btn-primary">Đặt hàng</a></td>
                        </tr>
					</tbody>
				</table>
                <?php
                }else{
                    echo '<span class="text text-danger">Chưa thêm sản phẩm vào giỏ hàng</span>';
                }
                ?>
			</div>
		</div>
	</section> <!--/#cart_items-->