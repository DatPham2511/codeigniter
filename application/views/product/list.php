
<div class="card">
  <div class="card-header">
    Danh sách sản phẩm
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
      <th scope="col">Tên</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Thương hiệu</th>
      <th scope="col">Slug</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Giá</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($product as $key => $pro){
    ?>
    <tr>
      <th scope="row"><?php echo $pro->id?></th>
      <td><?php echo $pro->title?></td>
      <td><?php echo $pro->tendanhmuc?></td>
      <td><?php echo $pro->tenthuonghieu?></td>
      <td><?php echo $pro->slug?></td>
      <td><?php echo $pro->description?></td>
      <td><img src="<?php echo base_url('uploads/product/'.$pro->image)?>" width="150" height="150"></td>
      <td><?php echo $pro->quantity?></td>
      <td><?php echo number_format($pro->price,0,',','.')?>VNĐ</td>
      <td>
        <?php 
          if($pro->status==1){
            echo 'Hiển thị';
          }else{
            echo 'Không hiển thị';
          }
        ?>
      </td>
      <td>
        <a href="<?php echo base_url("product/edit/".$pro->id)?>" class="btn btn-warning">Cập nhật</a>
        <a onclick="return confirm('Bạn có muốn xóa không ?')" href="<?php echo base_url("product/delete/".$pro->id)?>" class="btn btn-danger">Xóa</a>        
      </td>
    </tr>
   <?php
      }
    ?>
  </tbody>
</table>
