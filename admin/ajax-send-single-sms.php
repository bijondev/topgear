  <?php
  include "../config.php"
  ?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Send Sms</h3>
  </div>

    <?php
    $id=isset($_GET['id'])? $_GET['id']:NULL;
    $sql="SELECT * FROM tbl_sms where id=$id";
		 $q = $conn->prepare($sql);
		 $q->execute();
		 $result = $q->fetch()
    ?>
<form method="post" style="margin-left:50px;" >
<div class="form-group">
    <label for="exampleInputEmail1">Phone Number :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="mobilenumber" readonly value="<?php echo $result['mobile_no']; ?>" placeholder="Enter Name">
    <input type="hidden" name="phoneid" value="<?php echo $result['id']; ?>"  >
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Name :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="namep" readonly value="<?php echo $result['name']; ?>" placeholder="Enter Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Title :</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="title"  placeholder="Enter A title">
  </div>

  <div class="form-group">
    <SCRIPT LANGUAGE="JavaScript">
function textCounter(field, countfield, maxlimit) {
  if (field.value.length > maxlimit)
      {field.value = field.value.substring(0, maxlimit);}
      else
      {countfield.value = maxlimit - field.value.length;}
  }
//  End -->
</script>
    <label for="exampleInputEmail1">SMS Body :</label>
    <textarea name="smsbody" onKeyDown="textCounter(this.form.smsbody,this.form.remLentext,160);" onKeyUp="textCounter(this.form.smsbody,this.form.remLentext,160);"></textarea><br />
    Characters remaining: <input type=box readonly name=remLentext size=3 style="width:30px;" value=160>
  </div>
  <input type="submit" name="send-singel-phone" class="btn btn-danger" value="Send">
</form>

  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

  </div>