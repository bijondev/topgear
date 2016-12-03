<div class="row">
<h1>View All Mobile</h1>
	<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example" aria-describedby="example_info">
    <thead>
        <tr>
            <th>Catagory</th>
        	<th>Book Name</th>
        	<th>View</th>
        	<th>Edit</th>
        	<th>Delete</th>
        </tr>
        </thead>
        <?php
         $sql="SELECT * FROM tbl_book b, tbl_catagory c where b.cat_id=c._id";
		 $q = $conn->prepare($sql);
		 $q->execute();
		 
		 while($result = $q->fetch()){

		 	# code...
		 
        ?>
        <tr>
        <td><?php echo $result['_catagory']; ?></td>
        	<td><?php echo $result['name']; ?></td>
        	<td><a href="admin/ajax-view-books.php?id=<?php echo $result['id']; ?>" role="button" class="btn btn-primary" data-toggle="modal">View</a></td>
        	<td><a href="?action=edit-book&id=<?php echo $result['id']; ?>" class="btn btn-success" >Edit</a></td>
        	<td><button class="btn btn-danger alertdelete" value="<?php echo $result['id']; ?>" type="button">Delete</button></td>
        </tr>
        <?php
    }
    ?>
        </table>
        
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>