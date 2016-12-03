<?php
include "../config.php";
$id=isset($_POST['id'])? $_POST['id']:NULL;
$sql="SELECT * FROM tbl_cms where _id='$id'";
$q = $conn->prepare($sql);
$q->execute();
$result = $q->fetch();
$order=$result['_order']-1;

    $sql = "UPDATE  `tbl_cms` 
    SET  `_order` =  ?
    WHERE  `tbl_cms`.`_id` =?";
 $q = $conn->prepare($sql);

 $result=$q->execute(array($order,$id)) or die(print_r($q->errorInfo()));
?>