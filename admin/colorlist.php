<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
<?php include '../classes/Color.php'; ?>


<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">coloregory List</h4>
             <?php
            $color=new Color(); 
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                $colorName=$_POST['colorname'];
                $insertcolor=$color->colorInsert($colorName);
              
            }
        ?>
         <?php
        $color=new Color(); 
        if (isset($_GET['delete'])) {
            // $id=$_GET['delete'];
            $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['delete']);
            $delcolore=$color->delcolorById($id);
        }
        ?>
               <?php if(isset($insertcolor)) {?>
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: green;">Success!</strong> <?php echo($insertcolor);?>
            </div>
          <?php }?>

           <?php if(isset($delcolore)) {?>
            <div class="alert alert-warning alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: red;">Warning!</strong> <?php echo($delcolore);?>
            </div>
          <?php }?>
                
            
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20"> Data Table <span class="pull-right"><a href="colorAdd.php" class="btn btn-success btn-xs"><i class="fa fa-plus" aria-hidden="true"></i></a></span></h4>
                        <table id="table-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>SN.</th>
                                    <th>Color Name</th>
                                    <th>Setting</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SN.</th>
                                    <th>Color Name</th>
                                    <th>Setting</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php 
                                $getcolor=$color->getAllcolor();
                                if ($getcolor) {
                                    $i=0;
                                    while ($re=$getcolor->fetch_assoc()) {
                                        $i++;
                                 ?>
                                <tr>
                                    <td><?php echo($i); ?></td>
                                    <td><?php echo($re['colorName']) ;?></td>
                                    <td class="pull-right">
                                        <a class="btn btn-primary" href="coloredit.php?colorid=<?php echo($re['id']) ;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <?php 
                                        if (Session::get("adminRole")=='0') {
                                         ?>
                                        <a class="btn btn-danger" onclick="return confirm('are you sure delect coloregory!')" href="?delete=<?php echo($re['id']) ;?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <?php } ?>
                                    </td>
                                </tr>
                                <?php }}else{echo("Color not found");} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'inc/footer.php';?>
