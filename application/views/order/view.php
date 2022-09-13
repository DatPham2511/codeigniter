
<div class="card">
  <div class="card-header">
    Chi tiết đơn hàng
  </div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
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
      <th scope="row"><?php echo $ord->id?></th>
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
            <select class="xulydonhang form-control">
              <?php 
              if($ord->order_status==1){
    
              ?>

                <option selected id="<?php echo $ord->order_code?>" value="1">---Xử lý đơn hàng---</option>
                <option id="<?php echo $ord->order_code?>" value="2">Đã xử lý đơn hàng</option>
                <option id="<?php echo $ord->order_code?>" value="3">Hủy đơn hàng</option>
                <?php 
                } elseif($ord->order_status==2){
                ?>
                <option  id="<?php echo $ord->order_code?>" value="1">---Xử lý đơn hàng---</option>
                <option selected id="<?php echo $ord->order_code?>" value="2">Đã xử lý đơn hàng</option>
                <option id="<?php echo $ord->order_code?>" value="3">Hủy đơn hàng</option>
                <?php
                } else{
                ?>
                 <option  id="<?php echo $ord->order_code?>" value="1">---Xử lý đơn hàng---</option>
                <option  id="<?php echo $ord->order_code?>" value="2">Đã xử lý đơn hàng</option>
                <option selected id="<?php echo $ord->order_code?>" value="3">Hủy đơn hàng</option>
                <?php
                } 
                ?>

            </select>
            </td>
            <td colspan="6" align="right">Tổng tiền: <?php echo number_format($total,0,',','.')?>VNĐ</td>
        </td>
    </tr>
  </tbody>
</table>
