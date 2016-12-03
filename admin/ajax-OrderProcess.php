  <?php
  include "../config.php";

$id=isset($_POST['id'])?$_POST['id']:NULL;
 $sql="UPDATE  `tbl_order` SET  `status` =  'Process' WHERE  `id` ='$id'";
 $q = $conn->prepare($sql) or die("ERROR: " . implode(":", $q->conn->errorInfo()));
 $result=$q->execute();

if($result){
  echo "yes";
}
else{
  echo "no";
}
  ?>