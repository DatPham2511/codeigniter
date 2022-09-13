<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="<?php echo base_url('/')?>">Trang chủ</a></li>
				  <li class="active">Lịch sử mua hàng</li>
				</ol>
			</div>
<div class="card">
  <div class="card-header" align="center">
    Chi tiết đơn hàng
  </div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Mã đơn hàng</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Giá</th>
      <th scope="col">Thành tiền</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $subtotal=0;
      $total=0;
      foreach($order_details as $key => $ord){
        $subtotal=$ord->qty*$ord->price;
        $total+=$subtotal;
    ?>
    <tr>      

      <td><?php echo $ord->order_code?></td>
      <td><?php echo $ord->title?></td>
      <td><img src="<?php echo base_url('uploads/product/'.$ord->image)?>" width="150" height="150"></td>
      <td><?php echo $ord->qty?></td>
      <td><?php echo number_format($ord->price,0,',','.')?>VNĐ</td>
      <td>
        <?php 
         echo number_format($subtotal,0,',','.');
        ?>VNĐ
      </td>
    </tr>
   <?php
      }
    ?>
    <tr>
        <td>
            </td>
            <td colspan="6" align="right">Tổng tiền: <?php echo number_format($total,0,',','.')?>VNĐ</td>
        </td>
    </tr>
  </tbody>
</table>
</div>
</div>
</section>