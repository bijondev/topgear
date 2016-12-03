<div class="row">
<h1>Order History</h1>
	        <table class="table table-bordered" style="width: 800px;">
        <tr>
        	<th>Order Id</th>
        	<th>Name</th>
            <th>Email</th>
        	<th>Phone</th>
        	<th>Address</th>
            <th></th>
        </tr>
        <?php
         $sql="SELECT * FROM tbl_order where status='pending' order by id desc";
		 $q = $conn->prepare($sql);
		 $q->execute();
		 
		 while($result = $q->fetch()){

		 	# code...
		 
        ?>
        <tr>
        	<td><a href="admin/ajax-view-books.php?id=<?php echo $result['bookid']; ?>" role="button"  data-toggle="modal">
            <?php echo $result['orderid']; ?></a></td>
        	<td><?php echo $result['name']; ?></td>
        	<td><?php echo $result['email']; ?></td>

        	<td><?php echo $result['phone']; ?></td>
        	<td><?php echo $result['address']; ?></td>
            <td><button class="btn btn-danger" id="OrderProcess" value="<?php echo $result['id']; ?>" type="button">Proces</button></td>
        </tr>
        <?php
    }
    ?>
        </table>
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>