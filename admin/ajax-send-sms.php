<?php
  include "../config.php";
include "../functions.php";
         $sql_sms="SELECT * FROM `send_sms` WHERE `status`='pending' AND TIMESTAMPDIFF(DAY, date_time, NOW())<1 ORDER BY id DESC LIMIT 0,1";
		 $qs = $conn->prepare($sql_sms);
		 $qs->execute();

		 		 while($result = $qs->fetch()){
		 		 	$smaid=$result['id'];
		 		 	$response=send_sms($result['phone_number'],$result['body']);
		 		 	
		 		 	     $sql = "UPDATE  `send_sms` SET  `status` =  ? WHERE  `id` =?";
						    $q = $conn->prepare($sql);

						    $result=$q->execute(array($response,$smaid)) or die(print_r($q->errorInfo()));
					if ($result) {
						$sql_count_pending_sms="SELECT count(*) as total_pending FROM `send_sms` WHERE `status`='pending' AND TIMESTAMPDIFF(DAY, date_time, NOW())<1";
		 $qc = $conn->prepare($sql_count_pending_sms);
		 $qc->execute() or die(print_r($q->errorInfo()));
		 $result = $q->fetch();
					}
					echo $total=$result['total_pending'];
					 //send_sms($result['mobile_no'],$smsbody);

		 }
?>