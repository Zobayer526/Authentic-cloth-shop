 <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>        
<?php include 'inc/header-nav.php';?>

<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
   
$insertCat=$cat->sliderInsert($_POST,$_FILES);
}
 ?>

 <main class="main-content bgc-grey-100">
    <div id="mainContent">
        <div class="row gap-20 masonry pos-r">
            <div class="masonry-sizer col-md-12"></div>
            <div class="masonry-item col-md-12">
                <div class="bgc-white p-20 bd">
                    <h6 class="c-grey-900">Add Slider</h6>
                     <?php if(isset($insertCat) && $insertCat=='success') {?>
                    <div class="alert alert-success alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Success!</strong> <?php echo(' Data insert successfully');?>
                    </div>
                  <?php }?>
                   <?php if(isset($insertCat) && $insertCat!='success') {?>
                    <div class="alert alert-danger alert-dismissible" data-auto-dismiss="2000" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Warning!</strong> <?php echo($insertCat);?>
                    </div>
                  <?php }?>
                
                    <div class="mT-30">
                        <form  method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="title" placeholder="Enter Slider Title..." required="required"> 
                            </div>
                           
                            <div class="form-group">
                                <label for="exampleInputEmail1">Set Home page image</label>
                                <br>
                                <input type="file" class="form-control-file" name="homeimg"/>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Set Other page image(optional)</label>
                                <br>
                                <input type="file" class="form-control-file" name="otherimg"/>
                            </div>
                             <div class="form-group">
                                <label for="exampleInputEmail1">Status </label>
                                <select class="form-control" id="sel2" name="status" >
                                <option value="active" selected>Active</option>
                                <option value="inactive" >Inactive</option>
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
