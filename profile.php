<?php ob_start(); ?>
<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
 ?>
 <?php 
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['changeAccount'])) {
    $ur->changeUserAccount($_POST,$_FILES);
}
if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['changePassword'])) {
    $ur->ChangeUserPassword($_POST);
}
 ?>
    <div class="ps-hero bg--cover" data-background="admin/upload/back.jpg">
        <div class="ps-hero__content">
            <h1 style="color: #f7f7f7; font-size: 20px;">Profile</h1>
            
        </div>
    </div>
    <style type="text/css">
      #contact-map{
        height: 0 !important;
      }
      #left{

        border-left: 1px dashed #333;
        padding-left: 40px;
      }
      .page-title{
        padding-bottom: 10px;
      }
    </style>
    <div id="contact-map" data-address="New York, NY" data-title="Funiture!" data-zoom="17"></div>
    <div class="ps-contact">
        <div class="ps-container">
          <div class="row mb-100">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                  <div class="text-center">
                    <h3 style="border-bottom: 1px solid;">User Profile</h3>
                  <p><img style=" border-radius: 50%;" height="150" src="<?php echo Session::get('userImg'); ?>"></p>
                  <h3>Name: <?php echo Session::get('userName'); ?></h3>
                  <h3>Email: <?php echo Session::get('userEmail'); ?></h3>
                  </div>
                </div>
              </div>
            <div class="row">
                  <?php if(isset($_SESSION['error'])) {?>
                  <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong style="color: red;">Warning!</strong>
                       <?php echo($_SESSION['error']);

                       unset($_SESSION['error']);
                       ?>
                  </div>
                <?php }?>
                <?php if(isset($_SESSION['success'])) {?>
                <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong style="color: green;">Success!</strong> 
                    <?php echo($_SESSION['success']);

                       unset($_SESSION['success']);
                       ?>
                  </div>
                <?php }?>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                  <div id="loginform">
                  <div class="page-title">
                            <h4>Change Password</h4>
                     </div>
                    <form class="ps-form--contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                    <label>Old Password <sup>*</sup></label>
                                    <input class="form-control" type="Password" placeholder="Old Password" name="old-pass" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                    <label>New Password <sup>*</sup></label>
                                    <input class="form-control" type="Password" placeholder="New Password" name="new-pass" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group submit">
                            <button type="submit" name="changePassword" class="ps-btn ps-btn--yellow"> Update Password</button>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="ps-contact__info" id="left">
                        <div class="row">
                          <div class="page-title">
                            <h4>Account Setting</h4>
                            <?php if(isset($userReg) && $userReg!='success') {?>
                    <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong style="color: red;">Warning!</strong> <?php echo($userReg);?>
                    </div>
                  <?php }?>
                  <?php if(isset($userReg)&& $userReg=='success') {?>
                  <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong style="color: green;">Success!</strong> <?php echo('Registration success.Please login');?>
                    </div>
                  <?php }?>
                          
                     </div>
                    <form class="ps-form--contact" action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                          
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                <div class="form-group">
                                    <label>User name <sup>*</sup></label>
                                    <input class="form-control" type="text" placeholder="Enter Name" title="Please enter only string" name="name" required="required">
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                <div class="form-group">
                                    <label>User image <sup>*</sup></label>
                                    <input class="form-control" type="file" name="img" required="required">
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                <div class="form-group">
                                  <label for="pwd">Phone*</label>
                                  <input type="text" class="form-control" name="phone" placeholder="Your Phone" id="pwd" required="required">
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                <div class="form-group">
                                    <label>Email<sup>*</sup></label>
                                    <input class="form-control" type="email" placeholder="Enter email" name="email" required="required">
                                </div>
                            </div>

                        </div>
                        <div class="form-group submit">
                            <button type="submit" name="changeAccount" class="ps-btn ps-btn--yellow">Save Changes</button>
                        </div>
                    </form>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("inc/footer.php"); ?>
