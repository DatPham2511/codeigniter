<section>
		<div class="container">
			<div class="row">
			<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->				
									<?php 
										foreach($category as $key => $cate){
									?>	
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="<?php echo base_url('danh-muc/'.$cate->id.'/'.$cate->slug) ?>"><?php echo $cate->title?></a></h4>
								</div>
							</div>
							<?php
									}
								?>
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Thương hiệu</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
								<?php 
										foreach($brand as $key => $bra){
									?>	
									<li><a href="<?php echo base_url('thuong-hieu/'.$bra->id.'/'.$bra->slug)?>"> <span class="pull-right"></span><?php echo $bra->title?></a></li>
									<?php
									}
								?>
								</ul>
							</div>
						</div><!--/brands_products-->
						
						
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Từ khóa: <?php echo $title?></h2>
						<?php 
										foreach($product as $key => $allpro){
									?>	
						<div class="col-sm-4">
							<div class="product-image-wrapper">
						<form action="<?php echo base_url('add-to-cart/')?>" method="POST">

								<div class="single-products">
									<div class="productinfo text-center">
									<input type="hidden" value="<?php echo $allpro->id?>" name="product_id">
								<input type="hidden" value="1" name="quantity">
										<img src="<?php echo base_url('uploads/product/'.$allpro->image)?>"  alt="<?php echo $allpro->title ?>" />
										<h2><?php echo number_format($allpro->price,0,',','.')?>VNĐ</h2>
										<p><?php echo $allpro->title?></p>
										<a href="<?php echo base_url('san-pham/'.$allpro->id.'/'.$allpro->slug)?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Chi tiết</a>
										<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ hàng
									</button>
									</div>
									
								</div>
										</form>
							</div>
						</div>
						<?php
									}
								?>
					</div><!--features_items-->
					
					
				</div>
			</div>
		</div>
	</section>
	