<?php 
$filepath=realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once($filepath.'/../helpers/Format.php'); 
 ?>
 <?php
 
  class Report{
  	private $database;
	private $formatm;
	public function __construct(){

		$this->database=new Database();
		$this->formatm=new Format();	
	}
	public function getMonthStatic($year){
      $query="SELECT date , SUM(amount) as Year FROM cus_order WHERE date LIKE '%$year%' GROUP BY  date"; 
		$result=$this->database->select($query);
		
			return $result;
	}
	public function getYearStatic(){
     $query = "SELECT * FROM year"; 
	$result=$this->database->select($query);
		
			return $result;
	}
	public function getAllSaleStatic(){
		$query="SELECT order_items.productName , SUM(order_items.quantity) as number FROM cus_order,order_items 
WHERE cus_order.orderId=order_items.order_id
GROUP BY  order_items.productName"; 
		$result=$this->database->select($query);
		
			return $result;
	}
	public function getAllVisitor(){
		$query="SELECT * , COUNT(city) as number FROM users 
			GROUP BY  city"; 
		$result=$this->database->select($query);
		
			return $result;
	}

	public function getOrderPrint($cusId){
		$query="SELECT co.*,us.* 
		FROM cus_order AS co,users AS us 
		WHERE co.userId=us.userId AND co.userId='$cusId'"; 
	   $result=$this->database->select($query);
		return $result;
	}
  } 
  ?>