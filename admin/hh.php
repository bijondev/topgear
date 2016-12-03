<div class="row">
	        <table class="table table-bordered" style="width: 800px;">
        <tr>
        	<th>Book Name</th>
        	<th>Writer Name</th>
        	<th>Book No</th>

        	<th>View</th>
        	<th>Edit</th>
        	<th>Delete</th>
        	
        </tr>
        <?php
         $sql="SELECT * FROM tbl_book";
		 $q = $conn->prepare($sql)
		 $q->execute();
		 
		 while($result = $q->fetch()){

		 	# code...
		 
        ?>
        <tr>
        	<td><?php echo $result['name']; ?></td>
        	<td><?php echo $result['writer']; ?></td>
        	<td><?php echo $result['bookno']; ?></td>

        	<td><a href="admin/ajax-view-books.php?id=<?php echo $result['id']; ?>" role="button" class="btn btn-primary" data-toggle="modal">View</a></td>
        	<td><button class="btn btn-success" type="button">Edit</button></td>
        	<td><button class="btn btn-danger" type="button">Delete</button></td>
        </tr>
        <?php
    }
    ?>
    </tr>
        
        </table>
</div>