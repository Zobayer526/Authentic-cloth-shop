<?php include("inc/header.php"); ?>
<?php 
if (!isset($_GET['catId'])||$_GET['catId']==NULL ||$_GET['catId']!=$_GET['catId']) {
    echo "<script>window.location = '404.php';</script>";
}else{
    // $id=$_GET['catId'];
    $id=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catId']);
}
 ?>
 <!-- bannar-->
    <div  class="ps-hero bg--cover" data-background="admin/upload/back.jpg">
        <div class="ps-hero__content">
            <h1 style="color: #f7f7f7;"> Kids Toy Store</h1>
            <div class="ps-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="index.php" style="color: #f7f7f7; font-size: 20px;">Home</a></li>
                    <li class="active" style="color: #f7f7f7; font-size: 20px;">Search by category</li>
                </ol>
            </div>
        </div>
    </div>
   
    <!-- home-2 product-->
    <main class="ps-shop">
        <div class="ps-shop__wrapper">
            <div class="ps-shop__banners">
                <div class="ps-row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="ps-collection">
                        <a class="ps-collection__overlay" href="#"></a><img style="visibility: hidden;" height="2px" src="images/collection/product-1.jpg" alt="">
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                        <div class="ps-collection"><a class="ps-collection__overlay" href="#"></a><img style="visibility: hidden;" height="2px" src="images/collection/product-2.jpg" alt=""></div>
                    </div>
                </div>
            </div>
            
            <div class="ps-row">
                <?php 
              $getNpd=$pd->productByCat($id);
              if ($getNpd) {
                while ($result=$getNpd->fetch_assoc()) {
               ?>

                <div class="ps-column">
                    <div class="ps-product">
                        <div class="ps-product__thumbnail"><img width="210" height="160" src="admin/<?php echo($result['image']); ?>" alt=""><a class="ps-product__overlay" href="details.php?pdId=<?php echo($result['id']); ?>"></a>
                            <ul class="ps-product__actions">
                                <li><a href="details.php?pdId=<?php echo($result['id']); ?>" data-tooltip="Favorite"><i class="ba-heart"></i></a></li>
                                <li><a href="details.php?pdId=<?php echo($result['id']); ?>" data-tooltip="Add to Cart"><i class="ba-shopping"></i></a></li>
                            </ul>
                        </div>
                        <div class="ps-product__content"><a class="ps-product__title" href="details.php?pdId=<?php echo($result['id']); ?>"><?php echo($result['productName']); ?></a>
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
                            <p class="ps-product__price">TK <?php echo($result['price']); ?></p>
                        </div>
                    </div>
                </div>
         <?php }}else{?>
        <span class="text-center"><h1><?php echo("Product Not found"); ?></h1></span>
        <?php } ?>
  </div>
 
</div>
<?php include_once 'inc/sidebar.php';?>
        
    </main>
<?php include("inc/footer.php"); ?>