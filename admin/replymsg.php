 <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>        
<?php include 'inc/header-nav.php';?>
<?php include '../classes/User.php'; ?>
<?php
$ur=new User(); 
if (!isset($_GET['rmsgid']) || $_GET['rmsgid']==NULL) {
   echo("<script>window.location='inbox.php';</script>");
   // header("Location: catlist.php");
}else{
    $rmsgid=$_GET['rmsgid'];
}
 ?>

 <main class="main-content bgc-grey-100">
                <div id="mainContent">
                    <div class="full-container">
                        <div class="email-app">
                            <div class="email-side-nav remain-height ov-h">
                                <div class="h-100 layers">
                                    <div class="p-20 bgc-grey-100 layer w-100"><a href="compose.php" class="btn btn-danger btn-block">New Message</a></div>
                                    <div class="scrollable pos-r bdT layer w-100 fxg-1">
                                        <ul class="p-20 nav flex-column">
                                            <li class="nav-item"><a href="javascript:void(0)" class="nav-link c-grey-800 cH-blue-500 active">
                                                    <div class="peers ai-c jc-sb">
                                                        <div class="peer peer-greed"><i class="mR-10 ti-email"></i> <span>Inbox</span></div>
                                                        <div class="peer"><span class="badge badge-pill bgc-deep-purple-50 c-deep-purple-700">+99</span></div>
                                                    </div>
                                                </a></li>
                                            <li class="nav-item"><a href="#" class="nav-link c-grey-800 cH-blue-500">
                                                    <div class="peers ai-c jc-sb">
                                                        <div class="peer peer-greed"><i class="mR-10 ti-share"></i> <span>Sent</span></div>
                                                        <div class="peer"><span class="badge badge-pill bgc-green-50 c-green-700">12</span></div>
                                                    </div>
                                                </a></li>
                                            <li class="nav-item"><a href="#" class="nav-link c-grey-800 cH-blue-500">
                                                    <div class="peers ai-c jc-sb">
                                                        <div class="peer peer-greed"><i class="mR-10 ti-star"></i> <span>Important</span></div>
                                                        <div class="peer"><span class="badge badge-pill bgc-blue-50 c-blue-700">3</span></div>
                                                    </div>
                                                </a></li>
                                            <li class="nav-item"><a href="#" class="nav-link c-grey-800 cH-blue-500">
                                                    <div class="peers ai-c jc-sb">
                                                        <div class="peer peer-greed"><i class="mR-10 ti-file"></i> <span>Drafts</span></div>
                                                        <div class="peer"><span class="badge badge-pill bgc-amber-50 c-amber-700">5</span></div>
                                                    </div>
                                                </a></li>
                                            <li class="nav-item"><a href="#" class="nav-link c-grey-800 cH-blue-500">
                                                    <div class="peers ai-c jc-sb">
                                                        <div class="peer peer-greed"><i class="mR-10 ti-alert"></i> <span>Spam</span></div>
                                                        <div class="peer"><span class="badge badge-pill bgc-red-50 c-red-700">1</span></div>
                                                    </div>
                                                </a></li>
                                            <li class="nav-item"><a href="#" class="nav-link c-grey-800 cH-blue-500">
                                                    <div class="peers ai-c jc-sb">
                                                        <div class="peer peer-greed"><i class="mR-10 ti-trash"></i> <span>Trash</span></div>
                                                        <div class="peer"><span class="badge badge-pill bgc-red-50 c-red-700">+99</span></div>
                                                    </div>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="email-wrapper row remain-height pos-r scrollable bgc-white">
                                <div class="email-content open no-inbox-view">
                                    <div class="email-compose">
                                        <div class="d-n@md+ p-20"><a class="email-side-toggle c-grey-900 cH-blue-500 td-n" href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                                        <form class="email-compose-body" method="post">
                                            <h4 class="c-grey-900 mB-20">Send Message</h4>
                                             <?php 
                                                if(isset($_POST['sendmail'])) {
                                                    require_once '../vendor/autoload.php';
                                                    require '../credential.php';
                                                    // Create the Transport
                                                    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587,'tls'))
                                                      ->setUsername(EMAIL)
                                                      ->setPassword(PASS)
                                                    ;

                                                    // Create the Mailer using your created Transport
                                                    $mailer = new Swift_Mailer($transport);

                                                    // Create a message
                                                    $message = (new Swift_Message($_POST['subject']))
                                                      ->setFrom([EMAIL => 'Test email send'])
                                                      ->setTo([$_POST['email']])
                                                      ->setBody($_POST['message'])
                                                      ;

                                                     

                                                    // Send the message
                                                    $result = $mailer->send($message);
                                                    if(!$result) {?>
                                                            <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <strong>Warning!</strong> <?php echo('Message not sent.please try again.');?>
                                                        </div>
                                                        
                                                   <?php } else {
                                                        $ur->updateMessageeComment($rmsgid);?>

                                                        <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <strong>Success!</strong> <?php echo(' Message sent successfully');?>
                                                        </div>
                                                    <?php }
                                             }
                                             ?>
                                            <div class="send-header">
                                                <?php 
                                                 $msg=$ur->getSingleComment($rmsgid);
                                                if ($msg) {
                                                   
                                                    while ($getemail=$msg->fetch_assoc()) {
                                                       
                                                 ?>
                                                <div class="form-group">
                                                    <input type="email" name="email" value="<?php echo($getemail['email']) ?>" class="form-control" readonly>
                                                </div>
                                                <?php }} ?>
                                                <div class="form-group">
                                                    <input class="form-control" name="subject" placeholder="Email Subject" required="required">
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="message" class="form-control" placeholder="Say Hi..." rows="10" maxlength="6000" required="required"></textarea>
                                                </div>
                                            </div>
                                            <div id="compose-area"></div>
                                            <div class="text-right mrg-top-30"><button class="btn btn-danger" name="sendmail">Send</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
<?php include 'inc/footer.php';?> 
