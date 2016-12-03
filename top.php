 <div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="<?php echo $baseurl; ?>">
       <img src="images/topgear-logo.png">
       <img style="margin-left:100px; margin-top:5px;" src="images/topgearbd.png">
       </a>
       <div class="nav-collapse collapse" id="main-menu">
        <ul class="nav" id="main-menu-left" style="float:right; margin-right:200px; margin-top:20px;" >
          <li><a onclick="pageTracker._link(this.href); return false;" href="<?php echo $baseurl; ?>">Home</a></li>
          <?php
        $sql="SELECT * FROM tbl_cms where _slug !='home' order by `_order` ASC ";
        $q = $conn->prepare($sql);
        $q->execute();

        while($result = $q->fetch()){
        ?>
        <li><a id="swatch-link" href="<?php echo $baseurl; ?>?action=page&link=<?php  echo $result['_slug'];  ?>"><?php  echo $result['_menu_name'];  ?></a></li>
        <?php } ?>
          
          <li><a id="swatch-link" href="<?php echo $baseurl; ?>?action=contact-us">Contact Us</a></li>

        </ul>
        <ul class="nav pull-right" id="main-menu-right">
          <li><a rel="tooltip" target="_blank" href="#" title="" onclick="_gaq.push([&#39;_trackEvent&#39;, &#39;click&#39;, &#39;outbound&#39;, &#39;builtwithbootstrap&#39;]);" data-original-title="Showcase of Bootstrap sites &amp; apps"></a></li>
          <li><a rel="tooltip" target="_blank" href="#" title="" onclick="_gaq.push([&#39;_trackEvent&#39;, &#39;click&#39;, &#39;outbound&#39;, &#39;wrapbootstrap&#39;]);" data-original-title="Marketplace for premium Bootstrap templates"></a></li>
        </ul>
       </div>
     </div>
   </div>
 </div>