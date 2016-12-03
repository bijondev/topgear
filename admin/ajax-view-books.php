  <?php
  include "../config.php"
  ?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">View MObile Details</h3>
  </div>

    <?php
    $id=isset($_GET['id'])? $_GET['id']:NULL;
    $sql="SELECT * FROM tbl_book where id='$id'";
		 $q = $conn->prepare($sql);
		 $q->execute();
		 $result = $q->fetch()
    ?>
  <table align="center" class="table table-striped">
<tr>
<td>Book Name</td>
<td>:</td>
<td> <?php  echo $result['name'];  ?></td>
</tr>
<tr>
<td>Writer</td>
<td>:</td>
<td><?php echo $result['writer']; ?></td>
</tr>
<tr>
<td>orginal Price</td>
<td>:</td>
<td><?php echo $result['orginalprice']; ?></td>
</tr>
<tr>
<td>Discount Price</td>
<td>:</td>
<td><?php echo $result['descountprice']; ?></td>
</tr>
<tr>
<td>Book No.</td>
<td>:</td>
<td><?php echo $result['bookno']; ?></td>
</tr>
<tr>
<td>Description</td>
<td>:</td>
<td><?php echo $result['description']; ?></td>
</tr>
<tr>
<td>picture</td>
<td>:</td>
<td><img src="uploads/<?php echo $result['picture']; ?>" class="img-polaroid"></td>
</tr>
</table>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

  </div>