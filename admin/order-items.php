<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
<?php include '../classes/Color.php'; ?>
<?php include_once'../classes/Cart.php'; ?>
<?php
$ct=new Cart(); 
$fm=new Format(); 
$cat=new Catagory(); 
if (isset($_GET['orId'])) {
    // $id=$_GET['delete'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['orId']);
}
?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Order Items List</h4>
           
               <?php if(isset($insertcolor)) {?>
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: green;">Success!</strong> <?php echo($insertcolor);?>
            </div>
          <?php }?>

           <?php if(isset($delPd)) {?>
            <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: red;">Warning!</strong> <?php echo($delPd);?>
            </div>
          <?php }?>
                
            
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20"> Data Table <span class="pull-right"></span></h4>
                        <table id="table-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                   <th>SN</th>
                                    <th>Name</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                 
                                <?php 
                                $getItem=$pd->getAllOrderItems($id);
                               if ($getItem) {
                                    $i=0;
                                    while ($resultItem=$getItem->fetch_assoc()) {
                                       $i++;
       
                                 ?>
                                <tr>
                                    <td><?php echo($i) ;?></td>
                                    <td>
                                    <p><img height="40px" width="60px" src="<?php echo($resultItem['image']); ?>"></p>
                                    <p>Name: <?php echo($resultItem['productName']); ?></p>
                                    </td>
                                    <td><?php echo($resultItem['size']); ?></td>
                                    <td><?php echo($resultItem['colorName']); ?></td>
                                    <td><?php echo($resultItem['quantity']); ?></td>
                                    <td><?php echo($resultItem['price']); ?></td>
                                </tr>
                                <?php }}else{echo("Item not found");} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'inc/footer.php';?>
