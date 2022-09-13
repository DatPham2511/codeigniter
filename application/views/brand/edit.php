
<div class="card">
  <div class="card-header">
    Cập nhật thương hiệu
  </div>
  <div class="card-body">
  <?php 
    if($this->session->flashdata('success')){  
      ?>
      <div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
    <?php 
     }
    ?>
  <form action="<?php echo base_url('brand/update/'.$brand->id)?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên</label>
        <input value="<?php echo $brand->title?>" type="text" name="title" nam class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <?php echo '<span class="text text-danger">'.form_error('title').'</span>'?>   
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Slug</label>
        <input value="<?php echo $brand->slug?>" type="text" name="slug" class="form-control" id="exampleInputPassword1">
        <?php echo '<span class="text text-danger">'.form_error('slug').'</span>'?>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mô tả</label>
        <input value="<?php echo $brand->description?>" type="text" name="description" class="form-control" id="exampleInputPassword1">
        <?php echo '<span class="text text-danger">'.form_error('description').'</span>'?>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Hình ảnh</label>
        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
        <img src="<?php echo base_url('uploads/brand/'.$brand->image)?>" width="150" height="150" alt="">
        <small><?php if(isset($error)){ echo $error;}?></small>
    </div>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Tình trạng</label>
    <select name="status" class="form-control" id="exampleFormControlSelect1">
        <?php 
          if($brand->status==1){
        ?>
        <option selected value="1">Hiển thị </option>
        <option value="0">Không hiển thị</option>
        <?php
        }else{
        ?>
        <option  value="1">Hiển thị </option>
        <option selected value="0">Không hiển thị</option>
        <?php
        }
        ?>
    
    </select>
  </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
  </div>
</div>
