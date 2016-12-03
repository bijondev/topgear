<div class="span8" style="margin-bottom:10px;">
    <div id="myCarousel" class="carousel carousel-fade slide">       
      <!-- Carousel items -->
      <div class="carousel-inner">
      <?php
         $sql="SELECT * FROM tbl_banner where _status=1";
     $q = $conn->prepare($sql);
     $q->execute();
     $i=0;
     while($result = $q->fetch()){
      $i++;
        ?>
        <div class="<?php if($i==1){echo 'active';} ?> item">
   	   		<img src="banner/<?php echo $result['_image']; ?>" alt="">
        </div>
<?php  } ?>

      </div>       
    </div> 
        <?php
        $sqlc="SELECT * FROM tbl_cms where _slug='home'";
        $qc = $conn->prepare($sqlc);
        $qc->execute() or die(print_r($qc->errorInfo()));
        while($result = $qc->fetch()){
        ?>
<h1><?php  echo $result['_title'];  ?></h1>
<p>
	<?php  echo html_entity_decode($result['_content']);  ?>
</p>
<?php } ?>
</div>