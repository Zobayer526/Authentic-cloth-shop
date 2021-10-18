<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
<?php 
include'../classes/Cart.php';
 $ct=new Cart();
?>
 <?php
if (!isset($_GET['AOId'])||$_GET['AOId']==NULL ||$_GET['AOId']!=$_GET['AOId']) {
    echo "<script>window.location = 'orderlist.php';</script>";
}else{
    // $id=$_GET['catid'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['AOId']);
   
   
}

if ($_SERVER['REQUEST_METHOD']=='POST'&& isset($_POST['send'])) {
    $updateProduct=$ct->insertService($_POST);
}

 ?>
<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Product Assign to Service Man</h6>
                     <?php if(isset($updateProduct)&&$updateProduct!='success') {?>
                    <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> <?php echo($updateProduct);?>
                    </div>
                  <?php }?>
                   <?php if(isset($updateProduct)&&$updateProduct=='success') {?>
                    <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> <?php echo("Insert successful");?>
                    </div>
                  <?php }?>
                
                    <div class="mT-30">
                         <?php 
                        $getorder=$ct->getSpecificProduct($id);
					if ($getorder) {
						$i=0;
						while ($result=$getorder->fetch_assoc()){
						 
                         ?>
                        <form action=""  method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">OrderId </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="order_id" value="<?php echo($result['orderId']); ?>" readonly="readonly"> 
                            </div>
                           <div class="form-group">
                                <label for="exampleInputEmail1">Order date </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date" value="<?php echo($result['date']); ?>" readonly="readonly"> 
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Size </label>
                                <select class="form-control" id="sel2" name="user_id" required="required">
                                <option>Select Service Person</option>
                                 <?php }}else{echo("User info not found");} ?>
	                            <?php 
	                             $getsevice=$em->getServiceMan();
	                            if ($getsevice) {
	                                while ($result=$getsevice->fetch_assoc()) {  
	                             ?>
                                <option value="<?php echo($result['userId']); ?>"><?php echo($result['name']); ?></option>
								    <?php }} ?>
                              </select>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Delivery Date </label>
                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="delivery_date" value="<?php echo($result['orderId']); ?>"> 
                            </div>
                            <input type="submit" name="send" class="btn btn-primary">
                            
                        </form>
                        
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</main>

<?php include 'inc/footer.php';?> 



