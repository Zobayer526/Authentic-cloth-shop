<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>


   <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">User List</h4>
         	<?php 
                if (isset($_GET['deluid'])) {
                	$deluid=$_GET['deluid'];
                	if (isset($_GET['buser'])&&($_GET['buser']==1||$_GET['buser']==0)) {
                	$delemp=$em->deleteEmployee($deluid,$_GET['buser']);
                		
                	}
                    
                  }
               ?>
               <?php if(isset($delemp) &&$delemp!='error') {?>
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: green;">Success!</strong> <?php echo($delemp);?>
            </div>
          <?php }?>
          <?php if(isset($delemp)&&$delemp=='error') {?>
            <div class="alert alert-warning alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: green;">Warning!</strong> <?php echo('User not block');?>
            </div>
          <?php }?>
          <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20"> Data Table </h4>
                        <table id="table-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                  <th>Serial No.</th>
									<th> Name</th>
									<th>City</th>
									<th>Zip-Code</th>
									<th>Country</th>
									<th>Address</th>
									<th>Phone</th>
									<th>Emai</th>
									<th>Role</th>
						             <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                   <th>Serial No.</th>
									<th> Name</th>
									<th>City</th>
									<th>Zip-Code</th>
									<th>Country</th>
									<th>Address</th>
									<th>Phone</th>
									<th>Emai</th>
									<th>Role</th>
						             <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php
					       $allusers=$em->UserList();
							if ($allusers) {
								$i=0;
								while ($result=$allusers->fetch_assoc()) {
									$i++;
								
									
								 ?>
                                <tr>
                                   <td><?php echo($i) ;?></td>
									<td><?php echo($result['name']) ;?></td>
									<td> <?php echo($result['city']) ;?></td>
									<td> <?php echo($result['zip']) ;?></td>
									<td> <?php echo($result['country']) ;?></td>
									<td> <?php echo($result['phone']) ;?></td>
									<td><?php echo($result['email']) ;?></td>
									<td><?php echo($result['address']) ;?></td>
									<td>
									 General
										
									</td>
                                    <td class="pull-right">
                                        <a class="btn btn-primary" href="viewuser.php?vuserid=<?php echo($result['userId']) ;?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                        <?php 
                                        if (Session::get("adminRole")=='0') {
                                         ?>
                                         <?php if ($result['block']==0) {
                                         	
                                          ?>
                                        <a class="btn btn-danger" title="block user" onclick="return confirm('are you want to block user !')" href="?deluid=<?php echo($result['userId']) ;?>&buser=<?php echo($result['block']) ; ?>"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                    <?php }else{ ?>
                                        <a class="btn btn-danger" title="unblock user" onclick="return confirm('are you want to unblock user !')" href="?deluid=<?php echo($result['userId']) ;?>&buser=<?php echo($result['block']) ; ?>"><i class="fa fa-ban" aria-hidden="true"></i></a>
                                        <?php } ?>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <?php }}else{echo("user not found");} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include 'inc/footer.php';?> 
