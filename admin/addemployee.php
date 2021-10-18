<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/header-nav.php';?>

<?php 
if (!Session::get("adminRole")=='0') {
   echo("<script>window.location='dashbord.php';</script>");

}
 ?>
 <?php
    $em=new Employee(); 
    if ($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['submit'])) {
        $adduser=$em->addEmployee($_POST);
    }
?>
 <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h1 class="c-grey-900">Add Employee</h1>
                     <?php if(isset($adduser)&& $adduser!='success') {?>
                    <div class="alert alert-warning" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong style="color: red;">Warning!</strong> <?php echo($adduser);?>
                    </div>
                  <?php }?>
                     <?php if(isset($adduser) && $adduser=='success') {?>
                    <div class="alert alert-warni alert-success" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong style="color: green;">Success!</strong> <?php echo("<span class='success'> user inserted successfully!</span>");?>
                    </div>
                  <?php }?>
                
                    <div class="mT-30">
                        <form  method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name&nbsp <span style="color: red;">*</span></label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter  Name..." required="required"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username&nbsp <span style="color: red;">*</span></label>
                                <input type="text" name="typeofuser" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter user Name..." required="required"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email&nbsp <span style="color: red;">*</span></label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email..." required="required"> 
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="eid" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter EmployeeID..." required="required"> 
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">password&nbsp <span style="color: red;">*</span></label>
                                <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter password..." required="required"> 
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Select user </label>
                                <select class="form-control" id="sel2" name="role">
                                 <option>select User Role</option>
                                    <option value="0">Admin</option>
                                    <option value="2">Supplier</option>
                              </select>
                            </div>
                           <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</main>
 <?php include 'inc/footer.php';?> 