  <?php
  include "../config.php"
  ?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Edit Catagory</h3>
  </div>

    <?php
    $id=isset($_GET['id'])? $_GET['id']:NULL;
    $sql="SELECT * FROM tbl_catagory where _id=$id";
		 $q = $conn->prepare($sql);
		 $q->execute();
		 $result = $q->fetch()
    ?>
  <form method="post" >
  <input type="hidden" name="cat_id" value="<?php echo $result['_id']; ?>" />
  <div class="form-group">
    <label for="exampleInputEmail1">Catagory Name</label>
    <input type="text" class="form-control" value="<?php echo $result['_catagory']; ?>" name="phone-catagory" name="Mobile-catagory" placeholder="Enter Mobile Catagory">
  </div>
  <input type="submit" name="edit-catagory" class="btn btn-danger" value="Save Catagory">
</form>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

  </div>