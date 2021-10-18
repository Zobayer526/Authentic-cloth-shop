<?php include '../classes/adminloging.php'; ?>
<?php
 $al=new adminloging();
if ($_SERVER['REQUEST_METHOD']=='POST') {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $loginchk=$al->adminLogin($email,$password);
}
 ?>
 <?php 
$role=Session::get("adminRole");
if ($role!='0') {
  
$id=Session::get("adminId");
$name=Session::get("adminName");
$page = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['PHP_SELF']}"; 
$query="INSERT INTO track_visitor (userId,user_name,page) VALUES ('$id','$name',  '$page')";
$insertdata=$db->insert($query);
// if ($insertdata) {
//  echo "inserted";
// }else{
//  echo("not");
// }
}
 ?>
<!DOCTYPE html>
<html>
<!-- Mirrored from colorlib.com/polygon/adminator/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2019 01:51:16 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Sign In</title>
    <style>#loader{transition:all .3s ease-in-out;opacity:1;visibility:visible;position:fixed;height:100vh;width:100%;background:#fff;z-index:90000}#loader.fadeOut{opacity:0;visibility:hidden}.spinner{width:40px;height:40px;position:absolute;top:calc(50% - 20px);left:calc(50% - 20px);background-color:#333;border-radius:100%;-webkit-animation:sk-scaleout 1s infinite ease-in-out;animation:sk-scaleout 1s infinite ease-in-out}@-webkit-keyframes sk-scaleout{0%{-webkit-transform:scale(0)}100%{-webkit-transform:scale(1);opacity:0}}@keyframes sk-scaleout{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}</style>
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="app">
    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script type="e52c4ca98ca1cd1c43801a11-text/javascript">
    window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        setTimeout(() => {
            loader.classList.add('fadeOut');
        }, 300);
    });
    </script>
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image:url(assets/static/images/back.jpg)">
            <div class="pos-a centerXY">
                <div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px">
                    <script type="text/javascript" style="display:none">
                    //<![CDATA[
                    window.__mirage2 = { petok: "c66f3374e4bcf172936d065c3ac00a009b0a9beb-1571190668-86400" };
                    //]]>
                    </script>
                    <script type="text/javascript" src="js/mirage2.min.js"></script>
                    <img class="pos-a centerXY" data-cfsrc="assets/static/images/lg.png" alt="" style="display:none;visibility:hidden;"><noscript><img class="pos-a centerXY" src="assets/static/images/back.png" alt=""></noscript>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
            <h4 class="fw-300 c-grey-900 mB-40">Admin Login</h4>
                  <?php if(isset($loginchk) && $loginchk!='success') {?>
                    <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> <?php echo($loginchk);?>
                    </div>
                  <?php }?>
            <form action="" method="post">
                <div class="form-group"><label class="text-normal text-dark">Email</label><input type="email" class="form-control" name="email" placeholder="jon@gmail.com" required="required"></div>
                <div class="form-group"><label class="text-normal text-dark">Password</label><input type="password" name="password" class="form-control" placeholder="Password" required="required"></div>
                <div class="form-group">
                    <div class="peers ai-c jc-sb fxw-nw">
                        <div class="peer">
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                <label for="inputCall1" class="peers peer-greed js-sb ai-c">
                                    <a href="forgetpass.php" class="peer peer-greed">Forgot Password</a>
                                </label>
                            </div>
                        </div>
                        <div class="peer"><button class="btn btn-primary">Login</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="e52c4ca98ca1cd1c43801a11-text/javascript" src="js/vendor.js"></script>
    <script type="e52c4ca98ca1cd1c43801a11-text/javascript" src="js/bundle.js"></script>
    <script src="js/rocket-loader.min.js" data-cf-settings="e52c4ca98ca1cd1c43801a11-|49" defer=""></script>
</body>
<!-- Mirrored from colorlib.com/polygon/adminator/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2019 01:51:16 GMT -->

</html>