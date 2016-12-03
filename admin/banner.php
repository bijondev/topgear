<div class="row">
<h1>View All Banner</h1>
  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example" aria-describedby="example_info">
    <thead>
        <tr>
        <th>picture</th>
          <th>Title</th>
          <th>View</th>
        </tr>
        </thead>
        <?php
         $sql="SELECT * FROM tbl_banner";
     $q = $conn->prepare($sql);
     $q->execute();
     
     while($result = $q->fetch()){
        ?>
        <tr>
        <td> <img src="banner/<?php echo $result['_image']; ?>" width="400" style="border:1px solid #eee;" > </td>
          <td><?php echo $result['_title']; ?></td>
          <td>
          <a href="admin/ajax-view-banner.php?id=<?php echo $result['_id']; ?>" role="button" class="btn btn-primary" data-toggle="modal">View</a>
          <a href="?action=edit-banner&id=<?php echo $result['_id']; ?>" class="btn btn-success" >Edit</a>
          <button class="btn btn-danger alertdeletebanner" value="<?php echo $result['_id']; ?>" type="button">Delete</button>

          <?php
          if($result['_status']==0)
          {
          ?>
          <button class="btn btn-warning " id="menu_enable" value="<?php echo $result['_id']; ?>" type="button">Enable</button>
          <?php }
          else{
          ?>
          <button class="btn btn-inverse " id="menu_diesable" value="<?php echo $result['_id']; ?>" type="button">Disable</button>
          <?php } ?>
          </td>
        </tr>
        <?php
    }
    ?>
        </table>
        
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>