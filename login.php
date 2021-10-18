<?php ob_start(); ?>
<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==true) {
   header("Location:order.php");
}
 ?>
 <?php
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['login'])) {
     $userLog=$ur->userLogin($_POST);
       }
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['registration'])) {
     $userReg=$ur->userRegtration($_POST);
       }

if ($_SERVER['REQUEST_METHOD']=='POST' &&isset($_POST['forgot'])) {
   
    $passrecover=$ur->passRecovery($_POST);
}
        
  ?>
    <div class="ps-hero bg--cover" data-background="admin/upload/back.jpg">
        <div class="ps-hero__content">
            <h1 style="color: #f7f7f7; font-size: 20px;">Login/Registration</h1>
            
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
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                  <div id="loginform">
                  <div class="page-title">
                            <h4>LogIn form</h4>
                            <?php if(isset($userLog)) {?>
                            <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong style="color: red;">Warning!</strong> <?php echo($userLog);?>
                            </div>
                          <?php }?>
                            
                     </div>
                    <form class="ps-form--contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                    <label>Email <sup>*</sup></label>
                                    <input class="form-control" type="email" placeholder="Enter email" name="email" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                    <label>Password <sup>*</sup></label>
                                    <input class="form-control" type="Password" name="password" placeholder="Enter Your Password" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group submit">
                            <button type="submit" name="login" class="ps-btn ps-btn--yellow">Submit</button>
                            <a id="clickme" href="forgotpassword.php" class="pull-right"> <strong>Forget password</strong></a>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="ps-contact__info" id="left">
                        <div class="row">
                          <div class="page-title">
                            <h4>Registration form</h4>
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
                    <form class="ps-form--contact" action="" method="post">
                        <div class="row">
                          

                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                    <label>Name <sup>*</sup></label>
                                    <input class="form-control" type="text" name="name" placeholder="Your Name" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                    <label for="pwd">Country:</label>
                                    <input type="text" class="form-control" name="country" placeholder="Your Country" id="pwd" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                  <label for="email">City:</label>
                                   <input type="text" class="form-control" name="city" placeholder="Your City" id="email" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                  <label for="pwd">Phone:</label>
                                  <input type="text" class="form-control" name="phone" placeholder="Your Phone" id="pwd" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                  <label for="email">Zip:</label>
                                   <input type="text" class="form-control" name="zip" placeholder="Your Zip-Code" id="email" required="required">
                                </div>
                            </div>
                             <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                 <label for="email">Address:</label>
                                <input type="text" class="form-control" name="address" placeholder="Your Address" id="email" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                    <label>Email <sup>*</sup></label>
                                    <input class="form-control" type="email" placeholder="Enter email" name="email" required="required">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="form-group">
                                   <label for="pwd">Password:</label>
                                  <input type="password" class="form-control" name="password" placeholder="Password" id="pwd" required="required"><br>
                                </div>
                            </div>

                        </div>
                        <div class="form-group submit">
                            <button type="submit" name="registration" class="ps-btn ps-btn--yellow">Submit</button>
                        </div>
                    </form>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("inc/footer.php"); ?>
