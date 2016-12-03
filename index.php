<?php
include 'config.php';
include_once 'functions.php';
?>
<!DOCTYPE html>
<!-- saved from url=(0031)http://bootswatch.com/cerulean/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Exclusive Mobile &amp; Accessories</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A calm, blue sky.">
    <meta name="author" content="Thomas Park">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootswatch.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">


  <!-- Navbar
    ================================================== -->
    <?php
    include 'top.php';
    ?>


    <div class="container">

  <!-- Navs
  ================================================== -->

  <div class="row" style="margin-top:100px;">


     <?php
    include 'left.php';
    ?>
    <?php
      $action=isset($_GET['action'])? $_GET['action']:NULL;
      if($action=="order-now")
      {
        include "order-now.php";
      }
      else if($action=="confirm-order"){
        include "confirm-order.php";
      }
      else if($action=="about-us"){
        include "about-usr.php";
      }
      else if($action=="contact-us"){
        include "contact-us.php";
      }
      else if($action=="view-catagory"){
        include "home.php";
      }
      else if($action=="page"){
        include "page.php";
      }
      else{
        include "homecontent.php";
      }
      ?>



  </div>




     <!-- Footer
      ================================================== -->
      <hr>

      <footer id="footer">
        <p class="copyright span3">© www.topgearbd.com 2013 </p>
      </footer>

    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!--<script src="jsjquery.smooth-scroll.min.js"></script>
    <script src="jsbootstrap.min.js"></script>
    <script src="jsbootswatch.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>-->

  
<script>
  //$(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
  $(document).ready(function() {
      $('#myCarousel').carousel();
    });
</script>
</body></html>