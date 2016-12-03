  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Send Group SMS</h3>
  </div>
  <?php
$ids=isset($_GET['ids'])? $_GET['ids']:NULL;

  ?>
<form method="post" style="margin-left:50px;" >
<input type="hidden" name="hiddenids" value="<?php echo $ids; ?>" >
  <div class="form-group">
    <label for="smstitle">Title :</label>
    <input type="text" class="form-control" id="smstitle" name="title"  placeholder="Enter A title">
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
    <label for="smsbody">SMS Body :</label>
    <textarea name="smsbody" id="smsbody" onKeyDown="textCounter(this.form.smsbody,this.form.remLentext,160);" onKeyUp="textCounter(this.form.smsbody,this.form.remLentext,160);"></textarea> <br />
    Characters remaining: <input type=box readonly name=remLentext size=3 style="width:30px;" value=160>

  </div>
  <input type="submit" name="send-group-sms" class="btn btn-danger" value="Send SMS">
</form>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

  </div>