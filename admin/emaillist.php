<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
<?php include '../classes/User.php';
$ur=new User();
 ?>


<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">User Comment List</h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20"> Data Table <span class="pull-right"><a href="compose.php" class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i></a></span></h4>
                        <table id="table-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Date</th>
                                    <th>Setting</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Date</th>
                                    <th>Setting</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                $getCmnt=$ur->getAllComments();
                                if ($getCmnt) {
                                  while ($re=$getCmnt->fetch_assoc()) {
                                       
                                 ?>
                                <tr>
                                    <td><?php echo($re['name']); ?></td>
                                    <td><?php echo($re['mobileNo']) ;?></td>
                                    <td><?php echo($re['email']) ;?></td>
                                    <td><?php echo($re['body']) ;?></td>
                                    <td><?php echo($re['date']) ;?></td>
                                    <td class="pull-right">
                                        <?php 
                                        if (Session::get("adminRole")=='0') {
                                         ?>
                                        <a class="btn btn-danger"  href="replymsg.php?rmsgid=<?php echo($re['contactid']); ?>"><i class="fa fa-reply" aria-hidden="true"></i></a>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <?php }}else{echo("catagory not found");} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="modal fade" id="modal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form role="form" method="POST">
                    <input type="hidden" name="_token" value="">
                    <div class="form-group">
                        <label class="control-label">Add Category</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="catname">
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <div class="modal-footer d-flex justify-content-center">
                                
                                <input class="btn btn-primary" type="submit" name="submit" Value="Save" />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>
