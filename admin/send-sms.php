<div class="row">
<?php
if(isset($_POST['send-sms'])? $_POST['send-sms']:NULL){
$title=isset($_POST['title'])?$_POST['title']:NULL;
$user=$_SESSION['name'];
$timezone = "Asia/Dhaka";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
   $time = date("Y-m-d H:i:s");
   $ip=$_SERVER["REMOTE_ADDR"];//get_client_ip();
   $status="Pending";

$smsbody=isset($_POST['smsbody'])?$_POST['smsbody']:NULL;
         $sql_sms="SELECT * FROM tbl_sms";
		 $qs = $conn->prepare($sql_sms);
		 $qs->execute();
		 
		 while($result = $qs->fetch()){

		 	    $sql = "INSERT INTO `send_sms` (`id` ,`name`, phone_number, title, body, date_time, ipaddress, user_name, status) 
					    VALUES (:id , :name, :mobileno, :title, :body, :time, :ip, :user, :Status)";
					 $q = $conn->prepare($sql);

					 $result=$q->execute(array(
					  ':id'=>NULL,
					 ':name'=>$result['name'],
					 ':mobileno'=>$result['mobile_no'],
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
<form method="post" style="margin-left:50px;" >

  <div class="form-group">
    <label for="smstitle">Title :</label>
    <input type="text" class="form-control" id="smstitle" name="title"  placeholder="Enter A title">
  </div>

  <div class="form-group">
  <SCRIPT LANGUAGE="JavaScript">
function textCounter(field, countfield, maxlimit) {
  if (field.value.length > maxlimit)
      {field.value = field.value.substring(0, maxlimit);}
      else
      {countfield.value = maxlimit - field.value.length;}
  }
//  End -->
</script>
    <label for="smsbody">SMS Body :</label>
    <textarea name="smsbody" id="smsbody" onKeyDown="textCounter(this.form.smsbody,this.form.remLentext,160);" onKeyUp="textCounter(this.form.smsbody,this.form.remLentext,160);"></textarea> <br />
    Characters remaining: <input type=box readonly name=remLentext size=3 style="width:30px;" value=160>

  </div>
  <input type="submit" name="send-sms" class="btn btn-danger" value="Send SMS">
</form>
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example" aria-describedby="example_info">
    <thead>
        <tr>
        	<th>Title</th>
        	<th>Body</th>
        	<th>Total Rechiver</th>
          <th>Time</th>
        </tr>
        </thead>
        <?php
         $sql="SELECT title, body, COUNT(title) as total, date_time FROM send_sms  GROUP BY title ORDER BY id DESC";
		 $q = $conn->prepare($sql);
		 $q->execute();
		 
		 while($result = $q->fetch()){
	 
        ?>
        <tr>
			<td><?php echo $result['title']; ?></td>
			<td><?php echo $result['body']; ?></td>
			<td><?php echo $result['total']; ?></td>
			<td><?php echo $result['date_time']; ?></td>
        	
        <?php
    }
    ?>
        </table>
</div>
