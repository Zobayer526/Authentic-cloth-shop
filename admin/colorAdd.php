 <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>        
<?php include 'inc/header-nav.php';?>
<?php include '../classes/Color.php'; ?>

<?php
$color=new Color(); 
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $colorName=$_POST['colorName'];
    $insertColor=$color->colorInsert($colorName);
}
 ?>

 <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">New Color</h6>
                         
          <?php if(isset($insertColor) && $insertColor!='success') {?>
              <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong style="color: red;">Warning!</strong> <?php echo($insertColor);?>
              </div>
            <?php }?>
            <?php if(isset($insertColor)&& $insertColor=='success') {?>
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: green;">Success!</strong> <?php echo('<span >Data insert successful</span>');?>
              </div>
            <?php }?>
                
                    <div class="mT-30">
                        <form  method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="text" name="colorName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required="required"> 
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
