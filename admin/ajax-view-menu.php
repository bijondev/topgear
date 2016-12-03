  <?php
  include "../config.php"
  ?>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">View Menu</h3>
  </div>

    <?php
    $id=isset($_GET['id'])? $_GET['id']:NULL;
    $sql="SELECT * FROM tbl_cms where _id='$id'";
		 $q = $conn->prepare($sql);
		 $q->execute();
		 $result = $q->fetch()
    ?>
    <div  style="margin-left:10px;">
      <div class="form-group">
    <label for="menu-name"><b>Menu Name :</b><?php  echo $result['_menu_name'];  ?></label>
    
  </div>

    <div class="form-group">
    <label for="menu-name"><b>Menu Title :</b><?php  echo $result['_title'];  ?></label>
    
  </div>
    <div class="form-group">
    <label for="menu-name"><b>Content :</b></label>
    <?php  echo html_entity_decode($result['_content']);  ?>
  </div>

  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
</div>
  </div>