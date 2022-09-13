
<div class="card">
  <div class="card-header">
    Danh sách admin
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
      <th scope="col">Email</th>
      <th scope="col">Mật khẩu</th>
      <th scope="col">Quản lý</th>

    </tr>
  </thead>
  <tbody>
    <?php
      foreach($admin as $key => $ad){
    ?>
    <tr>
      <th scope="row"><?php echo $ad->id?></th>
      <td><?php echo $ad->username?></td>
      <td><?php echo $ad->email?></td>
      <td><?php echo $ad->password?></td>
      </td>
      <td>
        <a href="<?php echo base_url("admin/edit/".$ad->id)?>" class="btn btn-warning">Cập nhật</a>
        <a onclick="return confirm('Bạn có muốn xóa không ?')" href="<?php echo base_url("admin/delete/".$ad->id)?>" class="btn btn-danger">Xóa</a>        
      </td>
    </tr>
   <?php
      }
    ?>
  </tbody>
</table>
