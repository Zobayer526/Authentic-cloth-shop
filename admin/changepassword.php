<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
<?php include_once'../classes/User.php';?>
<?php 
 $ur= new User();
if ($_SERVER['REQUEST_METHOD']=='POST') {

   $changePass=$ur->changePassword($_POST);  
  
    
 }
?>
 <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Change Password</h6>
                     <?php if(isset($changePass) && $changePass!='success') {?>
              <div class="alert alert-warning alert-dismissible" data-auto-dismiss="2000" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <strong style="color: red;">Warning!</strong> <?php echo($changePass);?>
              </div>
            <?php }?>
            <?php if(isset($changePass)&& $changePass=='success') {?>
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: green;">Success!</strong> <?php echo('Password updated successfully');?>
              </div>
            <?php }?>
                
                    <div class="mT-30">
                        
                        <form  method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Old password </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="old" placeholder="Enter Old Password" > 
                            </div>
                           
                             <div class="form-group">
                                <label for="exampleInputEmail1">New password </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="new"  placeholder="Enter New Password" > 
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