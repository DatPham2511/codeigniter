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
					<?php 
										foreach($product_details as $key => $pro_det){
									?>	
								
										
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo base_url('uploads/product/'.$pro_det->image)?>"  alt="<?php echo $pro_det->title ?>"  />
								
							</div>
							

						</div>
						<form action="<?php echo base_url('add-to-cart/')?>" method="POST">
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?php echo $pro_det->title ?></h2>
								<input type="hidden" value="<?php echo $pro_det->id?>" name="product_id">
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span><?php echo number_format($pro_det->price,0,',','.')?>VNĐ</span><br>
									<input type="number" min="1" value="1"  name="quantity"/>
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Thêm vào giỏ hàng
									</button>
								</span>
								<p><b>Tình trạng:</b> New</p>
								<p><b>Thương hiệu:</b> <?php echo $pro_det->tenthuonghieu ?></p>
								<p><b>Danh mục:</b> <?php echo $pro_det->tendanhmuc ?></p>

								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
						</form>
					</div><!--/product-details-->
					
				<?php
				}
				?>
					
					
					
					
				</div>
			</div>
		</div>
	</section>