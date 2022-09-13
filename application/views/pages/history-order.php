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
    Danh sách đơn hàng
  </div>
  <?php 
    if($this->session->flashdata('success')){  
      ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
    <?php 
     }
    ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Mã đơn hàng</th>
      <th scope="col">Tên</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Thanh toán</th>
      <th scope="col">Ngày đặt</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($order as $key => $ord){
    ?>
    <tr>
    <input type="hidden" value="<?php echo $ord->ship_id?>" name="ship_id">

      
      <td><?php echo $ord->order_code?></td>
      <td><?php echo $ord->name?></td>
      <td><?php echo $ord->phone?></td>
      <td><?php echo $ord->address?></td>
      <td><?php echo $ord->method?></td>
      <td><?php echo $ord->date?></td>

      <td>
        <a href="<?php echo base_url("history-order/view/".$ord->order_code)?>" class="btn btn-primary" style="margin-top:-7px;">Chi tiết</a>
      </td>
    </tr>
   <?php
      }
    ?>
  </tbody>
</table>
</div>
</div>
</section>