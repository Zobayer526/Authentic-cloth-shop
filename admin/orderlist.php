<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>
<?php include '../classes/Color.php'; ?>
<?php include_once'../classes/Cart.php'; ?>
<?php
$ct=new Cart(); 
$fm=new Format(); 
$cat=new Catagory(); 
if (isset($_GET['delpd'])) {
    // $id=$_GET['delete'];
    $id=preg_replace('/[^-a-zA-Z0-9]/', '', $_GET['delpd']);
    $delPd=$pd->deleteOrder($id);
}
?>

<main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="container-fluid">
            <h4 class="c-grey-900 mT-10 mB-30">Order List</h4>
           
               <?php if(isset($insertcolor)) {?>
            <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: green;">Success!</strong> <?php echo($insertcolor);?>
            </div>
          <?php }?>

           <?php if(isset($delPd)) {?>
            <div class="alert alert-warning alert-dismissible" data-auto-dismiss="2000" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong style="color: red;">Warning!</strong> <?php echo($delPd);?>
            </div>
          <?php }?>
                
            
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <h4 class="c-grey-900 mB-20"> Data Table </h4>
                        <table id="table-datatables" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                   <th>OrderID</th>
                                    <th>PurchaseItems</th>
                                    <th>Total anount</th>
                                    <th>Payment_type</th>
                                    <th>Transaction_id</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Billing_address</th>
                                    <th>Setting</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>OrderID</th>
                                    <th>PurchaseItems</th>
                                    <th>Total anount</th>
                                    <th>Payment_type</th>
                                    <th>Transaction_id</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Billing_address</th>
                                    <th>Setting</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                 <?php 
                                $getPd=$pd->getAllOrders();
                               if ($getPd) {
                                    $i=0;
                                    while ($result=$getPd->fetch_assoc()) {
                                        $i++;
                                       
                                 ?>
                                <tr>
                                    <td><?php echo($result['orderId']) ;?></td>
                                    <td>
                                       <a href="order-items.php?orId=<?php echo($result['orderId']) ;?>">view items</a> 
                                    </td>
                                    <td><?php echo($result['amount']); ?></td>
                                    <td><?php echo($result['payment_type']); ?></td>
                                    <td><?php echo($result['transaction_id']); ?></td>
                                    <td><?php echo($result['date']); ?></td>
                                     <?php if ($result['status']=='0') {?>
                                     <td>Pending</td>
                                     <?php }elseif($result['status']=='1'){?>
                                     <td>Sifted to suplier</td>
                                     <?php }else{?>
                                     <td>completed</td>
                                     <?php } ?>
                                    <td>
                                        <a href="billing_address.php?cusId=<?php echo($result['address_id']); ?>">view address</a><br/>
                                        
                                    </td>
                                    <td class="pull-right">
                                        <a class="btn btn-primary <?php echo($result['status']==0?'':'disabled');?>" title="Assign to supplier"  href="assignservice.php?AOId=<?php echo($result['orderId']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        <?php 
                                        if (Session::get("adminRole")=='0') {
                                         ?>
                                        <a class="btn btn-danger <?php if($result['status']!=2){echo('disabled');} ?>" title="Click to delete" onclick="return confirm('are you sure delect this order!')" href="?delpd=<?php echo($result['orderId']) ;?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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

<?php include 'inc/footer.php';?>
