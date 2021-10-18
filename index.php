<?php include_once 'inc/header.php';?>
    <!-- bannar-->
    <div class="pb-80" id="slider" >
      <div class="ps-carousel--animate ps-carousel-nav">
        <?php 
        $slider=$cat->getActiveslider();
        if ($slider) {
        while ($result=$slider->fetch_assoc()) {
         ?>
        <div class="item">
            <div class="ps-banner bg--cover" ><img height="550" src="admin/<?php echo($result['homeimg']);?>" alt="">
              <div class="ps-banner__content">
                <h3 class="animated" data-animation-in="fadeInRight" data-delay-in="0.3"><?php //echo($result['title']);?></h3>
              </div>
            </div>
          </div>
        <?php }} ?>
      </div>
    </div>
   <!-- award-->
    <div class="ps-awards">
      <div class="ps-container">
        <div class="ps-section__header">
          <h3 class="ps-section__title">Authentic Cloth Shop</h3>
          <p>WELCOME TO THE STORE</p><span><img src="images/icons/floral.png" alt=""></span>
        </div>
        <div class="ps-section__content">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
              <div class="ps-block--award"><img height="130" style=" border-radius: 50%;" src="admin/upload/logo.png" alt="">
                <p>The Authentic Cloth Shop is a multifaceted online business company. 
                  The company sells a wide range of products such as Sari of Tangail,
                   Tangail Cotton Jamdani Sari, Dhakai Jamdani, Kushtia's Baka sewing, Rakhine woolen sheets, Khadi Punjabi of Comilla,
                    Nakshi Katha and other products. 
                  The products have different categories such as men's, women's clothing.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
              <div class="ps-block--award"><img height="130" style=" border-radius: 50%;" src="admin/upload/logo.png" alt="">
              <p>The Authentic Cloth Shop is a multifaceted online business company. 
                  The company sells a wide range of products such as Sari of Tangail,
                   Tangail Cotton Jamdani Sari, Dhakai Jamdani, Kushtia's Baka sewing, Rakhine woolen sheets, Khadi Punjabi of Comilla,
                    Nakshi Katha and other products. 
                  The products have different categories such as men's, women's clothing.</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
              <div class="ps-block--award"><img height="130" style=" border-radius: 50%;"  src="admin/upload/logo.png" alt="">
              <p>The Authentic Cloth Shop is a multifaceted online business company. 
                  The company sells a wide range of products such as Sari of Tangail,
                   Tangail Cotton Jamdani Sari, Dhakai Jamdani, Kushtia's Baka sewing, Rakhine woolen sheets, Khadi Punjabi of Comilla,
                    Nakshi Katha and other products. 
                  The products have different categories such as men's, women's clothing.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

 <!-- home-2 product-->
    <div class="ps-home-product">
      <div class="ps-container">
        <div class="ps-section__header">
          <h3 class="ps-section__title">Our Authentic Cloths</h3>
          <p>Delivering to your door</p><span><img src="images/icons/floral.png" alt=""></span>
        </div>
        <div class="ps-section__content">
          <div class="row">
              <?php 
              $getNpd=$pd->getNewProduct();
              if ($getNpd) {
                while ($result=$getNpd->fetch_assoc()) {
               ?>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 ">
              <div class="ps-product">
                <div class="ps-product__thumbnail"><img width="210" height="160" src="admin/<?php echo($result['image']); ?>" alt=""><a class="ps-product__overlay" href="details.php?pdId=<?php echo($result['id']); ?>"></a>
                    <ul class="ps-product__actions">
                        <!--<li><a href="details.php?pdId=<?php //echo($result['id']); ?>" data-tooltip="Compare"><i class="ba-reload"></i></a></li>-->
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
            <?php }} ?>
          </div>
        </div>
    <div class="ps-section__footer text-center"><a class="ps-btn" href="allproducts.php">Load more</a></div>
      </div>
    </div>

<?php include_once 'inc/footer.php';?>

<script type="text/javascript">
</script>