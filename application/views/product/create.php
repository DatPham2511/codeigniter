
<div class="card">
  <div class="card-header">
    Thêm sản phẩm
  </div>
  <div class="card-body">
  <form action="<?php echo base_url('product/store')?>" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên</label>
        <input type="text" name="title" nam class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <?php echo '<span class="text text-danger">'.form_error('title').'</span>'?>   
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Số lượng</label>
        <input type="text" name="quantity" nam class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <?php echo '<span class="text text-danger">'.form_error('quantity').'</span>'?>   
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Slug</label>
        <input type="text" name="slug" class="form-control" id="exampleInputPassword1">
        <?php echo '<span class="text text-danger">'.form_error('slug').'</span>'?>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Mô tả</label>
        <input type="text" name="description" class="form-control" id="exampleInputPassword1">
        <?php echo '<span class="text text-danger">'.form_error('description').'</span>'?>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Hình ảnh</label>
        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
        <small><?php if(isset($error)){echo $error;}?></small>
    </div>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Thương hiệu</label>
    <select name="brand_id" class="form-control" id="exampleFormControlSelect1">
    <?php
        foreach($brand as $key => $bra){
    ?>  
    <option value="<?php echo $bra->id?>"><?php echo $bra->title?></option>
    <?php
        }
    ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Danh mục</label>
    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
    <?php
        foreach($category as $key => $cate){
    ?>  
    <option value="<?php echo $cate->id?>"><?php echo $cate->title?></option>
    <?php
        }
    ?>
    </select>
  </div>
  <div class="form-group">
        <label for="exampleInputPassword1">Giá</label>
        <input type="text" name="price" class="form-control" id="exampleInputPassword1">
        <?php echo '<span class="text text-danger">'.form_error('price').'</span>'?>
    </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Tình trạng</label>
    <select name="status" class="form-control" id="exampleFormControlSelect1">
      <option value="1">Hiển thị </option>
      <option value="0">Không hiển thị</option>
    </select>
  </div>

    <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
  </div>
</div>
