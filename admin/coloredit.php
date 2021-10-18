 <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>        
<?php include 'inc/header-nav.php';?>
<?php include '../classes/Color.php'; ?>
<?php
if (!isset($_GET['colorid'])||$_GET['colorid']==NULL ||$_GET['colorid']!=$_GET['colorid']) {
    echo "<script>window.location = 'colorlist.php';</script>";
}else{
    // $id=$_GET['colorid'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['colorid']);
}
$color=new Color(); 
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $colorName=$_POST['colorName'];
    $updateCat=$color->colorUpdate($colorName,$id);
}
 ?>

 <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Update Color</h6>
                        
          <?php if(isset($updateCat) && $updateCat!='success') {?>
              <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong style="color: red;">Warning!</strong> <?php echo($updateCat);?>
              </div>
            <?php }?>
            <?php if(isset($updateCat)&& $updateCat=='success') {?>
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: green;">Success!</strong> <?php echo('<span >product deleted successful</span>');?>
              </div>
            <?php }?>
                
                    <div class="mT-30">
                         <?php 
                        $getcolor=$color->getcolorById($id);
                        if ($getcolor) {
                           while ($re=$getcolor->fetch_assoc()) {
                         
                         ?>
                        <form  method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" name="colorName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo($re['colorName']) ?>" required> 
                            </div>
                           
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                        <?php }}else{echo("catagory not found");} ?>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</main>
<?php include 'inc/footer.php';?> 
