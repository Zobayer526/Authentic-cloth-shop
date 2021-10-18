 <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>        
<?php include 'inc/header-nav.php';?>
<?php
if (!isset($_GET['catid'])||$_GET['catid']==NULL ||$_GET['catid']!=$_GET['catid']) {
    echo "<script>window.location = 'citylist.php';</script>";
}else{
    // $id=$_GET['catid'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['catid']);
}
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $CatName=$_POST['catname'];
    $updateCat=$cat->cityUpdate($CatName,$id);
}
 ?>

 <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Update City</h6>
                    <?php if(isset($updateCat) && $updateCat=='success') {?>
                    <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> <?php echo(' Data insert successfully');?>
                    </div>
                  <?php }?>
                   <?php if(isset($updateCat) && $updateCat!='success') {?>
                    <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> <?php echo($updateCat);?>
                    </div>
                  <?php }?>
                
                    <div class="mT-30">
                         <?php 
                        $getcat=$cat->getCityById($id);
                        if ($getcat) {
                           while ($re=$getcat->fetch_assoc()) {
                         
                         ?>
                        <form  method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" name="catname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo($re['name']) ?>" required> 
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
