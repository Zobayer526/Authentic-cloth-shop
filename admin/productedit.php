<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
<?php include_once'../classes/Color.php'; ?>

<?php 
if (!isset($_GET['pdid'])||$_GET['pdid']==NULL ||$_GET['pdid']!=$_GET['pdid']) {
    echo "<script>window.location = 'productlist.php';</script>";
}else{
    // $id=$_GET['catid'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['pdid']);
}
 
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['Update'])) {
    $updateProduct=$pd->productUpdate($_POST,$_FILES,$id);
}
?>
 <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Update Product</h6>
                     <?php if(isset($updateProduct) && $updateProduct!='success') {?>
              <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong style="color: red;">Warning!</strong> <?php echo($updateProduct);?>
              </div>
            <?php }?>
            <?php if(isset($updateProduct)&& $updateProduct=='success') {?>
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: green;">Success!</strong> <?php echo('Product updated successfully');?>
              </div>
            <?php }?>
                
                    <div class="mT-30">
                         <?php 
                     
                     $getPd=$pd->getPdById($id);
                    if ($getPd) {
                     while ($re=$getPd->fetch_assoc()) {

                     ?>
                        <form  method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="productName" value="<?php echo($re['productName']); ?>" required>
                            </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Category&nbsp <span style="color: red;">*</span> </label>
                                <select class="form-control" id="sel2" name="catId" required>
                                 <?php 
                                $getCat=$cat->getAllCat();
                                if ($getCat) {
                                    while ($result=$getCat->fetch_assoc()) {  
                                ?>
                                <option 
                              <?php 
                              if ($re['cat_id']==$result['catId']) {?>
                                  selected="selected"
                              
                             <?php  } ?> value="<?php echo($result['catId']); ?>"><?php echo($result['catName']); ?></option>
                            <?php }}else{echo("Category not found");} ?>
                                
                              </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">City&nbsp <span style="color: red;">*</span> </label>
                                <select class="form-control" id="sel2" name="city">
                                 <?php 
                                
                                $getCity=$cat->getAllcity();
                                if ($getCity) {
                                    while ($result=$getCity->fetch_assoc()) {  
                                ?>
                               <option 
                              <?php 
                              if ($re['cityName']==$result['name']) {?>
                                  selected="selected"
                              
                             <?php  } ?> value="<?php echo($result['name']); ?>"><?php echo($result['name']); ?></option>
                            <?php }}else{echo("City not found");} ?>
                                
                              </select>
                            </div>
                            <div class="form-group"  style="display: none;">
                                <label for="exampleInputEmail1">Color </label>
                                <select multiple class="form-control" id="sel2" name="color[]">
                                  <option value="null" selected>None</option>
                                <?php 
                                $color=new Color();
                                $getColor=$color->getAllcolor();

                                if ($getColor) {
                                    while ($result=$getColor->fetch_assoc()) { 
                                ?>
                               <option value="<?php echo($result['colorName']); ?>"><?php echo($result['colorName']); ?></option>
                                <?php }}?>
                              </select>
                            </div>
                           <div class="form-group"  style="display: none;">
                                <label for="exampleInputEmail1">Size </label>
                                <select multiple class="form-control" id="sel2" name="size[]">
                                <option value="null" selected>None</option>
                                <option value="small(1/2 KG)">Small (1/2 KG)</option>
                                <option value="midium(1 KG)">Midium (1 KG)</option>
                                <option value="large(2 KG)">Large (2 KG)</option>
                              </select>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Content</label>
                                <textarea class="form-control" rows="5" id="comment" name="body"><?php echo($re['body']); ?></textarea>
                            </div>
                             <div class="form-group">
                                <label for="exampleFormControlFile1"> File input</label>
                                <img src="<?php echo($re['image']); ?>" height="100px" width="250px"/><br/>
                                <input type="file" name="image[]" class="form-control-file" id="exampleFormControlFile1" multiple>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Price&nbsp <span style="color: red;">*</span></label>
                                <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo($re['price']); ?>" required> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Quantity&nbsp <span style="color: red;">*</span></label>
                                <input type="number" min="1" name="qty" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo($re['qty']); ?>" max="1000" required > 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status </label>
                                <select class="form-control" id="sel2" name="status" >
                                    <?php if ($re['status']=='active') {?>
                                <option value="<?php echo($re['status']); ?>" selected>Active</option>
                                <option value="inactive">Inactive</option>
                                <?php }else{ ?>
                                <option value="<?php echo($re['status']); ?>" selected="selected">Inactive</option>
                                <option value="active">Active</option>
                                 <?php } ?>
                              </select>
                            </div>
                            <button type="submit" class="btn btn-primary" name="Update">Submit</button>
                        </form>
                         <?php }}else{echo("not retrive product");} ?>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</main>
<?php include 'inc/footer.php';?>


