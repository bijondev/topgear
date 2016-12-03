<div class="span8" style="margin-bottom:10px;">
<h1 class="breadcrumb"><a class="brand" href="<?php echo $baseurl; ?>">Home</a> <span class="divider">></span> <?php echo isset($_GET['catagory'])? $_GET['catagory']:NULL; ?> </h1>
<?php
$sql="SELECT * FROM tbl_book";
$q = $conn->prepare($sql);
$q->execute();

while($result = $q->fetch()){
?>
<div class="span2" style="height:200px; margin-left: 20px;">
<div class="thumbnail">
      <img src="uploads/<?php echo $result['picture']; ?>" alt="<?php echo $result['name']; ?>">
      <h5><a href="?action=order-now&mobile=<?php echo create_slug($result['name']); ?>&bid=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></h5>
      <a href="?action=order-now&mobile=<?php echo create_slug($result['name']); ?>&bid=<?php echo $result['id']; ?>" style="float:right;" class="btn btn-small btn-primary" >View Details</a>
    </div>
</div>
<!--<div class="span8" style="margin-bottom:10px;">
<img style="float:left;" align="left" src="" class="img-polaroid">
<div style="padding-left: 10px; float:left; width: 450px;">
<b>Name:</b> <?php echo $result['name']; ?> <br>
<b>price:</b> <?php echo $result['orginalprice']; ?>Tk<br>
<b>Now Only:</b> <?php echo $result['descountprice']; ?>Tk<br>
<a href="?action=order-now&bid=<?php echo $result['id']; ?>" style="float:right;" class="btn btn-large btn-primary" >View Details</a>
</div>
</div>-->
<?php
}
?>
</div>