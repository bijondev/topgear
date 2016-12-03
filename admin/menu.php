<div class="row">
<h1>View All Menu</h1>
  <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example" aria-describedby="example_info">
    <thead>
        <tr>
            <th>Menu</th>
          <th>Title</th>
          <th>Order</th>
          <th>View</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
        </thead>
        <?php
        $sql="SELECT * FROM tbl_cms order by `_order` ASC";
        $q = $conn->prepare($sql);
        $q->execute();

        while($result = $q->fetch()){
        ?>
        <tr>
        <td><?php echo $result['_menu_name']; ?></td>
          <td><?php echo $result['_title']; ?></td>
          <td><span class="badge badge-warning"><?php echo $result['_order']; ?></span>
<button id="button_up" class="btn btn-mini btn-success" value="<?php echo $result['_id']; ?>"><img src="images/up.png"></button>
<button id="button_down"  class="btn btn-mini btn-warning" value="<?php echo $result['_id']; ?>"><img src="images/down.png"></button>
          </td>
          <td><a href="admin/ajax-view-menu.php?id=<?php echo $result['_id']; ?>" role="button" class="btn btn-primary" data-toggle="modal">View</a></td>
          <td><a href="?action=edit-menu&id=<?php echo $result['_id']; ?>" class="btn btn-success" >Edit</a></td>
          <td><button class="btn btn-danger alertdeletemenu" value="<?php echo $result['_id']; ?>" type="button">Delete</button></td>
        </tr>
        <?php   }   ?>
        </table>
        
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>