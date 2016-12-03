<div class="row">
<?php

if(isset($_POST['edit-catagory'])? $_POST['edit-catagory']:NULL){
   $phonecatagory=isset($_POST['phone-catagory'])? $_POST['phone-catagory']:NULL;
   $cat_id=isset($_POST['cat_id'])? $_POST['cat_id']:NULL;
   if($phonecatagory){

    $sql = "UPDATE `tbl_catagory` SET `_catagory` = '$phonecatagory' WHERE `tbl_catagory`.`_id` =$cat_id";
 $q = $conn->prepare($sql);

 $result=$q->execute() or die(print_r($q->errorInfo()));
 if($result){
    echo "Catogory Edit";
 }
 else{
    echo "Error to Edit Catagory.";
 }
   }
   else{
    echo "Please Enter A Catagory Name.";
   }
}

/*****************************Add Catagory************************************/
if(isset($_POST['save-catagory'])? $_POST['save-catagory']:NULL){
   $phonecatagory=isset($_POST['phone-catagory'])? $_POST['phone-catagory']:NULL;
   if($phonecatagory){
    $sql = "INSERT INTO `tbl_catagory` (
`_id` ,`_catagory`) VALUES (:id , :catagory)";
 $q = $conn->prepare($sql);

 $result=$q->execute(array(
  ':id'=>uniqid(),
 ':catagory'=>$phonecatagory
)) or die(print_r($q->errorInfo()));
 if($result){
    echo "One Catagory Added.";
 }
 else{
    echo "Error to Add Catagory.";
 }
   }
   else{
    echo "Please Enter A Catagory Name.";
   }
}
//echo "==oky==";
?>
<form method="post" >
  <div class="form-group">
    <label for="exampleInputEmail1">Catagory Name</label>
    <input type="text" class="form-control" name="phone-catagory" id="exampleInputEmail1" name="Mobile-catagory" placeholder="Enter Mobile Catagory">
  </div>
  <input type="submit" name="save-catagory" class="btn btn-danger" value="Save Catagory">
</form>

<h1>View All Catagory</h1>
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example" aria-describedby="example_info">
    <thead>
        <tr>
        	<th>Catagory Name</th>
        	<th>Edit</th>
        	<th>Delete</th>
        </tr>
        </thead>
        <?php
         $sql="SELECT * FROM tbl_catagory";
		 $q = $conn->prepare($sql);
		 $q->execute();
		 
		 while($result = $q->fetch()){
	 
        ?>
        <tr>
        	<td><?php echo $result['_catagory']; ?></td>
        	<td><a data-toggle="modal" href="admin/ajax-edit-catagory.php?id=<?php echo $result['_id']; ?>" class="btn btn-success" >Edit</a></td>
        	<td><button class="btn btn-danger alertdeletecatagory" value="<?php echo $result['_id']; ?>" type="button">Delete</button></td>
        </tr>
        <?php
    }
    ?>
        </table>
        
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>