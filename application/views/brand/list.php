
<div class="card">
  <div class="card-header">
    Danh sách thương hiệu
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
      foreach($brand as $key => $bra){
    ?>
    <tr>
      <th scope="row"><?php echo $bra->id?></th>
      <td><?php echo $bra->title?></td>
      <td><?php echo $bra->slug?></td>
      <td><?php echo $bra->description?></td>
      <td><img src="<?php echo base_url('uploads/brand/'.$bra->image)?>" width="150" height="150"></td>
      <td>
        <?php 
          if($bra->status==1){
            echo 'Hiển thị';
          }else{
            echo 'Không hiển thị';
          }
        ?>
      </td>
      <td>
        <a href="<?php echo base_url("brand/edit/".$bra->id)?>" class="btn btn-warning">Cập nhật</a>
        <a onclick="return confirm('Bạn có muốn xóa không ?')" href="<?php echo base_url("brand/delete/".$bra->id)?>" class="btn btn-danger">Xóa</a>        
      </td>
    </tr>
   <?php
      }
    ?>
  </tbody>
</table>
