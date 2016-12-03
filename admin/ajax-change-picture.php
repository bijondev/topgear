  <?php
  include "../config.php"
  ?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <?php
    $id=isset($_GET['id'])? $_GET['id']:NULL;
    $sql="SELECT * FROM tbl_book where id=$id";
     $q = $conn->prepare($sql);
     $q->execute();
     $result = $q->fetch()
    ?>
    <h3 id="myModalLabel">Change Book Picture of "<?php  echo $result['name'];  ?>"</h3>
  </div>

<form method="POST" id="changepicture"  enctype="multipart/form-data" >
  <table align="center" class="table table-striped">
<input type="hidden" name="bookid" value="<?php  echo $result['id'];  ?>" />
<tr>
<td>picture</td>
<td>:</td>
<td><div class="fileupload fileupload-new" data-provides="fileupload">
<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
  <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" /></div>
<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
<div>
<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
<input type="file" name="picture" required /></span>
<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
</div>
</div>
<input type="hidden" name="changepicture" value="changepicture" />
</td>
</tr>
</table>
</form>
  <div class="modal-footer">
    <a class="btn btn-primary" onclick="$('#changepicture').submit();">Change Picture</a>
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

  </div>