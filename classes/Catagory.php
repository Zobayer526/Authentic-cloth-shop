<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); ?>
 <?php 
 class Catagory {
 	private $db;
	private $fm;

	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();	
	}
	public function catInsert($CatName){
		$CataName=$this->fm->validation($CatName);
		$CataName=mysqli_real_escape_string($this->db->link,$CataName);
		if (empty($CataName)) {
			$msg="<span class='success'>catagory field must not be empty</span>";
			return $msg;	
	}elseif (!ctype_alpha($CataName)) {
	 		$msg="Please enter only alphabetic value in name field";
		 	return $msg;
	 }else{
		$query="insert into category(catName) values('$CataName')";
		$catInsert=$this->db->insert($query);
		if ($catInsert) {
			return 'success';
		}else{
			$msg="<span class='error'>catagory  not insert .</span>";
			return $msg;
		}
	}
 }
 public function cityInsert($CatName){
		$CataName=$this->fm->validation($CatName);
		$CataName=mysqli_real_escape_string($this->db->link,$CataName);
		if (empty($CataName)) {
			$msg="<span class='success'>city field must not ve empty</span>";
			return $msg;	
	}elseif (!ctype_alpha($CataName)) {
		$msg="Please enter only alphabetic value in name field";
 		return $msg;
	}
$query="select * from district where name LIKE'%$CatName%'";
 	$result=$this->db->select($query);
	if ($result) {
		$msg="<span class='success'>city already exist</span>";
		return $msg;
	}else{
		$query="insert into district(name) values('$CataName')";
		$catInsert=$this->db->insert($query);
		if ($catInsert) {
			return 'success';
		}else{
			$msg="<span class='error'>City  not insert .</span>";
			return $msg;
		}
	}
 }
 public function getAllCat(){
 	$query="select * from category order by catId DESC";
 	$result=$this->db->select($query);
 	return $result;

 }
 public function getAllcity(){
 	$query="select * from district order by id DESC";
 	$result=$this->db->select($query);
 	return $result;

 }
 public function getCatById($id){
 	$query="select * from category where catId='$id'";
 	$result=$this->db->select($query);
 	return $result;
 }
 public function getCityById($id){
 	$query="select * from district where id='$id'";
 	$result=$this->db->select($query);
 	return $result;
 }
 public function catUpdate($CatName,$id){
 	$CataName=$this->fm->validation($CatName);
		$CataName=mysqli_real_escape_string($this->db->link,$CataName);
		$id=mysqli_real_escape_string($this->db->link,$id);
		if (empty($CataName)) {
			$msg="<span class='error'>catagory field must not be empty</span>";
			return $msg;

 }elseif (!ctype_alpha($CataName)) {
	 		$msg="Please enter only alphabetic value in name field";
		 	return $msg;
}else{
 	$qury="update category set catName='$CataName' where catId='$id'";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
			return 'success';
 	}else{
 		$msg="<span class='error'>catagory  not updated!</span>";
			return $msg;
 	}
 }
}
public function cityUpdate($CatName,$id){
 	$CataName=$this->fm->validation($CatName);
		$CataName=mysqli_real_escape_string($this->db->link,$CataName);
		$id=mysqli_real_escape_string($this->db->link,$id);
		if (empty($CataName)) {
			$msg="<span class='error'>catagory field must not be empty</span>";
			return $msg;

 }elseif (!ctype_alpha($CataName)) {
	$msg="Please enter only alphabetic value in name field";
 	return $msg;
}else{
 	$qury="update district set name='$CataName' where id='$id'";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
			return 'success';
 	}else{
 		$msg="<span class='error'>city  not updated!</span>";
			return $msg;
 	}
 }
}
public function delCatById($id){
	$query="delete from category where catId='$id'";
	$deldata=$this->db->delete($query);
	if ($deldata) {
	return 'success';
}else{
 		$msg="<span class='error'>catagory  not deleted!</span>";
			return $msg;
 	}
}
public function delCityById($id){
	$query="delete from district where id='$id'";
	$deldata=$this->db->delete($query);
	if ($deldata) {
	return 'success';
}else{
 		$msg="<span class='error'>City  not deleted!</span>";
			return $msg;
 	}
}
public function sliderInsert($data,$file)
{
	
	// $pdata=$this->fm->validation($data);
			$title=mysqli_real_escape_string($this->db->link,$data['title']);
			$status=mysqli_real_escape_string($this->db->link,$data['status']);
			$homeimg=mysqli_real_escape_string($this->db->link,$file['homeimg']['name']);
			
			if ($title==""||$homeimg=="") {
				$msg="<span class='error'> field must not be empty</span>";
				return $msg;
	 		}elseif (!ctype_alpha($title)) {
	 		$msg="Please enter only alphabetic value in title field";
		 	return $msg;
	 		}
	 		$permited  = array('jpg', 'jpeg', 'png', 'gif');
		    $homeimg_name = $file['homeimg']['name'];
		    $homeimg_size = $file['homeimg']['size'];
		    $homeimg_temp = $file['homeimg']['tmp_name'];

		    $otherimg_name = $file['otherimg']['name'];
		    $otherimg_size = $file['otherimg']['size'];
		    $otherimg_temp = $file['otherimg']['tmp_name'];

		    $home_div = explode('.', $homeimg_name);
		    $other_div = explode('.', $otherimg_name);
		    $home_ext = strtolower(end($home_div));
		    $other_ext = strtolower(end($other_div));
		    $home_image =  uniqid() .'-'.rand(1,100).'.'.$home_ext;
		    $other_image =  uniqid() .'-'.rand(1,1000).'.'.$other_ext;
		    $upload_home_image = "upload/".$home_image;
		    $upload_other_image = "upload/".$other_image;

		if ($homeimg_size >(1048567*2)) {
	     $msg="<span class='error'>Image Size should be less then 1MB!
	     </span>";
	     return $msg;
	    } elseif (in_array($home_ext, $permited) === false) {
	     $msg="<span class='error'>You can upload only:-"
	     .implode(', ', $permited)."</span>";
		return $msg;
	 	}else{
	 		if ($file['otherimg']['name']!=null) {
	 		move_uploaded_file($homeimg_temp, $upload_home_image);
	 		move_uploaded_file($otherimg_temp, $upload_other_image);
	 	 $query = "INSERT INTO slider(title,homeimg,otherimg,status)
	    VALUES('$title','$upload_home_image','$upload_other_image','$status')";

	    $productInsert=$this->db->insert($query);
			if ($productInsert) {
				
				return 'success';
			}else{
				$msg="<span class='error'>Product  not insert .</span>";
				return $msg;
			}
	 		}else{
	 		move_uploaded_file($homeimg_temp, $upload_home_image);
	 	 $query = "INSERT INTO slider(title,homeimg,status)
	    VALUES('$title','$upload_home_image','$status')";

	    $productInsert=$this->db->insert($query);
			if ($productInsert) {
				
				return 'success';
			}else{
				$msg="<span class='error'>Product  not insert .</span>";
				return $msg;
			}
	 	
	 		}
	 		
	 	}
}
public function getslider()
{
	$query="select * from slider order by id desc";
 	$result=$this->db->select($query);
 	return $result;
}
public function getActiveslider()
{
	$query="select * from slider where status='active' order by id desc";
 	$result=$this->db->select($query);
 	return $result;
}
public function delSliderById($id){
	$query="delete from slider where id='$id'";
	$deldata=$this->db->delete($query);
	if ($deldata) {
			return 'success';
}else{
 		$msg="<span class='error'>Slider  not deleted!</span>";
			return $msg;
 	}
}
public function activeSliderById($id){
	$qury="update slider set status='active' where id='$id'";
 	$update_row=$this->db->update($qury);
	
	
}
public function inactiveSliderById($id){
	$qury="update slider set status='inactive' where id='$id'";
 	$update_row=$this->db->update($qury);
	
	
}
}

  ?>