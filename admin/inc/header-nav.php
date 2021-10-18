<?php
include_once '../lib/Session.php'; 
Session::checkSession(); 
 ?>
<div class="page-container">
            <div class="header navbar">
                <div class="header-container">
                    <ul class="nav-left">
                        <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
                    </ul>
                    <ul class="nav-right">
                       <!-- <li class="notifications dropdown">
                            <span class="counter bgc-red">
                              <?php /*
                            $orderSql = "SELECT * FROM cus_order where status='0'";
                             $orderQuery = $db->select($orderSql);
                            $countOrder = $orderQuery->num_rows;
                            echo($countOrder);*/
                               ?>
                            </span> 
                            <a  class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-bell"></i></a>
                            
                        </li>-->
                        <?php if (Session::get("adminRole")=='0' || Session::get("adminRole")=='1') { ?>
                        <li class="notifications dropdown">
                            <span class="counter bgc-blue">
                                <?php 
                            $mails = "SELECT * FROM contact where status='0' order by contactid DESC";
                             $getmail = $db->select($mails);
                            $countMail = $getmail->num_rows;
                            echo($countMail);
                               ?>
                               <?php
                            function get_timeago( $ptime )
                            {
                                //diffForHumans()
                                $estimate_time = time() - $ptime;

                                if( $estimate_time < 1 )
                                {
                                    return 'less than 1 second ago';
                                }

                                $condition = array(
                                            12 * 30 * 24 * 60 * 60  =>  'year',
                                            30 * 24 * 60 * 60       =>  'month',
                                            24 * 60 * 60            =>  'day',
                                            60 * 60                 =>  'hour',
                                            60                      =>  'minute',
                                            1                       =>  'second'
                                );

                                foreach( $condition as $secs => $str )
                                {
                                    $d = $estimate_time / $secs;

                                    if( $d >= 1 )
                                    {
                                        $r = round( $d );
                                        return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
                                    }
                                }
                            }
                            ?>

                            </span> <a href="#" class="dropdown-toggle no-after" data-toggle="dropdown"><i class="ti-email"></i></a>
                            
                            <ul class="dropdown-menu">
                                <li class="pX-20 pY-15 bdB"><i class="ti-email pR-10"></i> <span class="fsz-sm fw-600 c-grey-900">Emails</span></li>
                                <li>
                                    <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                                        <?php 
                                        $i=0;
                                        if ($getmail) {
                                        while ($re =$getmail->fetch_assoc()) {
                                            $i++;
                                            if ($i==4) {
                                               break;
                                            }
                                         ?>
                                        <li><a href="replymsg.php?rmsgid=<?php echo($re['contactid']); ?>" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                                <div class="peer mR-15"><img class="w-3r bdrs-50p" data-cfsrc="assets/user.png" alt="" style="display:none;visibility:hidden;"><noscript><img class="w-3r bdrs-50p" src="../../../randomuser.me/api/portraits/men/1.jpg" alt=""></noscript></div>
                                                <div class="peer peer-greed">
                                                    <div>
                                                        <div class="peers jc-sb fxw-nw mB-5">
                                                            <div class="peer">
                                                                <p class="fw-500 mB-0"><?php echo($re['name']); ?></p>
                                                            </div>
                                                            <div class="peer"><small class="fsz-xs"><?php echo(get_timeago(strtotime($re['date']))); ?></small></div>
                                                        </div><span class="c-grey-600 fsz-sm"><?php echo($re['body']); ?></span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        
                                       <?php }} ?>
                                    </ul>
                                </li>
                                <li class="pX-20 pY-15 ta-c bdT"><span><a href="emaillist.php" class="c-grey-600 cH-blue fsz-sm td-n">View All Email <i class="fs-xs ti-angle-right mL-10"></i></a></span></li>
                            </ul>
                        </li>
                        <?php } ?>
                          <?php 
                           if (isset($_GET['action'])&&$_GET['action']=="logout") {
                                Session::destroy();
                            }
                           ?>
                        <li class="dropdown"><a href="#" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                                <div class="peer mR-10"><img class="w-2r bdrs-50p" data-cfsrc="assets/user.png" alt="" style="display:none;visibility:hidden;"><noscript><img class="w-2r bdrs-50p" src="assets/user.png" alt=""></noscript></div>
                                <div class="peer"><span class="fsz-sm c-grey-900"><?php echo(Session::get('adminName')); ?></span></div>
                            </a>
                            <ul class="dropdown-menu fsz-sm">
                                <li><a href="userprofile.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i> <span>Profile</span></a></li>
                                <li><a href="compose.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-email mR-10"></i> <span>Messages</span></a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="?action=logout" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-power-off mR-10"></i> <span>Logout</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>