<?php 
ob_start();
 ?>
 <?php 
include_once '../lib/Session.php'; 
Session::checkSession();
include_once '../lib/Database.php';
include_once '../helpers/Format.php';
include_once'../classes/Employee.php';  
include_once'../classes/Report.php'; 
include_once'../classes/Product.php';
include_once'../classes/Catagory.php';
/*
spl_autoload_register(function($class){
include_once"../classes/".$class.".php";
});
*/
$db=new Database();
$fm=new Format();
$em=new Employee(); 
$report=new Report();
$pd=new Product(); 
$cat=new Catagory(); 


 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html>
<!-- Mirrored from colorlib.com/polygon/adminator/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Oct 2019 01:51:03 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Dashboard</title>
    <style>#loader{transition:all .3s ease-in-out;opacity:1;visibility:visible;position:fixed;height:100vh;width:100%;background:#fff;z-index:90000}#loader.fadeOut{opacity:0;visibility:hidden}.spinner{width:40px;height:40px;position:absolute;top:calc(50% - 20px);left:calc(50% - 20px);background-color:#333;border-radius:100%;-webkit-animation:sk-scaleout 1s infinite ease-in-out;animation:sk-scaleout 1s infinite ease-in-out}@-webkit-keyframes sk-scaleout{0%{-webkit-transform:scale(0)}100%{-webkit-transform:scale(1);opacity:0}}@keyframes sk-scaleout{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}</style>
    <link href="css/style.css" rel="stylesheet">
    
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>
  
    
</head>

<body class="app">

    <div id="loader">
        <div class="spinner"></div>
    </div>
    <script type="ca82714e3f4408fd63296179-text/javascript">
    window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        setTimeout(() => {
            loader.classList.add('fadeOut');
        }, 100);
    });
    </script>
 
    <div>
    