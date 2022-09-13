
<div class="card">
  <div class="card-header">
    Danh sách nhập hàng
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
      <th scope="col">Tên admin</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Ngày nhập</th>
      <th scope="col">Số lượng nhập</th>
      <th scope="col">Giá nhập</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($import as $key => $imp){
    ?>
    <tr>
      <th scope="row"><?php echo $imp->id?></th>
      <td><?php echo $imp->username?></td>
      <td><?php echo $imp->tensanpham?></td>
      <td><?php echo $imp->date?></td>
      <td><?php echo $imp->product_quantity?></td>
      <td><?php echo number_format($imp->product_price,0,',','.')?>VNĐ</td>
    </tr>
   <?php
      }
    ?>
  </tbody>
</table>
