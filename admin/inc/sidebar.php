<?php
include_once '../lib/Session.php'; 
Session::checkSession(); 
 ?>
<div class="sidebar">
            <div class="sidebar-inner">
                <div class="sidebar-logo">
                    <div class="peers ai-c fxw-nw">
                        <div class="peer peer-greed"><a class="sidebar-link td-n" href="dashbord.php" class="td-n">
                                <div class="peers ai-c fxw-nw">
                                    <div class="peer">
                                        <div class="logo">
                                            <script type="text/javascript" style="display:none">
                                            //<![CDATA[
                                            window.__mirage2 = { petok: "8795bed76a8ed0dbe30147893aae680e44222b23-1571190665-86400" };
                                            //]]>
                                            </script>
                                            <script type="text/javascript" src="js/mirage2.min.js"></script>
                                            
                                        </div>
                                    </div>
                                    <div class="peer peer-greed">
                                        <h5 class="lh-1 mB-0 logo-text">Administrator</h5>
                                    </div>
                                </div>
                            </a></div>
                        <div class="peer">
                            <div class="mobile-toggle sidebar-toggle"><a href="#" class="td-n"><i class="ti-arrow-circle-left"></i></a></div>
                        </div>
                    </div>
                </div>
                <ul class="sidebar-menu scrollable pos-r">
                    <li class="nav-item mT-30 active"><a class="sidebar-link" href="dashbord.php" default><span class="icon-holder"><i class="c-blue-500 ti-home"></i> </span><span class="title">Dashboard</span></a></li>
                    <?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='1') { ?>
                    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Manage Slider</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="sidebar-link" href="slideradd.php">Add slider</a></li>
                            <li><a class="sidebar-link" href="sliderlist.php">Slider List</a></li>
                           
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Manage Category</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="sidebar-link" href="catadd.php">Add Category</a></li>
                            <li><a class="sidebar-link" href="catlist.php">Category List</a></li>
                           
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Manage City</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="sidebar-link" href="cityadd.php">Add City</a></li>
                            <li><a class="sidebar-link" href="citylist.php">City List</a></li>
                           
                        </ul>
                    </li>
                     <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Manage Product</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="sidebar-link" href="productadd.php">Add Product </a></li>
                            <li><a class="sidebar-link" href="productlist.php">Product List</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Manage Order</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="sidebar-link" href="orderlist.php">Order List</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php 
                    if (Session::get("adminRole")=='2') {
                    ?>
                    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Manage Supply</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="sidebar-link" href="deliverylist.php">Delivery List</a></li>
                        </ul>
                    </li>
                    <?php } ?>
                    <?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='1') { ?>
                     <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Manage employee</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="sidebar-link" href="addemployee.php">Add Employee</a></li>
                            <li><a class="sidebar-link" href="userlist.php">User List</a></li>
                            <li><a class="sidebar-link" href="employeelist.php">Employee List</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);"><span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Reports</span> <span class="arrow"><i class="ti-angle-right"></i></span></a>
                        <ul class="dropdown-menu">
                            <li><a class="sidebar-link" href="statistics.php">Product Sale Report</a></li>
                            <li><a class="sidebar-link" href="monthlystatic.php">Monthly Sales Report</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="sidebar-link" href="emaillist.php"><span class="icon-holder"><i class="c-brown-500 ti-email"></i> </span><span class="title">Email</span></a></li>
                    <li class="nav-item"><a class="sidebar-link" href="compose.php"><span class="icon-holder"><i class="c-blue-500 ti-share"></i> </span><span class="title">Compose</span></a></li>
                    <?php } ?>
                    
                </ul>
            </div>
</div>