<?php include("inc/header.php"); ?>
<?php 
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
        $addcontact=$ur->contactUs($_POST);
    }
?>
 <div class="ps-hero bg--cover" data-background="admin/upload/back.jpg">
      <div class="ps-hero__content">
        <h1 style="color: #afaba8;"> Authentic Cloth Shop</h1>
        <div class="ps-breadcrumb">
          <ol class="breadcrumb">
            <li><a href="index.php" style="color: #f7f7f7; font-size: 20px;">Home</a></li>
            <li class="active" style="color: #f7f7f7; font-size: 20px;">Contact Us</li>
          </ol>
        </div>
      </div>
    </div>
<div class="ps-contact">
      <div class="ps-container">
        <div class="row">
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
            <form class="ps-form--contact" action="" method="post">
              <div class="row">
              	<h1>Contact info</h1>
              	<?php if(isset($addcontact)&& $addcontact!='success') {?>
                    <div class="alert alert-danger" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong style="color: red;">Warning!</strong> <?php echo($addcontact);?>
                    </div>
                  <?php }?>
                     <?php if(isset($addcontact) && $addcontact=='success') {?>
                    <div class="alert alert-warni alert-success" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong style="color: green;">Success!</strong> <?php echo("<span> user data inserted successfully! please check your mail</span>");?>
                    </div>
                  <?php }?>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">

                  <div class="form-group">
                    <label>Name <sup>*</sup></label>
                    <input class="form-control" type="text" name="name" placeholder="Enter  name" required="required" autocomplete="autocomplete">
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                  <div class="form-group">
                    <label>Mobile <sup>*</sup></label>
                    <input class="form-control" type="tel" name="mobile" placeholder="Enter mobile number" required="required"> 
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                  <div class="form-group">
                    <label>Email <sup>*</sup></label>
                    <input class="form-control" type="text" name="email" placeholder="Enter Email Address" required="required">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Your Message <sup>*</sup></label>
                <textarea class="form-control" rows="7" name="body" required="required" placeholder="Message"></textarea>
              </div>
              <div class="form-group submit">
              	<input class="ps-btn ps-btn--yellow" type="submit" name="submit" value="Send"/>
                
              </div>
            </form>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
            <div class="ps-contact__info">
              <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12 ">
                </div>
             
               
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include("inc/footer.php"); ?>