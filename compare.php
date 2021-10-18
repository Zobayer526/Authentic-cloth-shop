<?php include("inc/header.php"); ?>
<?php 

$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
$uid= Session::get("userId");
 ?>
 <div class="ps-hero bg--cover" data-background="images/hero/back.jpg">
      <div class="ps-hero__content">
        <h1>Compare Products</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active">compare</li>
          </ol>
        </div>
      </div>
    </div>
    <div class="ps-content pt-40 pb-40">
      <div class="ps-container">
        <div class="table-responsive">
          <?php 
          $uid= Session::get("userId");
         $getCom=$pd->getComparedData($uid);
          if ($getCom) {
           ?>
          <table class="table ps-table--compare">
            <tbody>
              <tr>
                <td>Product</td>
                <?php 
				 $uid= Session::get("userId");
         $getCom=$pd->getComparedData($uid);
				 if ($getCom) {
				 	while ($result=$getCom->fetch_assoc()) {
				 ?>
                <td><a class="ps-product--table" href="details.php?pdId=<?php echo($result['productId']); ?>"><img src="admin/<?php echo($result['image']); ?>" alt=""> <?php echo($result['productName']); ?></a></td>
                <?php }} ?>
              </tr>
              <tr>
                <td>Pricing</td>
                <?php 
                $uid= Session::get("userId");
               $getCom=$pd->getComparedData($uid);
               if ($getCom) {
                while ($result=$getCom->fetch_assoc()) {
                 ?>
                <td><span class="price">TK <?php echo($result['price']); ?></span></td>
                <?php } }?>
              </tr>
              <tr>
                <td>Rating</td>
                
                  <?php 
                $uid= Session::get("userId");
               $getCom=$pd->getComparedData($uid);
               if ($getCom) {
                while ($result=$getCom->fetch_assoc()) {
                  $rating=0; 
                 $getrt=$pd->product_rating($result['productId']);
                  $re=$getrt->fetch_assoc(); 
                  
                  $rating=$re['avg'];
                 ?>
                 <td>
                <select class="ps-rating ps-shoe__rating" disabled>
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
                </td>
               <?php }} ?>
              </tr>
              <tr>
                <td>Available</td>
                 <?php 
               $uid= Session::get("userId");
               $getCom=$pd->getComparedData($uid);
               if ($getCom) {
                while ($result=$getCom->fetch_assoc()) {
                  $getrt=$pd->getSingleProduct($result['productId']);
                  $re=$getrt->fetch_assoc();
                  if ($re['qty']>0) {
                 ?>
                <td><span class="status in-stock">Available</span></td>
                <?php }else{ ?>
                <td><span class="status">Out of stock</span></td>
                 <?php }}} ?>
              </tr>
              
              
              <tr>
                <td>Order</td>
                 <?php 
               $uid= Session::get("userId");
               $getCom=$pd->getComparedData($uid);
               if ($getCom) {
                while ($result=$getCom->fetch_assoc()) {
                 ?>
                <td><a class="ps-btn ps-btn--yellow" href="details.php?pdId=<?php echo($result['productId']); ?>">Add to cart</a><a class="ps-btn--favorite ml-10" href="details.php?pdId=<?php echo($result['productId']); ?>"><i class="ba-heart"></i></a></td>
               
                <?php }} ?>
              </tr>
            </tbody>
          </table>
          <?php }else{?>
            <h2 class="text-center">You have no product compare</h2>
          <?php } ?>
        </div>
      </div>
    </div>

<?php include("inc/footer.php"); ?>