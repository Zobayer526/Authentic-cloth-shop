<?php include_once("inc/header.php"); ?>
<?php
if (!isset($_GET['pdId'])||$_GET['pdId']==NULL ||$_GET['pdId']!=$_GET['pdId']) {
    echo "<script>window.location = '404.php';</script>";
}else{
    // $id=$_GET['catid'];
    $id=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['pdId']);
    

}

if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
   
    $addCart=$ct->addToCart($_POST,$id);
}


 ?>
 <?php
     $userId=Session::get("userId");
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['compare'])) {
         $productId=$_POST['id'];
       $insertCompare= $pd->insertCompareData($productId,$userId);

       }
  ?>
  <?php
     // $userId=Session::get("userId");
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['whishlist'])) {
        // $productId=$_POST['productId'];
       $saveWlist= $pd->saveWlistData($id,$userId);

       }
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['productRating'])) {
       //$productId=$_POST['productId'];
       $productRating= $pd->productRating($_POST);

       }
  ?>
<div  class="ps-hero bg--cover" data-background="admin/upload/back.jpg">
        <div class="ps-hero__content">
            <h1 style="color: #f7f7f7;"> Product Details</h1>
            <div class="ps-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="index.php" style="color: #f7f7f7; font-size: 20px;">Home</a></li>
                    <li class="active" style="color: #f7f7f7; font-size: 20px;">Product Details</li>
                </ol>
            </div>
        </div>
    </div>
    <main class="ps-main">
        <div class="ps-container">
            <div class="ps-product--detail">
                <?php if(isset($productRating) && $productRating!='success') {?>
                <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> <?php echo($productRating);?>
                </div>
              <?php }?>
              <?php if(isset($productRating) && $productRating=='success') {?>
                <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> <?php echo('Rating added to this product');?>
                </div>
              <?php }?>
            	<?php 
            	$size=[];
            	$color=[];
				$getPd=$pd->getSingleProduct($id);
				//$getMultiImg=$pd->getMultiImg($id);
				if ($getPd) {
					while ($result=$getPd->fetch_assoc()) {
						//($result);
						/*
					if ($getMultiImg) {
					while ($result=$getMultiImg->fetch_assoc()) {
						var_dump($result);
					}
				}
				die();*/
				 ?>
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="ps-product__thumbnail">
                            <div class="ps-product__image">
                                <div class="item"><a href="admin/<?php echo($result['image']);?>"><img height="350" src="admin/<?php echo($result['image']) ;?>" alt=""></a></div>
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="ps-product__info">
                             <?php if(isset($addCart)) {?>
                            <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Warning!</strong> <?php echo($addCart);?>
                            </div>
                              <?php }?>
                              <?php if(isset($insertCompare)) {?>
                            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Success!</strong> <?php echo($insertCompare);?>
                            </div>
                          <?php }?>
                          <?php if(isset($saveWlist)) {?>
                            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Success!</strong> <?php echo($saveWlist);?>
                            </div>
                          <?php }?>
                            <h1 class="text-uppercase">Name: <?php echo($result['productName']);?></h1>
                            <div class="ps-product__rating">
                               <?php
                              $rating=0; 
                               $getrt=$pd->product_rating($result['id']);
                                $re=$getrt->fetch_assoc(); 
                                
                                $rating=$re['avg'];
                               ?>
                            <select class="ps-rating" disabled>
                             <?php 
                             for ($i=1; $i <=5 ; $i++) { 
                               if ($i<=$rating) {
                              ?>
                                <option value="1" ><?php echo($re['avg']); ?></option>
                                <?php 
                              }else{
                                 ?>
                                <option value="<?php echo($i); ?>" ><?php echo($i); ?></option>
                                <?php }} ?>
                            </select>
                            </div>
                            <h3 class="ps-product__price"> <span>TK  </span><?php echo($result['price']);?></h3>
                            <div class="ps-product__status">
                                <h5>Availability: <span>
                                 <?php 
                                 if ($result['qty']>=1) {
                                 	echo('<span style="color: green;">In stock</span>');
                                 }else{
                                 	echo('<span style="color: red;">Out of stock</span>');
                                 }
                                
                                ?></span></h5>
                                <h5>CATEGORIES:<a href="productbycat.php?catId=<?php echo($result['cat_id']) ;?>"> <?php echo($result['catName']);?></a></h5>
                            	
                            </div>
                            <div class="ps-product__shopping">
                                <form class="ps-form--shopping" action="" method="post">
                                    <?php 
                                    if ($result['size']!='null') {
                                    	$size[]=explode(',', $result['size']);
                                   
                                    ?>
                                    <select class="ps-select" title="Choose Size" name="size">
                                    	<?php 
                                    	foreach ($size[0] as  $sz) {
                                    	?>
                                        <option value="<?php echo($sz); ?>"><?php echo($sz); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php } ?>
                                     <?php 
                                    if ($result['colorName']!='null') {
                                    	$color[]=explode(',', $result['colorName']);
                                   
                                    ?>
                                    <select class="ps-select" title="Choose color" name="colorName">
                                    	<?php 
                                    	foreach ($color[0] as  $sz) {
                                    	?>
                                        <option value="<?php echo($sz); ?>"><?php echo($sz); ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php } ?>
                                    <div class="form-group--number">
                                        <button class="minus"><span></span>-</button>
                                        <input class="form-control" type="number" min="1" max="10" value="1" name="qty">
                                        <button class="plus"><span></span>+</button>
                                    </div>
                                 <div class="ps-product__sharing">
                            	<button class="ps-btn ps-btn--yellow" name="submit">Order Now</button>
                            	</div>
                                </form>
                            </div>
                             
                            <div class="ps-product__sharing">
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo($result['id']);?>">
                            <input class="ps-btn ps-btn--yellow" type="submit" class="buysubmit" name="whishlist" value="Save to list"/>
                     </form
                            </div>
                            	
                            </div>
                            
                         </div>
                    </div>
                </div>
                
                <div class="ps-product__content">
                    <ul class="tab-list" role="tablist">
                        <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Overview</a></li>
                        <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Review</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="tab_01">
                    	<p><?php echo($result['body']) ?></p>
                    </div>
                    <?php }}else{echo('product not found');} ?>
                    <div class="tab-pane" role="tabpanel" id="tab_02">
                        

                        <form class="ps-form--product-review" action="" method="post">
                        	<input type="hidden"  name="product-id" value="<?php echo($id); ?>">
                        	<input type="hidden" name="userId" value="<?php echo(Session::get("userId")); ?>">
                            <h4>ADD YOUR REVIEW</h4>
                            
                            <div class="row">
                            	 <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <label>Name:<sup>*</sup></label>
                                        <input class="form-control" type="text" placeholder="" name="name" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Email:<sup>*</sup></label>
                                        <input class="form-control" type="email" placeholder="" name="email" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Your rating</label>
                                        <select class="ps-rating" name="rating" required="required">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                                    <div class="form-group">
                                        <label>Your Review:</label>
                                        <textarea class="form-control" rows="6" name="review" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button class="ps-btn ps-btn--yellow" name="productRating">Submit Reviews</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php include("inc/footer.php"); ?>