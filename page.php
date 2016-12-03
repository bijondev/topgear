<div class="span8" style="margin-bottom:10px;">
        <?php
        $link=isset($_GET['link'])? $_GET['link']:NULL;
        
        $sqlc="SELECT * FROM tbl_cms where _slug='$link'";
        $qc = $conn->prepare($sqlc);
        $qc->execute() or die(print_r($qc->errorInfo()));
        while($result = $qc->fetch()){
        ?>
<h1>About Us</h1>

<h1><?php  echo $result['_title'];  ?></h1>
<p>
	<?php  echo html_entity_decode($result['_content']);  ?>
</p>
<?php } ?>
</div>