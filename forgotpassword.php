<?php ob_start(); ?>
<?php include("inc/header.php"); ?>
<?php
include_once'classes/User.php';
$user=new User();
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
    <div class="ps-hero bg--cover" data-background="images/hero/login.jpg">
        <div class="ps-hero__content">
            <h1>Login/Forget password</h1>
            
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
                    <div >
                     <div class="page-title">
                            <h4>Forget Password form</h4>
                    <?php if(isset($passrecover) && $passrecover!='success') {?>
                    <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong style="color: red;">Warning!</strong> <?php echo($passrecover);?>
                    </div>
                  <?php }?>
                  <?php if(isset($passrecover)&& $passrecover=='success') {?>
                  <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong style="color: green;">Success!</strong> <?php echo('Message has been sent to your mail.Please check mail to login');?>
                    </div>
                  <?php }?>
                            
                     </div>
                    <form class="ps-form--contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                <div class="form-group">
                                    <label>Email <sup>*</sup></label>
                                    <input class="form-control" type="email" placeholder="Enter email" name="email" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group submit">
                            <button type="submit" name="forgot" class="ps-btn ps-btn--yellow">Send</button>
                        </div>
                    </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="ps-contact__info" id="left">
                        <div class="row">
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
                            <a id="clickme" href="login.php" class="pull-right"> <strong>Registration</strong></a>
                        </div>
                    </form>
                    </div>    
                      
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include("inc/footer.php"); ?>
<script type="text/javascript">
  /*$(document).ready(function(){
    $("#transaction").hide();
    $('#clickme').click(function(e){
      e.preventDefault();
      console.log('hit')
      $("#transaction").show();
      $("#loginform").hide();
    });
    $('#showlogin').click(function(e){
      e.preventDefault();
      console.log('hit')
      $("#transaction").hide();
      $("#loginform").show();
    });
});*/
</script>