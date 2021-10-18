<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 ?>

<?php 

class Color  {
	private $db;
	private $fm;

	public function __construct(){
		$this->db=new Database();
		$this->fm=new Format();	
	}
	public function colorInsert($colorName){
		$colorName=$this->fm->validation($colorName);
		$colorName=mysqli_real_escape_string($this->db->link,$colorName);
		if (empty($colorName)) {
			$msg="<span class='success'>color field must not ve empty</span>";
			return $msg;	
	}elseif (!ctype_alpha($colorName)) {
	 		$msg="Please enter only alphabetic value in name field";
		 	return $msg;
	 }else{
		$query="insert into color(colorName) values('$colorName')";
		$colorInsert=$this->db->insert($query);
		if ($colorInsert) {
			return 'success';
		}else{
			$msg="<span class='error'>color  not insert .</span>";
			return $msg;
		}
	}
 }
 public function getAllcolor(){
 	$query="select * from color order by id DESC";
 	$result=$this->db->select($query);
 	return $result;
 }
 public function getcolorById($id){
 	$query="select * from color where id='$id'";
 	$result=$this->db->select($query);
 	return $result;
 }
 public function colorUpdate($colorName,$id){
 	$colorName=$this->fm->validation($colorName);
		$colorName=mysqli_real_escape_string($this->db->link,$colorName);
		$id=mysqli_real_escape_string($this->db->link,$id);
		if (empty($colorName)) {
			$msg="<span class='error'>color field must not be empty</span>";
			return $msg;

 }elseif (!ctype_alpha($colorName)) {
	 		$msg="Please enter only alphabetic value in name field";
		 	return $msg;
	}else{
 	$qury="update color set colorName='$colorName' where id='$id'";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
			return 'success';
 	}else{
 		$msg="<span class='error'>color  not updated!</span>";
			return $msg;
 	}
 }
 }
 public function delcolorById($id){
 	$query="delete from color where id='$id'";
	$deldata=$this->db->delete($query);
	if ($deldata) {
		$msg="<span class='success'>color deleted successful</span>";
			return $msg;
}else{
 		$msg="<span class='error'>color  not deleted!</span>";
			return $msg;
 	}
}

}
 ?>