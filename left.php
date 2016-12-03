    <div class="span4" style="height:100%;">
    
      <div class="well" style="padding: 8px 0; max-height:300px; overflow: auto; ">
        <ul class="nav nav-list">
          <li class="nav-header">Mobile Catagory</li>
	        <?php
         $sql="SELECT * FROM tbl_catagory order by _catagory";
		 $q = $conn->prepare($sql);
		 $q->execute();
		 
		 while($result = $q->fetch()){
	 ?>
          <li class="active1"><a href="<?php echo $baseurl; ?>?action=view-catagory&catagory=<?php echo $result['_catagory']; ?>&catid=<?php echo $result['_id']; ?>"><?php echo $result['_catagory']; ?></a></li>
          <?php } ?>

        </ul>
      </div>
      <div class="well" style="padding: 8px 0;">
      <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=309530715854595";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-like" data-href="https://www.facebook.com/tgbdenterprise" data-width="370" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
<div class="fb-like-box" data-href="https://www.facebook.com/tgbdenterprise" data-width="370" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="true" data-show-border="false"></div>
      </div>
    </div>