<div class="row">
<?php

/*****************************ADD New Menu************************************/
if(isset($_POST['add-menu'])? $_POST['add-menu']:NULL){
   $menuname=_rainsenitizedata(isset($_POST['menu-name'])? $_POST['menu-name']:NULL);
   $menutitle=_rainsenitizedata(isset($_POST['menu-title'])? $_POST['menu-title']:NULL);
   $menucontent=_rainsenitizedata(isset($_POST['menucontent'])? $_POST['menucontent']:NULL);
   $hid_id=_rainsenitizedata(isset($_POST['hid_id'])? $_POST['hid_id']:NULL);

   if($menuname){
    $sql = "UPDATE  `tbl_cms` 
    SET  `_menu_name` =  ?,
    `_title` =  ?,
    `_content` =  ? 
    WHERE  `tbl_cms`.`_id` =?";
 $q = $conn->prepare($sql);

 $result=$q->execute(array($menuname,$menutitle,$menucontent,$hid_id)) or die(print_r($q->errorInfo()));
 if($result){
    echo "One Menu Edit.";
 }
 else{
    echo "Error to Edit Menu.";
 }
   }
   else{
    echo "Please Enter A Catagory Name";
   }
}
//echo "==oky==";
?>
<?php
    $id=isset($_GET['id'])? $_GET['id']:NULL;
    $sql="SELECT * FROM tbl_cms where _id='$id'";
     $q = $conn->prepare($sql);
     $q->execute();
     $result = $q->fetch()
    ?>
<form method="post" >
<input type="hidden" name="hid_id" value="<?php  echo $result['_id'];  ?>" >
  <div class="form-group">
    <label for="menu-name">Menu Name :</label>
    <input type="text" class="form-control" name="menu-name" id="menu-name" value="<?php  echo $result['_menu_name'];  ?>" name="menu-name" placeholder="Enter Menu Name">
  </div>

  <div class="form-group">
    <label for="title">Title :</label>
    <input type="text" class="form-control" value="<?php  echo $result['_title'];  ?>"  id="title" name="menu-title" placeholder="Enter Menu Title">
  </div>
  <div class="hero-unit" style="margin-top:40px; padding:10px;">
    <textarea class="textarea" name="menucontent" placeholder="Enter text ..." style="width: 810px; height: 200px; padding:10px;"><?php  echo html_entity_decode($result['_content']);  ?></textarea>
  </div>
  <input type="submit" class="btn btn-primary" name="add-menu" value="Save Menu" />
</form>        
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>