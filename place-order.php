<?php
include 'config.php';

$bookid=isset($_POST['bookid'])? $_POST['bookid']:NULL;
$username=isset($_POST['username'])? $_POST['username']:NULL;
$email=isset($_POST['email'])? $_POST['email']:NULL;
$phone=isset($_POST['phone'])? $_POST['phone']:NULL;
$address=isset($_POST['address'])? $_POST['address']:NULL;
$uniqueid=uniqid();

		 $sql = "INSERT INTO `db_book`.`tbl_order` (`id`, `orderid`, `bookid`, `name`, `email`, `phone`, `address`, `status`) 
		 VALUES (:id, :orderid, :bookid, :name, :email, :phone, :address, :status)";
 $q = $conn->prepare($sql);

 $result=$q->execute(array(
  ':id'=>NULL,
 ':orderid'=>$uniqueid,
 ':bookid'=>$bookid,
':name'=>$username,
':email'=>$email,
':phone'=>$phone,
':address'=>$address,
':status'=>"pending"
)) or die(print_r($q->errorInfo()));
//print_r($q);
//header(location: '?action=confirm-order&orderid='.$uniqueid);
header('Location: index.php?action=confirm-order&orderid='.$uniqueid);
?>