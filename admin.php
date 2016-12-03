<?php
include "config.php";
ini_set('max_execution_time', 900);
include "sanitizer_function/sanitizer.php";
if(!empty($_SESSION['user_email']))
{
?>
<!DOCTYPE html>
<!-- saved from url=(0031)http://bootswatch.com/cerulean/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Top Gear Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A calm, blue sky.">
    <meta name="author" content="Thomas Park">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="csst/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootswatch.css" rel="stylesheet">
    <link href="css/bootstrap-fileupload.css" rel="stylesheet">
    <link href="css/datepicker.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="lib/css/bootstrap.min.css"></link>
<link rel="stylesheet" type="text/css" href="lib/css/prettify.css"></link>
<link rel="stylesheet" type="text/css" href="src/bootstrap-wysihtml5.css"></link>

<style type="text/css" media="screen">
  .btn.jumbo {
    font-size: 20px;
    font-weight: normal;
    padding: 14px 24px;
    margin-right: 10px;
    -webkit-border-radius: 6px;
    -moz-border-radius: 6px;
    border-radius: 6px;
  }
</style>


  <script type="text/javascript" async="" src="./Bootswatch  Cerulean_files/bsa.js"></script>
  <script type="text/javascript" id="_bsap_js_c466df00a3cd5ee8568b5c4983b6bb19" src="./Bootswatch  Cerulean_files/s_c466df00a3cd5ee8568b5c4983b6bb19.js" async="async"></script>
  <style type="text/css" id="bsa_css">
  .one{position:relative}
  .one .bsa_it_ad{display:block;padding:15px;border:1px solid #e1e1e1;background:#f9f9f9;font-family:helvetica,arial,sans-serif;line-height:100%;position:relative}
  .one .bsa_it_ad a{text-decoration:none}
  .one .bsa_it_ad a:hover{text-decoration:none}
  .one .bsa_it_ad .bsa_it_t{display:block;font-size:12px;font-weight:bold;color:#212121;line-height:125%;padding:0 0 5px 0}
  .one .bsa_it_ad .bsa_it_d{display:block;font-size:11px;color:#434343;font-size:12px;line-height:135%}
  .one .bsa_it_ad .bsa_it_i{float:left;margin:0 15px 10px 0}
  .one .bsa_it_p{display:block;text-align:right;position:absolute;bottom:10px;right:15px}
  .one .bsa_it_p a{font-size:10px;color:#666;text-decoration:none}
  .one .bsa_it_ad .bsa_it_p a:hover{font-style:italic}
</style></head>

  <body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80" style="margin-top: 36px; ">
        <div class="bb-alert alert alert-info" style="display:none;">
        <span>The examples populate this alert with dummy content</span>
    </div>


  <!-- Navbar
    ================================================== -->
 <div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="admin.php">Admin</a>
       <?php
        include "admin/header.php"
       ?>
     </div>
   </div>
 </div>

    <div class="container">
      <?php
      include 'functions.php';
      $action=isset($_GET['action'])? $_GET['action']:NULL;
      if($action=="new-book")
      {
        include "admin/add-book.php";
      }
      else if($action=="view-all-book"){
        include "admin/view-all-book.php";
      }
      else if($action=="catagory"){
        include "admin/catagory.php";
      }
      else if($action=="edit-book"){
        include "admin/ajax-edit-books.php";
      }
      else if($action=="order"){
        include "admin/order.php";
      }
      else if($action=="phone-number"){
        include "admin/phone-number.php";
      }
      else if($action=="send-sms"){
        include "admin/send-sms.php";
      }
      /******************SMS Start*************************/
      else if($action=="menu"){
        include "admin/menu.php";
      }
      else if($action=="new-menu"){
        include "admin/new-menu.php";
      }
      else if($action=="edit-menu"){
        include "admin/edit-menu.php";
      }
      else if($action=="banner"){
        include "admin/banner.php";
      }
      else if($action=="new-banner"){
        include "admin/new-banner.php";
      }
      else if($action=="edit-banner"){
        include "admin/edit-banner.php";
      }
      /*******************CMS End***********************/
      else{
        include "admin/view-all-book.php";
      }
      ?>
  

     <!-- Footer
      ================================================== -->
      <hr>
<?php
        include "admin/footer.php"
       ?>
      

    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="js/jquery.min.js"></script>-->
    <script src="lib/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" charset="utf-8" src="js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/ZeroClipboard.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/TableTools.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/dataTables.bootstrap.js"></script>
    <script src="js/jquery.smooth-scroll.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootswatch.js"></script>
    <script src="js/bootstrap-fileupload.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/example.js"></script>
    <script src="js/bootbox.min.js"></script>

        <script src="lib/js/wysihtml5-0.3.0.js"></script>
<script src="lib/js/prettify.js"></script>
<script src="src/bootstrap-wysihtml5.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script>
  $('.textarea').wysihtml5();
  $(function(){
      $('.datepicker').datepicker();
  });
</script>


<script type="text/javascript" charset="utf-8">
$body = $("body");

$(document).on({
    ajaxStart: function() { 
        $body.addClass("loading"); 
    },
    ajaxStop: function() { 
        $body.removeClass("loading"); 
    }    
});
/***********************Send All SMS*****************************/
$(document).on("click", "#sendallsms", function(e) {
var smstitle=$("#smstitle").val();
var smsbody=$("#smsbody").val();

if(smstitle!="" || smsbody!=""){
$.ajax({
          type: "POST",
          url: "admin/send-all-sms.php",
          data: {smstitle:smstitle, smsbody:smsbody}
        }).done(function( msg ) {
          //alert( "Data Saved: " + msg );
          if(msg=='yes'){
            Example.show("The record delete succesfully!"); 
            location.reload();  
          }
          else{
            Example.show("Error to delete record!");
            location.reload();  
          }
$("#smstitle").val("");
$("#smsbody").val("");
                                        
        });                                      
}
else{
  alert("Please Enter A title & SMS Body");
}
});

      $(document).ready( function () {
        $('#example').dataTable( {
          "sDom": "<'row-fluid'<'span6'T><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
          "oTableTools": {
            "aButtons": [
              "copy",
              "print",
              {
                "sExtends":    "collection",
                "sButtonText": 'Save <span class="caret" />',
                "aButtons":    [ "csv", "xls", "pdf" ]
              }
            ]
          }
        } );
      } );
    </script>
    <script>
        $(document).on("click", ".alertdelete", function(e) {
          var id=$(this).val();
            bootbox.confirm("Are you sure?", function(result) {

              if(result==true){
                              
                        $.ajax({
                                  type: "POST",
                                  url: "admin/delete_book.php",
                                  data: { id: id }
                                }).done(function( msg ) {
                                  //alert( "Data Saved: " + msg );
                                  if(msg=='yes'){
                                    Example.show("The record delete succesfully!"); 
                                    location.reload();  
                                  }
                                  else{
                                    Example.show("Error to delete record!");
                                    location.reload();  
                                  }
                                                                
                                });                                      
                        
                      
              }
              else{
                Example.show("Confirm result no: "+result);
              }
  
}); 
        });
/////////////////////Delete Catagory/////////////////////////////////
        $(document).on("click", ".alertdeletecatagory", function(e) {
          var id=$(this).val();
            bootbox.confirm("Are you sure?", function(result) {

              if(result==true){
                              
                        $.ajax({
                                  type: "POST",
                                  url: "admin/delete_Catagory.php",
                                  data: { id: id }
                                }).done(function( msg ) {
                                  //alert( "Data Saved: " + msg );
                                  if(msg=='yes'){
                                    Example.show("The record delete succesfully!"); 
                                    location.reload();  
                                  }
                                  else{
                                    Example.show("Error to delete record!");
                                    location.reload();  
                                  }
                                                                
                                });                                      
                        
                      
              }
              else{
                Example.show("Confirm result no: "+result);
              }
  
}); 
        });

/////////////////////Delete Menu/////////////////////////////////
        $(document).on("click", ".alertdeletemenu", function(e) {
          var id=$(this).val();
            bootbox.confirm("Are you sure?", function(result) {

              if(result==true){
                              
                        $.ajax({
                                  type: "POST",
                                  url: "admin/ajax_delete_menu.php",
                                  data: { id: id }
                                }).done(function( msg ) {
                                  //alert( "Data Saved: " + msg );
                                  if(msg=='yes'){
                                    Example.show("The record delete succesfully!"); 
                                    location.reload();  
                                  }
                                  else{
                                    Example.show("Error to delete record!");
                                    location.reload();  
                                  }
                                                                
                                });                                      
                        
                      
              }
              else{
                Example.show("Confirm result no: "+result);
              }
  
}); 
        });

/////////////////////Delete Phone/////////////////////////////////
$(document).on("click", ".alertdeletePhone", function(e) {
var id=$(this).val();
bootbox.confirm("Are you sure?", function(result) {
if(result==true){
$.ajax({
type: "POST",
url: "admin/delete_Phone.php",
data: { id: id }
}).done(function( msg ) {
//alert( "Data Saved: " + msg );
if(msg=='yes'){
  Example.show("The record delete succesfully!"); 
  location.reload();  
}
else{
  Example.show("Error to delete record!");
}                            
});                                             
}
else{
  Example.show("Confirm result no: "+result);
}
}); 
});
/////////////////////Delete Banner/////////////////////////////////
$(document).on("click", ".alertdeletebanner", function(e) {
var id=$(this).val();
bootbox.confirm("Are you sure?", function(result) {
if(result==true){
$.ajax({
type: "POST",
url: "admin/ajax_delete_banner.php",
data: { id: id }
}).done(function( msg ) {
//alert( "Data Saved: " + msg );
if(msg=='yes'){
  Example.show("The record delete succesfully!"); 
  location.reload();  
}
else{
  Example.show("Error to delete record!");
  location.reload();  
}                            
});                                             
}
else{
  Example.show("Confirm result no: "+result);
}
}); 
});
/////////////////////Order Up/////////////////////////////////
$(document).on("click", "#button_up", function(e) {
var id=$(this).val();

$.ajax({
type: "POST",
url: "admin/menu_order_up.php",
data: { id: id }
}).done(function( msg ) {
location.reload();
});                                             

});
/////////////////////Order Down/////////////////////////////////
$(document).on("click", "#button_down", function(e) {
var id=$(this).val();

$.ajax({
type: "POST",
url: "admin/menu_order_down.php",
data: { id: id }
}).done(function( msg ) {
   location.reload();                         
});                                             

});
/////////////////////Banner Enable/////////////////////////////////
$(document).on("click", "#menu_enable", function(e) {
var id=$(this).val();

$.ajax({
type: "POST",
url: "admin/ajax_banner_enable.php",
data: { id: id }
}).done(function( msg ) {
   location.reload();                         
});                                             

});
/////////////////////Banner Disable/////////////////////////////////
$(document).on("click", "#menu_diesable", function(e) {
var id=$(this).val();

$.ajax({
type: "POST",
url: "admin/ajax_banner_disable.php",
data: { id: id }
}).done(function( msg ) {
   location.reload();                         
});                                             

});
/////////////////////Order proces/////////////////////////////////
$(document).on("click", "#OrderProcess", function(e) {
var id=$(this).val();

$.ajax({
type: "POST",
url: "admin/ajax-OrderProcess.php",
data: { id: id }
}).done(function( msg ) {
   location.reload();                         
});                                             

});

$(function() {
    Example.init({
        "selector": ".bb-alert"
    });
});

    </script>
<script type="text/javascript">
$(document).ready(function() {
  
$('[data-toggle="modalcheck"]').click(function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  var val=getCheckBoxValues();
  url=url+"?ids="+val;
  
  //alert(val);
  if (url.indexOf('#') == 0) {
    $(url).modal('open');
  } else {
    $.get(url, function(data) {
      $('<div class="modal hide fade">' + data + '</div>').modal();
    }).success(function() { $('input:text:visible:first').focus(); });
  }
});
  
});


function getCheckBoxValues() {
    var checkboxVals = [];
    $('input:checkbox[name="phoneid"]:checked').each(function(index){
        checkboxVals.push($(this).val());
    })
    //alert('You selected check boxes "' + checkboxVals + '"');
    return checkboxVals;
}


$(document).ready(function() {
  
$('[data-toggle="modal"]').click(function(e) {
  e.preventDefault();
  var url = $(this).attr('href');
  if (url.indexOf('#') == 0) {
    $(url).modal('open');
  } else {
    $.get(url, function(data) {
      $('<div class="modal hide fade">' + data + '</div>').modal();
    }).success(function() { $('input:text:visible:first').focus(); });
  }
});
  
});
</script>
<SCRIPT language="javascript">
$(function(){
 
    // add multiple select / deselect functionality
    $("#allcheck").click(function () {
          $('.checkedid').attr('checked', this.checked);
    });
 
    // if all checkbox are selected, check the selectall checkbox
    // and viceversa
    $(".checkedid").click(function(){
 
        if($(".checkedid").length == $(".checkedid:checked").length) {
            $("#allcheck").attr("checked", "checked");
        } else {
            $("#allcheck").removeAttr("checked");
        }
 
    });
});

window.onload = function(){


var auto_refresh = setInterval(
function ()
{
$('#smscount').html('');
$('#smscount').load('admin/ajax-send-sms.php').fadeIn("slow");
}, 1500); // refresh every 15000 milliseconds

}
</SCRIPT>
  

</body></html>
<?php
}
else{
  header('location: login.php');
}
?>