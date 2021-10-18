<?php include("inc/header.php"); ?>
<?php
$login= Session::get("userlogin");
if ($login==false) {
   header("Location:login.php");
}
if (!isset($_GET['orderId'])||$_GET['orderId']==NULL ||$_GET['orderId']!=$_GET['orderId']) {
    echo "<script>window.location = 'payment.php';</script>";
}else{
    // $id=$_GET['catid'];
    $oid=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['orderId']);
   
   
}
 ?>
 
    <div  class="ps-hero bg--cover" data-background="admin/upload/back.jpg">
        <div class="ps-hero__content">
            <h1 style="color: #f7f7f7;">Success</h1>
            <div class="ps-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="index.php" style="color: #f7f7f7; font-size: 20px;">Home</a></li>
                    <li class="active" style="color: #f7f7f7; font-size: 20px;">Success</li>
                </ol>
            </div>
        </div>
    </div>
    <style type="text/css">
      .center {
    margin: 0 auto;
    width: 80%;
}
    </style>
    
    <div class="ps-contact">
        <div class="container-fluid">
            <div class="row">
             <div class="center">
        <div class="col-xs-12 col-sm-12">
            
        </div>
        <div class="col-xs-12 col-sm-12">
            <h1 style="border-bottom: 5px; border-color: red;border-bottom-width: 6px;">Success</h1>
            <hr/>
                   <?php
        $sum=0;
       $uid= Session::get("userId");
       $amount=$ct->payableAmount($uid,$oid);
       if ($amount) {
       
          while ($result=$amount->fetch_assoc()) {
            $sum=$result['amount'];
            
          }
        } 
        ?>
         <p>Total payable amount(including vat) : TK
       <?php 
       echo($sum."<br>");
       
        ?>
       </p>
            <p>Thank you for parchase.Receive your order succseefully.we will contact you asap with delivery details.here is your order details....<a href="orderdetails.php" style="color: green;">visit here..</a></p>

        </div>
        <div class="col-xs-12 col-sm-4">
            
        </div>
    </div>
            </div>
        </div>
    </div>

 <?php include("inc/footer.php"); ?>
