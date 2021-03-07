<?php
class HomeController extends Controller
{
    public function productLister($productList){
        
        foreach($productList AS $eachProduct){
            echo'
            <li>
			<div class="mt-product1 mt-paddingbottom20">
				<div class="box">
					<div class="b1">
						<div class="b2">
							<a href="product.php?id='.$eachProduct['id'].'"><img src="'.$GLOBALS['PRODUCT_DIRECTORY'].$eachProduct['product_master_image'].'" alt="image description"></a>
							<span class="caption">
								<span class="new">NEW</span>
							</span>
                            <!--
							<ul class="mt-stars">
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star"></i></li>
								<li><i class="fa fa-star-o"></i></li>
							</ul>
                            -->
							<ul class="links">
								<li><a href="#"><i class="icon-handbag"></i><span>Add to Cart</span></a></li>
								<li><a href="#"><i class="icomoon icon-heart-empty"></i></a></li>
								<li><a href="#"><i class="icomoon icon-exchange"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="txt">
					<strong class="title"><a href="product-detail.html">'.$eachProduct['product_name'].'</a></strong>
					<span class="price"><i class="fa fa-eur"></i> <span>'.$eachProduct['product_price'].'</span></span>
				</div>
			</div>
		</li>
		';    
            
        
        }
    
    }

}

?>

                