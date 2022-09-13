
<div class="card">
  <div class="card-header">
    Danh sách danh mục
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
      <th scope="col">Slug</th>
      <th scope="col">Mô tả</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Quản lý</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($category as $key => $cate){
    ?>
    <tr>
      <th scope="row"><?php echo $cate->id?></th>
      <td><?php echo $cate->title?></td>
      <td><?php echo $cate->slug?></td>
      <td><?php echo $cate->description?></td>
      <td><img src="<?php echo base_url('uploads/category/'.$cate->image)?>" width="150" height="150"></td>
      <td>
        <?php 
          if($cate->status==1){
            echo 'Hiển thị';
          }else{
            echo 'Không hiển thị';
          }
        ?>
      </td>
      <td>
        <a href="<?php echo base_url("category/edit/".$cate->id)?>" class="btn btn-warning">Cập nhật</a>
        <a onclick="return confirm('Bạn có muốn xóa không ?')" href="<?php echo base_url("category/delete/".$cate->id)?>" class="btn btn-danger">Xóa</a>        
      </td>
    </tr>
   <?php
      }
    ?>
  </tbody>
</table>
