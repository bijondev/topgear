<div class="row">
	<?php

	if(isset($_POST['save'])){

				$picture=$_FILES['picture'];
		//$ptempname=$_FILES['picture']['tmp_name'];

				$file_name = $_FILES['picture']['name'];

			$random_digit=rand(0000,9999);

			$new_file_name=$random_digit.$file_name;

			$path= "uploads/".$new_file_name;
			copy($_FILES['picture']['tmp_name'], $path);

		$bookname=isset($_POST['bookname'])? $_POST['bookname']:NULL;
		//$_POST['bookname'];
		$catagory=isset($_POST['catagory'])? $_POST['catagory']:NULL;//$_POST['writername'];

		//$bookno=isset($_POST['bookno'])? $_POST['bookno']:NULL;//isset($_POST['bookno']);
		$description=isset($_POST['description'])? $_POST['description']:NULL;//isset($_POST['description']);
		$orginalprice=isset($_POST['orginalprice'])? $_POST['orginalprice']:NULL;
		$descountprice=isset($_POST['descountprice'])? $_POST['descountprice']:NULL;
		$moblelink=isset($_POST['moblelink'])? $_POST['moblelink']:NULL;

		if($bookname!=""){
		 $sql = "INSERT INTO `tbl_book` (`id`, `name`, `cat_id`, writer,`description`, `orginalprice`, `descountprice`, `picture`) 
		 VALUES (:id, :name, :catid, :writer, :description, :orginalprice, :descountprice, :picture);";
 $q = $conn->prepare($sql);

 $result=$q->execute(array(
		':id'=>uniqid("mobile_"),
		':name'=>$bookname,
		':catid'=>$catagory,
		':writer'=>$moblelink,
		':description'=>$description,
		':orginalprice'=>$orginalprice,
		':descountprice'=>$descountprice,
		':picture'=>$new_file_name
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
	<h1>Add New Mobile</h1>
	<form method="post" enctype="multipart/form-data" >
<table>
<tr>
<td>Mobile Title</td>
<td>:</td>
<td> <input type="text" required  name="bookname" class="input-xlarge" id="input01"> </td>
</tr>
<tr>
<td>Catagory</td>
<td>:</td>
<td>
	<select class="form-control" name="catagory">
	        <?php
         $sql="SELECT * FROM tbl_catagory";
		 $q = $conn->prepare($sql);
		 $q->execute();
		 
		 while($result = $q->fetch()){
	 
        ?>
  <option value="<?php echo $result['_id']; ?>" ><?php echo $result['_catagory']; ?></option>
  <?php     }     ?>
</select>
</td>
</tr>
<tr>
<td>Orginale Price</td>
<td>:</td>
<td><div class="input-append">
<input type="number" required  name="orginalprice" class="span2" id="input01">
<span class="add-on">.00</span>
</div></td>
</tr>
<tr>
<td>Descount Price</td>
<td>:</td>
<td><div class="input-append">
<input type="number" name="descountprice" class="span2" id="input01">
<span class="add-on">.00</span>
</div></td>
</tr>
<tr>
<td>Description</td>
<td>:</td>
<td><textarea class="input-xlarge" name="description" id="textarea" rows="3"></textarea></td>
</tr>

<tr>
<td>Link</td>
<td>:</td>
<td> <input type="text" required  name="moblelink" class="input-xlarge" id="input01"> </td>
</tr

<tr>
<td>Picture</td>
<td></td>
<td><div class="fileupload fileupload-new" data-provides="fileupload">
<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
	<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
<div>
<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
<input type="file" name="picture" required /></span>
<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
</div>
</div></td>
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