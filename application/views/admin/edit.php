
<div class="card">
  <div class="card-header">
    Cập nhật admin
  </div>
  <div class="card-body">
  <form action="<?php echo base_url('admin/update/'.$admin->id)?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên</label>
        <input value="<?php echo $admin->username?>" type="text" name="name" nam class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <?php echo '<span class="text text-danger">'.form_error('name').'</span>'?>   
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input value="<?php echo $admin->email?>" type="text" name="email" nam class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <?php echo '<span class="text text-danger">'.form_error('email').'</span>'?>   
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mật khẩu</label>
        <input value="<?php echo $admin->password?>" type="text" name="password" class="form-control" id="exampleInputPassword1">
        <?php echo '<span class="text text-danger">'.form_error('password').'</span>'?>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
  </div>
</div>
