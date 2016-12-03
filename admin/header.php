       <div class="nav-collapse collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
        <li class="dropdown">
    <a class="dropdown-toggle"  data-toggle="dropdown" href="#">
        CMS
        <b class="caret"></b>
      </a>
          <ul class="dropdown-menu">
                  <li><a  href="?action=menu">Menu</a></li>
                  <li><a  href="?action=new-menu">New Menu</a></li>
                  <li><a  href="?action=banner">Banner</a></li>
                  <li><a  href="?action=new-banner">New Banner</a></li>
          </ul>
        </li>

        <li class="dropdown">
    <a class="dropdown-toggle"  data-toggle="dropdown" href="#">
        Mobile
        <b class="caret"></b>
      </a>
          <ul class="dropdown-menu">
          <li><a  href="?action=view-all-book">All Mobile</a></li>
          <li><a  href="?action=catagory">Catagory</a></li>
          <li><a  href="?action=new-book">New Mobile</a></li>
          </ul>
        </li>


          
                  <li class="dropdown">
    <a class="dropdown-toggle"  data-toggle="dropdown" href="#">
        SMS
        <b class="caret"></b>
      </a>
          <ul class="dropdown-menu">
          <li><a  href="?action=phone-number">Phone Number</a></li>
          <li><a  href="?action=send-sms">Send Sms</a></li>
          </ul>
        </li>
        <li><a  href="?action=order">Order</a></li>
          </ul>
          
        <ul class="nav pull-right" id="main-menu-right">
          <li><a><?php echo $_SESSION['name']; ?></a></li>
          <li><a rel="tooltip" target="_blank" href="logout.php" title=""  data-original-title="Logout Now, <?php echo $_SESSION['name']; ?>">Logout</a></li>
  <li class="active">
    <a href="#">
      <span id="smscount" class="badge pull-right"></span>
      SMS Pending
    </a>
  </li>
        </ul>
       </div>