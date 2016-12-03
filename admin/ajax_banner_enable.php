  <?php
  include "../config.php";

$id=isset($_POST['id'])?$_POST['id']:NULL;
 $sql="UPDATE  `tbl_banner` SET  `_status` =  ? WHERE  `tbl_banner`.`_id` =?";
 $q = $conn->prepare($sql) or die("ERROR: " . implode(":", $q->conn->errorInfo()));
 $result=$q->execute(array(1,$id));

if($result){
  echo "yes";
}
else{
  echo "no";
}
  ?>
  