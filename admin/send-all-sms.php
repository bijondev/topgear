<?php
include "../config.php";
$sql="SELECT * FROM tbl_sms";
$q = $conn->prepare($sql);
$q->execute();
while($result = $q->fetch()){

   $mobilenumber=$result['mobile_no'];
   $namep=$result['name'];
   $title=isset($_POST['smstitle'])? $_POST['smstitle']:NULL;
   $smsbody=isset($_POST['smsbody'])? $_POST['smsbody']:NULL;
   $user=$_SESSION['name'];
   $time = date("Y-m-d H:i:s");
   $ip=$_SERVER["REMOTE_ADDR"];//get_client_ip();
   $status="Pending";

      $sql = "INSERT INTO `send_sms` (`id` ,`name`, phone_number, title, body, date_time, ipaddress, user_name, status) 
    VALUES (:id , :name, :mobileno, :title, :body, :time, :ip, :user, :Status)";
 $q = $conn->prepare($sql);

 $result=$q->execute(array(
  ':id'=>NULL,
 ':name'=>$namep,
 ':mobileno'=>$mobilenumber,
 ':title'=>$title,
 ':body'=>$smsbody,
 ':time'=>$time,
 ':ip'=>$ip,
 ':user'=>$user,
 ':Status'=>$status
)) or die(print_r($q->errorInfo()));

if($result){
  echo "yes";
}
else{
  echo "no";
}
}
?>