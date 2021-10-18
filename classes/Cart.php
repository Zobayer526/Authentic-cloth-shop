<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 ?>
<?php 
class Cart{
	private $db;
	private $fm;
	public function __construct(){
		$this->db=new Database();


		$this->fm=new Format();	
	}
	public function addToCart($data,$id){
		$colorName=null;
		$size=null;
		if (!isset($data['colorName'])) {
			$colorName=null;
		} else {
			$colorName=$this->fm->validation($data['colorName']);
		}
		if (!isset($data['size'])) {
			$colorName=null;
		} else {
			$size=$this->fm->validation($data['size']);
		}
		
		
		$qty=$this->fm->validation($data['qty']);
		$product_id=$this->fm->validation($id);
		$colorName=mysqli_real_escape_string($this->db->link,$colorName);
		$size=mysqli_real_escape_string($this->db->link,$size);
		$qty=mysqli_real_escape_string($this->db->link,$qty);
		$sId=session_id();
		
		
		
		$query="select * from product where id='$id'";
		$result=$this->db->select($query)->fetch_assoc();
		$productName = $result['productName'];
		$price       = $result['price'];
		$image       = $result['image'];
		$qun       = $result['qty'];
		$chquery="select * from cart where product_id='$id' and sId='$sId'";
		$getPro=$this->db->select($chquery);
		if ($getPro) {
			$msg="Product already added";
			return $msg;
		}else{
			if ($qty>$qun) {
				if ($qun>0) {
				$msg="Number of available quantity $qun";
				return $msg;
				} else {
					$msg="Product not available at the moment";
					return $msg;
				}
				
				
				
			}else{
				$query ='';
				if ($colorName==""||$size=="") {
			 $query = "INSERT INTO cart(sId,product_id,productName,price,quantity,image)
    VALUES('$sId','$product_id','$productName','$price','$qty', '$image')";
				}else{
			$query = "INSERT INTO cart(sId,product_id,productName,colorName,size,price,quantity,image)
    VALUES('$sId','$product_id','$productName','$colorName','$size','$price','$qty','$image')";
				}
		

    $productInsert=$this->db->insert($query);
		if ($productInsert) {
			header("Location: cart.php");
		}else{
		header("Location: 404.php");
		}
	}
	 }
	}
	public function getCartProduct(){
		$sId=session_id();
		$query="select * from cart where sId='$sId'";
 	$result=$this->db->select($query);
 	return $result;
	}
	public function updateCartQuantity($cartId,$quantity){
		
		$cartId=mysqli_real_escape_string($this->db->link,$cartId);
		$quantity=mysqli_real_escape_string($this->db->link,$quantity);

		$qury="update cart set quantity='$quantity' where cartId='$cartId'";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		header("Location: cart.php");
 	}else{
 		$msg="<span class='error'>Quantity  not updated!</span>";
			return $msg;
 	}

	}
	public function delProductByCart($delId){
		$delId=mysqli_real_escape_string($this->db->link,$delId);
		$query="delete from cart where cartId='$delId'";
	$deldata=$this->db->delete($query);
	if ($deldata) {	
		echo("<script>window.location='cart.php';</script>");
		
			
}else{
 		$msg="<span class='error'>Product  not deleted!</span>";
			return $msg;
 	}
	}
	public function checkCartTable(){
		$sId=session_id();
		$query="select * from cart where sId='$sId'";
		$result=$this->db->select($query);
		return $result;
	}
	public function delUserCart(){
		$sId=session_id();
		$query="delete from cart where sId='$sId'";
		$this->db->delete($query);
	}

	// public function orderProduct($uid){
	// 	$sId=session_id();
	// 	$query="select * from cart where sId='$sId'";
	// 	$getProduct=$this->db->select($query);
	// 	if ($getProduct) {
	// 		while ($result=$getProduct->fetch_assoc()) {
	// 			$productId=$result['productId'];
	// 			$productId=$result['productId'];
	// 			$productName=$result['productName'];
	// 			$quantity=$result['quantity'];
	// 			$price=$result['price']*$quantity;
	// 			$image=$result['image'];

	// 			$query = "INSERT INTO cus_order( 	cusId ,productId,productName,quantity,price,image)
 //              VALUES('$uid','$productId','$productName','$quantity','$price', '$image')";
 //              $insertorde=$this->db->insert($query);
	// 		}
	// 	}
		
	// }
	// dummy code for dummy function
	public function insertBillingAddress($data,$id)
	{
		

		$uid=mysqli_real_escape_string($this->db->link,$id);
		$name=mysqli_real_escape_string($this->db->link,$data['name']);
		$mobile=mysqli_real_escape_string($this->db->link,$data['mobile']);
		$email=mysqli_real_escape_string($this->db->link,$data['email']);
		$city=mysqli_real_escape_string($this->db->link,$data['city']);
		$zipcode=mysqli_real_escape_string($this->db->link,$data['zipcode']);
		$address=mysqli_real_escape_string($this->db->link,$data['address']);
		$payment=mysqli_real_escape_string($this->db->link,$data['payment']);
		$transactionid=mysqli_real_escape_string($this->db->link,$data['transactionid']);
		if ($name==""||$mobile==""||$email==""||$city==""||$zipcode==""||$address==""||$payment==""||($payment==='Bkash'? ($transactionid==null?true:false) : false)){
			$msg= "<span class='error'> field must not be empty </span>";
			return $msg;

             }elseif (!preg_match('/^[0-9]{11}+$/', $mobile)) {
			 	$msg="Invaild mobile number";
			 	return $msg;
			 }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		 	$msg="Invalid Email Address!";
		 	return $msg;
		 	}elseif (!ctype_alpha($name)) {
	 		$msg="Please enter only alphabetic value in name field";
		 	return $msg;
	 		}elseif (!ctype_alpha($city)) {
	 		$msg="Please enter only alphabetic value in city field";
		 	return $msg;
	 		}else{
		 		
             $query = "INSERT INTO address(name,mobile,email,city,zipcode,address)
                VALUES('$name','$mobile','$email','$city','$zipcode', '$address')";

             $addressInsert=$this->db->insert($query);
             if ($addressInsert) {
             	$address_id = mysqli_insert_id($this->db->link);
             	

             	$totalAmount=0;
             	$totalSum=0;
             	$order_id=0;
             	$sId=session_id();
				$query="select * from cart where sId='$sId'";
				$getorderdata=$this->db->select($query);

				while ($result=$getorderdata->fetch_assoc()) {
					$total=$result['price']*$result['quantity'];
					
				   	$totalSum=$totalSum+$total;
				}
				$vat=$totalSum * .1;
				$totalAmount=$totalSum+$vat;
				$query = "INSERT INTO cus_order( cusId ,address_id,amount,payment_type,transaction_id)
              VALUES('$uid','$address_id','$totalAmount','$payment','$transactionid')";
              	$insertCustomerorde=$this->db->insert($query);

              	if ($insertCustomerorde) {
              		$oid = mysqli_insert_id($this->db->link);
              		$query="select * from cus_order where orderId='$oid'";
					$getordid=$this->db->select($query)->fetch_assoc();
					$_SESSION['order_id']=$getordid['orderId'];
              		$sId=session_id();
				$query="select * from cart where sId='$sId'";
				$getdata=$this->db->select($query);

              	
				while ($result=$getdata->fetch_assoc()) {
					
				
		      	$product_id=$result['product_id'];
				$productName=$result['productName'];
				$colorName=$result['colorName'];
				$size=$result['size'];
				$quantity=$result['quantity'];
				$price=$result['price']*$quantity;
				$image=$result['image'];
				//$vat=$price* .1;
				//$total=$price+$vat;
				//var_dump($product_id);
				$order_id=$_SESSION['order_id'];
				$query="select * from product where id='$product_id'";
				$result=$this->db->select($query)->fetch_assoc();
				$qty = $result['qty'];
				$uqty=$qty-$quantity;
				$qury="update product set qty='$uqty' where id='$product_id'";
 	            $update_row=$this->db->update($qury);

 	            $query = "INSERT INTO order_items( order_id ,product_id,productName,colorName,size,quantity,price,image)
              VALUES('$order_id','$product_id','$productName','$colorName','$size','$quantity','$price', '$image')";
              	$insertorde=$this->db->insert($query);

              	$sId=session_id();
				$query="delete from cart where sId='$sId'";
				$delcart=$this->db->delete($query);

				if ($insertorde) {
					
            	echo("<script>window.location='success.php?smid=$uid & orderId=$order_id';</script>");
            
         		 }

 	          }
 	      }
             	
             }
             
             }

	}
	public function orderProduct($uid){
		$sId=session_id();
		$query="select * from cart where sId='$sId'";
		$result=$this->db->select($query)->fetch_assoc();
		      $productId=$result['productId'];
				$productId=$result['productId'];
				$productName=$result['productName'];
				$quantity=$result['quantity'];
				$price=$result['price']*$quantity;
				$image=$result['image'];
				$vat=$price* .1;
				$total=$price+$vat;

				$query="select * from product where productId='$productId'";
				$result=$this->db->select($query)->fetch_assoc();
				$qty = $result['quantity'];
				$uqty=$qty-$quantity;
				$qury="update product set quantity='$uqty' where productId='$productId'";
 	            $update_row=$this->db->update($qury);

 	            $query="SELECT * FROM users WHERE role='0'";
				$re=$this->db->select($query)->fetch_assoc();
				$fromadminEmail=$re['email'];
				//return $fromadminEmail;

 	            $query="select * from users where userId='$uid'";
				$result=$this->db->select($query)->fetch_assoc();
				$name=$result['name'];
				$to=$result['email'];
				$subject="Your Purchased Details";
				$message="Welcome to visit our website & thankyou for purchasing";
				 include 'mailSender.php';
				 $mail->setFrom($fromadminEmail, 'BD Online Shop & Services');
		         $mail->addReplyTo($fromadminEmail, 'BD Online Shop & Services');
		         $mail->Subject = $subject;
		       	 $mail->Body = 'Dear '.$name.','.$message.'.Your total payable amount(including vat) : '.$total.' We will contact you withing 2 days with delivery details. Thank You.';
		       	 	$mail->addAddress($to, $name);
		       	 	// if(!$mail->send()) {
		          //  echo("<script>alert('Message could not be sent');</script>");
		          //   echo 'Mailer Error: ' . $mail->ErrorInfo;
		          //   } else {
		          //   	echo("<script>alert('Message has been sent');</script>");
 	            $query = "INSERT INTO payment( userId ,productId,quantity,total_amount)
              VALUES('$uid','$productId','$quantity','$price')";
              $insertorde=$this->db->insert($query);

				$query = "INSERT INTO cus_order( userId ,productId,productName,quantity,price,image)
              VALUES('$uid','$productId','$productName','$quantity','$price', '$image')";
              $insertorde=$this->db->insert($query);

              	$sId=session_id();
				$query="delete from cart where sId='$sId'";
				$delcart=$this->db->delete($query);

				 $query="SELECT MAX(orderId) AS id FROM cus_order";
				$result=$this->db->select($query)->fetch_assoc();
				$orderId=$result['id'];
				if ($insertorde) {
            	echo("<script>window.location='success.php?smid=$uid & orderId=$orderId';</script>");
            //}
          }
			
		
	}
	// dummy code for dummy function
	// public function getlastid(){
 //      $query="SELECT MAX(orderId) AS id FROM cus_order";
 //      $result=$this->db->select($query);
 //      //$result=$result['roll'];
 //      return $result; 
	// }

	public function payableAmount($smid,$oid){
		$sId=session_id();
		$query="select amount from cus_order where cusId='$smid' AND orderId='$oid'";
 	$result=$this->db->select($query);
 	return $result;
	}
	public function getOrderProduct($uid){
		$query="SELECT cus_order.orderId,cus_order.status,order_items.* FROM cus_order,order_items WHERE cus_order.orderId=order_items.order_id AND cus_order.cusId='$uid' AND cus_order.status!='3' order BY cus_order.date DESC";
 	$result=$this->db->select($query);
 	return $result;

	}
	public function checkOrder($uid){
	
		$query="select * from cus_order where userId='$uid'";
		$result=$this->db->select($query);
		return $result;
	}
	public function getAllProduct(){
		$query="select * from cus_order order by date desc";
		$result=$this->db->select($query);
		return $result;
	}
	public function getDeliveryProduct(){
		$query="select * from pro_delivery";
		$result=$this->db->select($query);
		return $result;
	}
	public function getSpecificProduct($id){
		$query="select * from cus_order where orderId='$id'";
		$result=$this->db->select($query);
		return $result;
	}
	public function productShift($id,$time,$price){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$time=mysqli_real_escape_string($this->db->link,$time);
		$price=mysqli_real_escape_string($this->db->link,$price);
		$qury="update cus_order set status='1' where  	userId ='$id' and date ='$time' and price ='$price' ";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'> updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>  not updated!</span>";
			return $msg;
 	}
	}
	public function delShiftedOrder($id,$time,$price){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$time=mysqli_real_escape_string($this->db->link,$time);
		$price=mysqli_real_escape_string($this->db->link,$price);
		$query="delete from cus_order where userId ='$id' and date ='$time' and price ='$price'";
	$deldata=$this->db->delete($query);
	if ($deldata) {
		$msg="<span class='success'>data deleted successful</span>";
			return $msg;
}else{
 		$msg="<span class='error'>data  not deleted!</span>";
			return $msg;
 	}
	}
	public function productShiftConfirm($id,$time,$price){
		$id=mysqli_real_escape_string($this->db->link,$id);
		$time=mysqli_real_escape_string($this->db->link,$time);
		$price=mysqli_real_escape_string($this->db->link,$price);
		$qury="update cus_order set status='2' where  	userId ='$id' and date ='$time' and price ='$price' ";
 	$update_row=$this->db->update($qury);
 	if ($update_row) {
 		$msg="<span class='success'> updated successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>  not updated!</span>";
			return $msg;
 	}
	}
	public function insertService($data){
	
		$order_id=$this->fm->validation($data['order_id']);
		$user_id=$this->fm->validation($data['user_id']);
		$delivery_date=$this->fm->validation($data['delivery_date']);
		
		$order_id=mysqli_real_escape_string($this->db->link,$order_id);
		$user_id=mysqli_real_escape_string($this->db->link,$user_id);
		$delivery_date=mysqli_real_escape_string($this->db->link,$delivery_date);
        if ($user_id==""||$delivery_date=="") {
				$msg="<span class='error'> field must not be empty</span>";
				return $msg;

	 }else{
	 	$query="select * from delivery_order where order_id='$order_id'";
         $retruser=$this->db->select($query);
         if ($retruser) {
         	$msg="<span> This order already assigned</span>";
         	return $msg;
 	}
        

	 	$upquery="UPDATE cus_order SET status='1' where orderId='$order_id'";
        $deluserdata=$this->db->update($upquery);
	 	 $query = "INSERT INTO delivery_order(order_id,user_id,delivery_date)
       VALUES('$order_id','$user_id','$delivery_date')";

    	$productInsert=$this->db->insert($query);

		if ($productInsert) {
 		$msg="<span class='success'> Insert successful</span>";
			return 'success';
 	}else{
 		$msg="<span class='error'>  Not Insert!</span>";
			return $msg;
 	}


	 }

		if (empty($delivery)) {
			$msg="<span class='error'> Date Field must not be empty!</span>";
			return $msg;
		}elseif (empty($serviceman)) {
			$msg="<span class='error'>Service & Date Field must not be empty!</span>";
			return $msg;
		}else{

		 $query = "INSERT INTO pro_delivery(orderId,productName,quantity,price, 	total_amount,serviceman,delivery_date)
       VALUES('$orderId','$productName','$quantity','$price','$amount', '$serviceman','$delivery')";

    $productInsert=$this->db->insert($query);
		if ($productInsert) {
 		$msg="<span class='success'> Insert successful</span>";
			return $msg;
 	}else{
 		$msg="<span class='error'>  Not Insert!</span>";
			return $msg;
 	}
	 }
	}
	
}
 ?>