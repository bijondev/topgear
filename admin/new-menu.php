<div class="row">
<?php

/*****************************ADD New Menu************************************/
if(isset($_POST['add-menu'])? $_POST['add-menu']:NULL){
   $menuname=_rainsenitizedata(isset($_POST['menu-name'])? $_POST['menu-name']:NULL);
   $menutitle=_rainsenitizedata(isset($_POST['menu-title'])? $_POST['menu-title']:NULL);
   $menucontent=_rainsenitizedata(isset($_POST['menucontent'])? $_POST['menucontent']:NULL);

   if($menuname){
    $sql = "INSERT INTO `tbl_cms` (`_id`, `_menu_name`, _title, _content, _order, _status, _slug) 
    VALUES (:id, :menu_name, :title, :content, :order, :status, :slug)";
 $q = $conn->prepare($sql);

 $result=$q->execute(array(
  ':id'=>NULL,
 ':menu_name'=>$menuname,
 ':title'=>$menutitle,
 ':content'=>$menucontent,
 ':order'=>1,
 ':status'=>1,
 ':slug'=>sanitize($menuname)
)) or die(print_r($q->errorInfo()));
 if($result){
    echo "One Menu Added.";
 }
 else{
    echo "Error to Add Menu.";
 }
   }
   else{
    echo "Please Enter A Catagory Name";
   }
}
//echo "==oky==";
?>
<form method="post" >
  <div class="form-group">
    <label for="menu-name">Menu Name :</label>
    <input type="text" class="form-control" name="menu-name" id="menu-name" name="menu-name" placeholder="Enter Menu Name">
  </div>

  <div class="form-group">
    <label for="title">Title :</label>
    <input type="text" class="form-control"  id="title" name="menu-title" placeholder="Enter Menu Title">
  </div>
  <div class="hero-unit" style="margin-top:40px; padding:10px;">
    <textarea class="textarea" name="menucontent" placeholder="Enter text ..." style="width: 810px; height: 200px; padding:10px;"></textarea>
  </div>
  <input type="submit" class="btn btn-primary" name="add-menu" value="Add Menu" />
</form>        
</div>

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>