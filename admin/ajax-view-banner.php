  <?php
  include "../config.php"
  ?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <?php
    $id=isset($_GET['id'])? $_GET['id']:NULL;
    $sql="SELECT * FROM tbl_banner where _id=$id";
     $q = $conn->prepare($sql);
     $q->execute();
     $result = $q->fetch()
    ?>
    <h3 id="myModalLabel"><?php  echo $result['_title'];  ?></h3>
  </div>
<img src="banner/<?php echo $result['_image']; ?>" width="600" style="border:1px solid #eee;" >

  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>

  </div>