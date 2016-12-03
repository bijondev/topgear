  <?php
  include "../config.php";

$id=isset($_POST['id'])?$_POST['id']:NULL;
 $sql="DELETE FROM tbl_cms WHERE _id=:id";
 $q = $conn->prepare($sql) or die("ERROR: " . implode(":", $q->conn->errorInfo()));
 $result=$q->execute(array(':id'=>$id));

if($result){
  echo "yes";
}
else{
  echo "no";
}
  ?>