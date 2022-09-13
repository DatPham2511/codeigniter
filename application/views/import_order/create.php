
<div class="card">
  <div class="card-header">
    Thêm đơn nhập hàng
  </div>
  <div class="card-body">
  <form action="<?php echo base_url('import-order/store')?>" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleFormControlSelect1">Sản phẩm nhập</label>
    <select name="product_id" class="form-control" id="exampleFormControlSelect1">
    <?php
        foreach($product as $key => $pro){
    ?>  
    <option value="<?php echo $pro->id?>"><?php echo $pro->title?></option>
    <?php
        }
    ?>
    </select>
  </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Số lượng sản phẩm</label>
        <input type="text" name="quantity" nam class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <?php echo '<span class="text text-danger">'.form_error('quantity').'</span>'?>   
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Giá nhập</label>
        <input type="text" name="price" class="form-control" id="exampleInputPassword1">
        <?php echo '<span class="text text-danger">'.form_error('price').'</span>'?>
    </div>
    <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
  </div>
</div>
