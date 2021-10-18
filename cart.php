<?php include_once("inc/header.php"); ?>
<?php 
if (isset($_GET['delPro'])) {
	$delId=preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delPro']);
	$delProduct=$ct->delProductByCart($delId);
}

 ?>
<?php 
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $cartId=$_POST['cartId'];  
    $quantity=$_POST['quantity'];
    $updateQuantity=$ct->updateCartQuantity($cartId,$quantity);
    if ($quantity<=0) {
    	$delProduct=$ct->delProductByCart($cartId);
    }
}
 ?>
 <?php 
 if (!isset($_GET['id'])) {
 	echo("<meta http-equiv='refresh' content='0;URL=?id=live'/>");
 }
  ?>

  <div class="ps-hero bg--cover" data-background="admin/upload/back.jpg">
      <div class="ps-hero__content">
        <h1 style="color: #f7f7f7;">Shopping Cart</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="index.php" style="color: #f7f7f7; font-size: 20px;">Home</a></li>
            <li class="active" style="color: #f7f7f7; font-size: 20px;">Shopping Cart</li>
          </ol>
        </div>
      </div>
    </div>
    <main class="ps-main">
      <div class="ps-container">
        <div class="ps-cart-listing">
          <div class="table-responsive">
          	<?php 
			    	if (isset($updateQuantity)) {
			    		echo($updateQuantity);
			    	}
			    	if (isset($delProduct)) {
			    		echo($delProduct);
			    	}
			    	 ?>
            <table class="table ps-table ps-table--listing">
              <thead>
                <tr>
                  <th>All Products</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              	<?php 
					 $getPd=$ct->getCartProduct();
					 if ($getPd) {
					 	$i=0;
					 	$sum=0;
					 	$qty=0;
					 	while ($result=$getPd->fetch_assoc()) {
					 		$i++;
					 
					 ?>
                <tr>
                  <td><a class="ps-product--table" href="details.php"><img class="mr-15" src="admin/<?php echo($result['image']); ?>" alt=""><?php echo($result['productName']) ;?></a></td>
                  <td>Tk. <?php echo($result['price']); ?></td>
                  <td>
                    <div class="form-group--number">
                    	<form action="" method="post">
                    	<input type="hidden" name="cartId" value="<?php echo($result['cartId']); ?>"/>
                     <input class="form-control" min="1" max="10" type="number" value="<?php echo($result['quantity']); ?>" name="quantity">
                     <input class="btn btn-success" type="submit" name="submit" value="Update"/>
                      </form>
                    </div>
                  </td>
                  <td>
                  	<strong>
                  		Tk. <?php 
				$total=$result['price']*$result['quantity'];
								echo($total); 
								?>
					</strong>
				</td>
                  <td>
                  	<a onclick="return confirm('Are you want to delete?');" href="?delPro=<?php echo($result['cartId']);?>"><div class="ps-remove"></div></a>
                    
                  </td>
                </tr>
                <?php 
				$qty=$qty+$result['quantity'];
				$sum=$sum+$total;
				Session::set("qty",$qty);
				Session::set("sum",$sum);
				 ?>
             <?php }} ?>
              </tbody>
            </table>
          </div>
          <div class="ps-cart__actions">
            <div class="ps-cart__promotion">
              
              <div class="form-group">
              	<a class="ps-btn ps-btn--gray" href="index.php">Continue Shopping</a>
                
              </div>
            </div>
            <div class="ps-cart__total">
            	<?php 
						$getData=$ct->checkCartTable();

								if ($getData) {
						 ?>
				<h3>Vat:<span>10%</span></h3>
              <h3>Total Price: <span>Tk.<?php 
								$vat=$sum*.1;
								$gtotal=$sum+$vat;
								echo($gtotal);
								 ?></span></h3>
              <?php }else{
					   	header("Location: index.php");
					   	// echo("Cart Empty! plz shop now");
					   	} ?>
              <a class="ps-btn" href="payment.php">Process to checkout</a>
            </div>
          </div>
        </div>
      </div>
    </main>

<?php include("inc/footer.php"); ?>