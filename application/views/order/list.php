
<div class="card">
  <div class="card-header">
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
      <th scope="col">Id</th>
      <th scope="col">Mã đơn hàng</th>
      <th scope="col">Tên</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Thanh toán</th>
      <th scope="col">Ngày đặt</th>
      <th scope="col">Trạng thái</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($order as $key => $ord){
    ?>
    <tr>
    <input type="hidden" value="<?php echo $ord->ship_id?>" name="ship_id">

      <th scope="row"><?php echo $ord->id?></th>
      <td><?php echo $ord->order_code?></td>
      <td><?php echo $ord->name?></td>
      <td><?php echo $ord->phone?></td>
      <td><?php echo $ord->address?></td>
      <td><?php echo $ord->method?></td>
      <td><?php echo $ord->date?></td>

      <td>
        <?php 
          if($ord->status==1){
            echo '<span class="text text-primary">Đang chờ xử lý</span>';
          }elseif($ord->status==2){
            echo '<span class="text text-success">Đã giao hàng</span>';
          }else{
            echo '<span class="text text-danger">Đã hủy</span>';;
          }
        ?>
      </td>
      <td>
        <a href="<?php echo base_url("order/view/".$ord->order_code)?>" class="btn btn-warning">Chi tiết</a>
        <a onclick="return confirm('Bạn có muốn xóa không ?')" href="<?php echo base_url("order/delete/".$ord->order_code)?>" class="btn btn-danger">Xóa</a>        
      </td>
    </tr>
   <?php
      }
    ?>
  </tbody>
</table>
