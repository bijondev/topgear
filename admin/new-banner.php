<div class="row">
	<?php

	if(isset($_POST['new-banner'])){

		$picture=$_FILES['picture'];
		//$ptempname=$_FILES['picture']['tmp_name'];
            $file_name = $_FILES['picture']['name'];

      $random_digit=rand(0000,9999);

      $new_file_name=$random_digit.$file_name;

      $path= "banner/".$new_file_name;
      copy($_FILES['picture']['tmp_name'], $path);

		$title=isset($_POST['title'])? $_POST['title']:NULL;


		if($title!=""){
		 $sql = "INSERT INTO `tbl_banner` (`_id`, `_title`, `_image`, `_status`) 
		 VALUES (:id, :title, :image, :status)";
 $q = $conn->prepare($sql);

 $result=$q->execute(array(
  ':id'=>uniqid("mobile_"),
 ':title'=>$title,
 ':image'=>$path,
':status'=>1
)) or die(print_r($q->errorInfo()));
//print_r($q);
}
else{
	echo "Please Enter Title";
}
 			if($result){
 				echo '<div class="alert-message warning">
  <a class="close" href="#">×</a>
  <p><strong>Banner Save Succesfully</p>
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
	<h1>Add New Banner</h1>

	<form method="post" enctype="multipart/form-data" class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Title</label>
    <div class="controls">
      <input type="text" id="inputEmail"  name="title" placeholder="Title">
    </div>
  </div>

  <!--<div class="control-group">
    <label class="control-label" for="inputPassword">From Date</label>
    <div class="controls">
		  <input class="span2" size="16" class="datepicker" type="text" value="12-02-2012">

    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">To Date</label>
    <div class="controls">
      <input type="text" id="inputPassword" placeholder="To Date">
    </div>
  </div>-->

    <div class="control-group">
    <label class="control-label" for="inputPassword">Picture <span class="label label-success">999px X 325px</span></label>
    <div class="controls">
      <div class="fileupload fileupload-new" data-provides="fileupload">
<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
	<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
<div>
<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
<input type="file" name="picture" required /></span>
<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
</div>
</div>
    </div>
  </div>

  <div class="control-group">
    <div class="controls">
      <input type="submit" class="btn btn-primary" name="new-banner" value="save" />
	<input type="reset" class="btn" name="reset" value="Reset" />
    </div>
  </div>
</form>
</div>