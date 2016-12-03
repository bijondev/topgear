  <?php
  include "../config.php"
  ?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Edit Phone</h3>
  </div>

    <?php
    echo $id=isset($_GET['id'])? $_GET['id']:NULL;
    $sql="SELECT * FROM tbl_sms where id='$id'";
		 $q = $conn->prepare($sql);
		 $q->execute();
		 $result = $q->fetch()
    ?>
<form method="post" >
  <div class="form-group">
    <label for="exampleInputEmail1">Name :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="namep" value="<?php echo $result['name']; ?>" placeholder="Enter Name">
    <input type="hidden" name="phoneid" value="<?php echo $result['id']; ?>" >
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Phone Number :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="phone-number" value="<?php echo $result['mobile_no']; ?>" placeholder="Enter Valid Mobile Number">
  </div>
  <input type="submit" name="edit-phone" class="btn btn-danger" value="Save">
</form>

  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

  </div>