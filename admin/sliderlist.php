<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>



<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Slider List</h4>
             <?php
           
           if (isset($_GET['activeid'])) {
            // $id=$_GET['activeid'];
            $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['activeid']);
            $delCate=$cat->activeSliderById($id);
            }
            ?>
             <?php
           
           if (isset($_GET['inactiveid'])) {
            // $id=$_GET['inactiveid'];
            $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['inactiveid']);
            $delCate=$cat->inactiveSliderById($id);
            }
            ?>
            <?php
            
            if (isset($_GET['delete'])) {
                // $id=$_GET['delete'];
                $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['delete']);
                $delCate=$cat->delSliderById($id);
            }
            ?>
               <?php if(isset($delCate) && $delCate=='success') {?>
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: green;">Success!</strong> <?php echo(' Data deteted successfully');?>
            </div>
          <?php }?>
          <?php if(isset($delCate)&& $delCate!='success') {?>
            <div class="alert alert-warning alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: red;">Warning!</strong> <?php echo($delCate);?>
            </div>
          <?php }?>
                
            
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20"> Data Table <span class="pull-right"><a href="slideradd.php" class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i></a></span></h4>
                        <table id="table-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>SN.</th>
                                    <th>Title</th>
                                    <th>HomeImage</th>
                                    <th>OtherImage</th>
                                    <th>Status</th>
                                    <th>Setting</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SN.</th>
                                    <th>Title</th>
                                    <th>HomeImage</th>
                                    <th>OtherImage</th>
                                    <th>Status</th>
                                    <th>Setting</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                $getCat=$cat->getslider();
                                if ($getCat) {
                                    $i=0;
                                    while ($re=$getCat->fetch_assoc()) {
                                        $i++;
                                 ?>
                                <tr>
                                    <td><?php echo($i); ?></td>
                                    <td><?php echo($re['title']) ;?></td>
                                    <td><img src="<?php echo($re['homeimg']); ?>" height="40px" width="60px"/></td>
                                   <?php 
                                    if($re['otherimg']!=null){
                                   ?>
                                    <td><img src="<?php echo($re['otherimg']); ?>" height="40px" width="60px"/></td>
                                    
                                     <?php 
                                    }else{
                                   ?> 
                                    <td>none</td>
                                     <?php 
                                    }
                                   ?> 
                                    
                                    <td><?php echo($re['status']); ?></td>
                                    <td class="pull-right">
                                       <?php if($re['status']=='active'){
                                        ?>
                                        <a class="btn btn-primary" onclick="return confirm('are you sure Inactive slider!')" href="?inactiveid=<?php echo($re['id']) ;?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                       <?php }else{ ?>
                                        <a class="btn btn-primary" onclick="return confirm('are you sure active slider!')" href="?activeid=<?php echo($re['id']) ;?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        <?php } ?>
                                        <?php 
                                        if (Session::get("adminRole")=='0') {
                                         ?>
                                        <a class="btn btn-danger" onclick="return confirm('are you sure delect slider!')" href="?delete=<?php echo($re['id']) ;?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
