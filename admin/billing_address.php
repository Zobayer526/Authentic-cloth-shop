<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
<?php include_once'../classes/User.php'; ?>

<?php
if (!isset($_GET['cusId'])||$_GET['cusId']==NULL ||$_GET['cusId']!=$_GET['cusId']) {
    echo "<script>window.location = 'inbox.php';</script>";
}else{
    // $id=$_GET['catid'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['cusId']);
}

if ($_SERVER['REQUEST_METHOD']=='POST') {
     echo "<script>window.location = 'orderlist.php';</script>";
}
 ?>
 <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Customer Billing Address</h6>
                     <?php if(isset($updateCat)) {?>
                    <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> <?php echo($updateCat);?>
                    </div>
                  <?php }?>
                
                    <div class="mT-30">
                         <?php 
                        $cus=new User(); 
                        $getCust=$cus->getUserData($id);
                        if ($getCust) {
                           while ($re=$getCust->fetch_assoc()) {

                         ?>
                        <form  method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="catname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo($re['name']) ?>" readonly="readonly"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile</label>
                                <input type="text" name="catname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo($re['mobile']) ?>" readonly="readonly"> 
                            </div>
                           <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" name="catname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo($re['email']) ?>" readonly="readonly"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">City</label>
                                <input type="text" name="catname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo($re['city']) ?>" readonly="readonly"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">ZipCode</label>
                                <input type="text" name="catname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo($re['zipcode']) ?>" readonly="readonly"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <input type="text" name="catname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo($re['address']) ?>" readonly="readonly"> 
                            </div>
                            
                        </form>
                        <?php }}else{echo("Addtess not found");} ?>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</main>
<?php include 'inc/footer.php';?>