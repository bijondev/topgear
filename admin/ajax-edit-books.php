
<div class="row">
	<?php
	//use PHPImageWorkshop\ImageWorkshop as ImageWorkshop;
		//require_once('autoload.php');

		if(isset($_POST['changepicture'])){
							$picture=$_FILES['picture'];
							$bookid=isset($_POST['bookid'])? $_POST['bookid']:NULL;
		//$ptempname=$_FILES['picture']['tmp_name'];
				$picture=$_FILES['picture'];
		//$ptempname=$_FILES['picture']['tmp_name'];

				$file_name = $_FILES['picture']['name'];

			$random_digit=rand(0000,9999);

			$new_file_name=$random_digit.$file_name;

			$path= "uploads/".$new_file_name;
			copy($_FILES['picture']['tmp_name'], $path);

		$sql = "UPDATE tbl_book
             SET picture=:picture
             WHERE id=:id";

 $q = $conn->prepare($sql) or die("ERROR: " . implode(":", $q->conn->errorInfo()));

 $result=$q->execute(array(
  ':id'=>$bookid,
':picture'=>$file_name
)) or die(print_r($q->errorInfo()));
 if($result){
 				echo '<div class="alert-message warning">
  <a class="close" href="#">×</a>
  <p><strong>Book Save Succesfully</p>
</div>';
 			}
 			else{
 				echo '<div class="alert-message warning">
  <a class="close" href="#">×</a>
  <p><strong>faild to add new book</p>
</div>';
 			}
//print_r($q);

		}



	if(isset($_POST['save'])){
		$bookid=isset($_POST['bookid'])? $_POST['bookid']:NULL;
		$bookname=isset($_POST['bookname'])? $_POST['bookname']:NULL;
		//$_POST['bookname'];
		//$writername=isset($_POST['writername'])? $_POST['writername']:NULL;//$_POST['writername'];

		//$bookno=isset($_POST['bookno'])? $_POST['bookno']:NULL;//isset($_POST['bookno']);
		$description=isset($_POST['description'])? $_POST['description']:NULL;//isset($_POST['description']);
		$orginalprice=isset($_POST['orginalprice'])? $_POST['orginalprice']:NULL;
		$descountprice=isset($_POST['descountprice'])? $_POST['descountprice']:NULL;
		$moblelink=isset($_POST['moblelink'])? $_POST['moblelink']:NULL;

		$catagory=isset($_POST['catagory'])? $_POST['catagory']:NULL;

		if($bookname!="" ){

		     $sql = "UPDATE tbl_book
             SET name=:name,
                cat_id=:catid, 
                description=:description, 
                writer=:writer,
                orginalprice=:orginalprice, 
                descountprice=:descountprice
             WHERE id=:id";

 $q = $conn->prepare($sql) or die("ERROR: " . implode(":", $q->conn->errorInfo()));

 $result=$q->execute(array(
  ':id'=>$bookid,
 ':name'=>$bookname,
 ':catid'=>$catagory,
':description'=>$description,
':writer'=>$moblelink,
':orginalprice'=>$orginalprice,
':descountprice'=>$descountprice
)) or die(print_r($q->errorInfo()));
//print_r($q);
}
else{
	echo "Please Enter Book name and writer.";
}
 			if($result){
 				echo '<div class="alert-message warning">
  <a class="close" href="#">×</a>
  <p><strong>Book Save Succesfully</p>
</div>';
 			}
 			else{
 				echo '<div class="alert-message warning">
  <a class="close" href="#">×</a>
  <p><strong>faild to add new book</p>
</div>';
 			}

	}

	?>

	<?php
$bookid=$_GET['id'];
    $id=isset($_GET['id'])? $_GET['id']:NULL;
    $sql="SELECT * FROM tbl_book where id='$id'";
		 $q = $conn->prepare($sql);
		 $q->execute();
		 $result = $q->fetch()

?>
	<form method="post" enctype="multipart/form-data" >
		<input type="hidden" name="bookid" value="<?php  echo $result['id'];  ?>" />
<table>
<tr>
<td>Book Name</td>
<td>:</td>
<td> <input type="text" required  name="bookname" value="<?php  echo $result['name'];  ?>" class="input-xlarge" id="input01"> </td>
</tr>
<tr>
<td>Writer</td>
<td>:</td>
<td>
	<select class="form-control" name="catagory">
	        <?php
         $sqlc="SELECT * FROM tbl_catagory";
		 $qc = $conn->prepare($sqlc);
		 $qc->execute();
		 
		 while($resultc = $qc->fetch()){
	 
        ?>

  <option <?php if($result['cat_id']==$resultc['_id']) {echo "Selected";} ?> value="<?php echo $resultc['_id']; ?>" ><?php echo $resultc['_catagory']; ?></option>
  <?php     }     ?>
</select>
</td>
</tr>
<tr>
<td>Orginale Price</td>
<td>:</td>
<td><div class="input-append">
<input type="number" required  name="orginalprice" value="<?php  echo $result['orginalprice'];  ?>" class="span2" id="input01">
<span class="add-on">.00</span>
</div></td>
</tr>
<tr>
<td>Descount Price</td>
<td>:</td>
<td><div class="input-append">
<input type="number" name="descountprice" value="<?php  echo $result['descountprice'];  ?>" class="span2" id="input01">
<span class="add-on">.00</span>
</div></td>
</tr>
<tr>
<td>Description</td>
<td>:</td>
<td><textarea class="input-xlarge" name="description" id="textarea" rows="3"><?php  echo $result['description'];  ?></textarea></td>
</tr>

<tr>
<td>Link</td>
<td>:</td>
<td> <input type="text" required  name="moblelink" value="<?php  echo $result['writer'];  ?>" class="input-xlarge" id="input01"> </td>
</tr

<tr>
<td>Picture</td>
<td></td>
<td><img src="uploads/<?php echo $result['picture']; ?>" class="img-polaroid">
<a href="admin/ajax-change-picture.php?id=<?php echo $result['id']; ?>" role="button" class="btn btn-warning" data-toggle="modal">Change Picture</a>
</td>
</tr>
<tr>
<td></td>
<td></td>
<td><input type="submit" class="btn btn-primary" name="save" value="save" />
	<input type="reset" class="btn" name="reset" value="Reset" />
</td>
</tr>
</table>
</form>
</div>