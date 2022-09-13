
<div class="card">
  <div class="card-header">
    Thêm admin
  </div>
  <div class="card-body">
  <form action="<?php echo base_url('admin/store')?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên</label>
        <input type="text" name="name" nam class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <?php echo '<span class="text text-danger">'.form_error('name').'</span>'?>   
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="text" name="email" nam class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <?php echo '<span class="text text-danger">'.form_error('email').'</span>'?>   
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mật khẩu</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        <?php echo '<span class="text text-danger">'.form_error('password').'</span>'?>
    </div>

    <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
  </div>
</div>
