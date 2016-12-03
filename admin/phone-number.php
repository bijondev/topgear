<div class="row">
<?php
if(isset($_POST['send-group-sms'])? $_POST['send-group-sms']:NULL){
$title=isset($_POST['title'])?$_POST['title']:NULL;
$user=$_SESSION['name'];
$timezone = "Asia/Dhaka";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
   $time = date("Y-m-d H:i:s");
   $ip=$_SERVER["REMOTE_ADDR"];//get_client_ip();
   $status="Pending";

$smsbody=isset($_POST['smsbody'])?$_POST['smsbody']:NULL;


$hiddenids=isset($_POST['hiddenids'])?$_POST['hiddenids']:NULL;

      $id_nums = explode(",",$hiddenids);
      //print_r($id_nums);
        foreach ($id_nums as $key) {
          //echo $key;

          $sql = "INSERT INTO `send_sms` (`id` ,`name`, phone_number, title, body, date_time, ipaddress, user_name, status) 
              VALUES (:id , :name, :mobileno, :title, :body, :time, :ip, :user, :Status)";
           $q = $conn->prepare($sql);

           $result=$q->execute(array(
            ':id'=>NULL,
           ':name'=>"",
           ':mobileno'=>$key,
           ':title'=>$title,
           ':body'=>$smsbody,
           ':time'=>$time,
           ':ip'=>$ip,
           ':user'=>$user,
           ':Status'=>$status
          )) or die(print_r($q->errorInfo()));

           //send_sms($result['mobile_no'],$smsbody);

     }
     echo "Send Sms";
    }
?>

<?php

if(isset($_POST['edit-phone'])? $_POST['edit-phone']:NULL){
   $phonenumber=isset($_POST['phone-number'])? $_POST['phone-number']:NULL;
   $namep=isset($_POST['namep'])? $_POST['namep']:NULL;

   $phoneid=isset($_POST['phoneid'])? $_POST['phoneid']:NULL;
   if($phonenumber){

    $sql = "UPDATE `tbl_sms` SET `name` = '$namep', mobile_no=$phonenumber
     WHERE `id` =$phoneid";
 $q = $conn->prepare($sql);

 $result=$q->execute() or die(print_r($q->errorInfo()));
 if($result){
    echo "Phone Edit";
 }
 else{
    echo "Error to Edit Phone.";
 }
   }
   else{
    echo "Please Enter A Phone Number.";
   }
}
/*****************************Singel SMS*************************************/
if(isset($_POST['send-singel-phone'])? $_POST['send-singel-phone']:NULL){
   $mobilenumber=isset($_POST['mobilenumber'])? $_POST['mobilenumber']:NULL;
   $namep=isset($_POST['namep'])? $_POST['namep']:NULL;
   $title=isset($_POST['title'])? $_POST['title']:NULL;
   $smsbody=isset($_POST['smsbody'])? $_POST['smsbody']:NULL;
   $user=$_SESSION['name'];
   $timezone = "Asia/Dhaka";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
   $time = date("Y-m-d H:i:s");
   $ip=$_SERVER["REMOTE_ADDR"];//get_client_ip();
   $status="Pending";
   if($smsbody!="" or $title!=""){
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
 // send_sms($mobilenumber,$smsbody);
    echo "One SMS Send.";
 }
 else{
    echo "Error to Send SMS";
 }
   }
   else{
    echo "Please Enter SMS Bodyr";
   }
}
/*****************************Add Catagory************************************/
if(isset($_POST['save-phone'])? $_POST['save-phone']:NULL){
   $phonenumber=isset($_POST['phone-number'])? $_POST['phone-number']:NULL;
   $namep=isset($_POST['namep'])? $_POST['namep']:NULL;
   if($phonenumber){
    $sql = "INSERT INTO `tbl_sms` (
`id` ,`name`, mobile_no) VALUES (:id , :name, :mobileno)";
 $q = $conn->prepare($sql);

 $result=$q->execute(array(
  ':id'=>NULL,
 ':name'=>$namep,
 ':mobileno'=>$phonenumber
)) or die(print_r($q->errorInfo()));
 if($result){
    echo "One Phone Number Added.";
 }
 else{
    echo "Error to Add Phone Number.";
 }
   }
   else{
    echo "Please Enter A Phone Number";
   }
}
//echo "==oky==";
?>
<form method="post" >
  <div class="form-group">
    <label for="exampleInputEmail1">Name :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="namep" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phone Number :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="phone-number" placeholder="Enter Valid Mobile Number">
  </div>
  <input type="submit" name="save-phone" class="btn btn-danger" value="Add Phone">
</form>

<h1>View All Catagory</h1>
<button type="button" class="btn btn-primary" id="getphoneid" data-toggle="modalcheck" href="admin/ajax-send-group-sms.php" >Send Sms</button>
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" aria-describedby="example_info">
    <thead>
        <tr>
        <th><input type="checkbox" id="allcheck"></th>
        	<th>Name</th>
          <th>Phone Number</th>
        	<th>Edit</th>
        	<th>Delete</th>
          <th>Send SMS</th>
        </tr>
        </thead>
        <?php
         $sql="SELECT * FROM tbl_sms";
		 $q = $conn->prepare($sql);
		 $q->execute();
		 while($result = $q->fetch()){
        ?>
        <tr>
        <td> <input type="checkbox" name="phoneid" class="checkedid" value="<?php echo $result['mobile_no']; ?>" ></td>
        	<td><?php echo $result['name']; ?></td>
          <td><?php echo "0".$result['mobile_no']; ?></td>
        	<td><a data-toggle="modal" href="admin/ajax-edit-phone.php?id=<?php echo $result['id']; ?>" class="btn btn-success" >Edit</a></td>
        	<td><button class="btn btn-danger alertdeletePhone" value="<?php echo $result['id']; ?>" type="button">Delete</button></td>
          <td><a data-toggle="modal" href="admin/ajax-send-single-sms.php?id=<?php echo $result['id']; ?>" class="btn btn-primary" >Send SMS</a></td>
        </tr>
        <?php
    }
    ?>
        </table>
        
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>