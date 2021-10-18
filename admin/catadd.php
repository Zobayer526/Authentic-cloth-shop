 <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>        
<?php include 'inc/header-nav.php';?>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    $CatName=$_POST['catname'];
    $insertCat=$cat->catInsert($CatName);
}
 ?>

 <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">New Catagory</h6>
                     <?php if(isset($insertCat)&& $insertCat=='success') {?>
                    <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> <?php echo(' Data insert successfully');?>
                    </div>
                  <?php }?>
                   <?php if(isset($insertCat) && $insertCat!='success') {?>
                    <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> <?php echo($insertCat);?>
                    </div>
                  <?php }?>
                
                    <div class="mT-30">
                        <form  method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Name:</label>
                                <input type="text" name="catname" class="form-control" id="exampleInputEmail1" placeholder="Enter Category Name" required="required"> 
                            </div>
                           
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</main>
<?php include 'inc/footer.php';?> 
